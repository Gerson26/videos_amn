<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \Core\MasterDom;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Home{

    public static function getCountByUser($id){
      $mysqli = Database::getInstance();
      $query=<<<sql
    SELECT count(*) as count from pickup where utilerias_asistentes_id = '$id';
sql;
      return $mysqli->queryAll($query);
    }

    public static function getPendientePagoUser($id){
      $mysqli = Database::getInstance();
      $query=<<<sql
    SELECT count(*) as count_pendientes from pendiente_pago where id_registrado = '$id';
sql;
      return $mysqli->queryOne($query);
    }

    public static function getAsignaProductoUser($id,$id_producto){
      $mysqli = Database::getInstance();
      $query=<<<sql
    SELECT status FROM asigna_producto where id_registrado = '$id' and id_producto = '$id_producto';
sql;
      return $mysqli->queryOne($query);
    }

    

    public static function getCountPickUp($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT count(*) as count from pickup where utilerias_asistentes_id = '$id';
sql;
        return $mysqli->queryOne($query);
    }

    public static function getProductosById($id){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM productos WHERE id_producto = $id
sql;
      return $mysqli->queryOne($query);
        
    }

    public static function getProgresosById($id,$clave){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM progresos_productocursos pr
      INNER JOIN registrados ua ON pr.id_registrado = ua.id_registrado
      WHERE pr.id_producto = $id AND ua.clave = '$clave'
sql;
      return $mysqli->queryOne($query);
        
    }

    public static function getProgresosCongresoById($id,$clave){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT SUM(pr.segundos) as segundos FROM progresos_productocongreso pr
      INNER JOIN videos_congreso vc ON vc.id_video_congreso = pr.id_video_congreso
      INNER JOIN registrados ua ON ua.id_registrado = pr.id_registrado
      WHERE ua.clave = '$clave' AND vc.id_producto = $id
sql;
      return $mysqli->queryOne($query);
        
    }

    public static function insertImpresionConstancia($user_id,$tipo_constancia,$id_producto){
      $mysqli = Database::getInstance(true);
      $query=<<<sql
      INSERT INTO  impresion_constancia (id_registrado, tipo_constancia, id_producto,fecha_descarga) VALUES('$user_id', '$tipo_constancia','$id_producto',NOW())
sql;

      return $mysqli->insert($query);
    }

    public static function getQRById($id){
      $mysqli = Database::getInstance(true);
      $query=<<<sql
      SELECT ra.*
      FROM registros_acceso ra
      INNER JOIN utilerias_asistentes ua
      ON  ra.id_registro_acceso = ua.id_registro_acceso

      WHERE ua.utilerias_asistentes_id = '$id'
sql;
      return $mysqli->queryOne($query);
  }

  public static function getDataUser($user){
    $mysqli = Database::getInstance(true);
    $query=<<<sql
    SELECT re.*,cate.costo FROM registrados re 
    INNER JOIN categorias cate ON cate.id_categoria = re.id_categoria
    WHERE re.email = '$user'
sql;
    return $mysqli->queryOne($query);
  }

  public static function getDataUserCategoria($user){
    $mysqli = Database::getInstance(true);
    $query=<<<sql
    SELECT r.*,c.costo
    FROM 
    registrados r 
    INNER JOIN categorias c ON (r.id_categoria = c.id_categoria)
    WHERE r.email = '$user'
sql;
    return $mysqli->queryOne($query);
  }

  public static function getDataUserById($user_id){
    $mysqli = Database::getInstance(true);
    $query=<<<sql
    SELECT * FROM registrados WHERE id_registrado = $user_id
sql;
    return $mysqli->queryOne($query);
  }

  public static function getFreeCourses(){
      $mysqli = Database::getInstance(true);
      $query =<<<sql
      SELECT *
      FROM cursos
      WHERE free = 1
sql;

      return $mysqli->queryAll($query);
  }

  public static function insertCursos($registrado, $curso){
    $mysqli = Database::getInstance(1);
    $query=<<<sql
    INSERT INTO asigna_curso (
        id_asigna_curso, 
        id_registrado, 
        id_curso, 
        fecha_asignacion,
        status)

    VALUES (
        null, 
        $registrado, 
        $curso, 
        NOW(), 
        1)
sql;
     

      $id = $mysqli->insert($query);


      $log = new \stdClass();
      $log->_sql= $query;
      // $log->_parametros = $parametros;
      $log->_id = $id;

  return $id;

  }

  public static function getProductosPendComprados($id){
    $mysqli = Database::getInstance();
    $query=<<<sql
    SELECT cate.costo,pp.id_producto,pp.clave, pp.comprado_en,pp.monto,pp.status,ua.nombre,ua.clave_socio,aspro.status as estatus_compra,ua.monto_congreso as amout_due,ua.porcentaje_beca,pro.nombre as nombre_producto, pro.precio_publico, pro.tipo_moneda, pro.max_compra, pro.es_congreso, pro.es_servicio, pro.es_curso
    FROM pendiente_pago pp
    INNER JOIN registrados ua ON(ua.id_registrado = pp.id_registrado)
    INNER JOIN productos pro ON (pp.id_producto = pro.id_producto)
    INNER JOIN categorias cate ON cate.id_categoria = ua.id_categoria
    LEFT JOIN asigna_producto aspro ON(pp.id_registrado = aspro.id_registrado AND pp.id_producto = aspro.id_producto)
    WHERE ua.id_registrado = $id GROUP BY id_producto;
sql;
    return $mysqli->queryAll($query);
  }

  public static function getCountProductos($user_id,$id_producto){
    $mysqli = Database::getInstance();
    $query=<<<sql
    SELECT count(*) as numero_productos FROM pendiente_pago WHERE id_registrado = $user_id and id_producto = $id_producto;
sql;
    return $mysqli->queryAll($query);
  }

  public static function getLastQrPendientePago($user_id){
    $mysqli = Database::getInstance(true);
    $query=<<<sql
    SELECT * FROM pendiente_pago WHERE id_registrado = $user_id ORDER BY id_pendiente_pago DESC LIMIT 1
sql;
    return $mysqli->queryOne($query);
  }

  public static function getProductosNoComprados($id){
    $mysqli = Database::getInstance();
    $query=<<<sql
    SELECT cate.costo,p.id_producto, p.nombre as nombre_producto, p.precio_publico, p.tipo_moneda, p.max_compra, 
    p.es_congreso, p.es_servicio, p.es_curso, ua.clave_socio, ua.monto_congreso as amout_due, ua.porcentaje_beca 
    FROM productos p
    INNER JOIN registrados ua
    INNER JOIN categorias cate ON cate.id_categoria = ua.id_categoria
    WHERE id_producto NOT IN (SELECT id_producto FROM pendiente_pago WHERE id_registrado = $id) AND ua.id_registrado = $id;
sql;
    return $mysqli->queryAll($query);
  }

//   public static function getProductosNoComprados($id){
//     $mysqli = Database::getInstance();
//     $query=<<<sql
//     SELECT p.id_producto, p.nombre as nombre_producto, p.precio_publico, p.tipo_moneda, p.max_compra, p.es_congreso, p.es_servicio, p.es_curso, ua.clave_socio, ua.monto_congreso as amout_due 
//     FROM productos p
//     INNER JOIN utilerias_administradores ua
//     WHERE ua.user_id = $id;
// sql;
//     return $mysqli->queryAll($query);
//   }

  public static function getTipoCambio(){
    $mysqli = Database::getInstance();
    $query=<<<sql
    SELECT * FROM tipo_cambio WHERE id_tipo_cambio = 1
sql;
    return $mysqli->queryOne($query);
  }

  public static function getCostoCursosByCategoria($id_registrado,$id_producto){
    $mysqli = Database::getInstance();
    $query=<<<sql
    SELECT r.id_registrado, cc.costo
    FROM registrados r 
    INNER JOIN costos_precongresos cc ON (r.id_categoria = cc.id_categoria)
    WHERE r.id_registrado = $id_registrado and cc.id_producto = $id_producto
sql;
    return $mysqli->queryOne($query);
  }

  public static function getTotalProducts(){
    $mysqli = Database::getInstance();
    $query=<<<sql
    SELECT count(*) as total_productos
    FROM productos 
    WHERE es_curso = 1 OR es_congreso = 1
sql;
    return $mysqli->queryOne($query);
  }

  public static function getTotalProductsUser($id_registrado){
    $mysqli = Database::getInstance();
    $query=<<<sql
    SELECT count(*) as total_productos
    FROM asigna_producto ap
    INNER JOIN registrados r ON(ap.id_registrado = r.id_registrado)
    WHERE r.id_registrado = $id_registrado;
sql;
    return $mysqli->queryOne($query);
  }


  public static function updateStatusPendientePaypal($data)
  {
    $mysqli = Database::getInstance(true);

    $query = <<<sql
    UPDATE pendiente_pago SET status = 1, url_archivo = 'PAGO_PAYPAL'  WHERE id_producto = :id_producto AND id_registrado = :id_registrado AND tipo_pago = 'Paypal' AND status = 0;
sql;
    $parametros = array(
      ':id_producto' => $data->_id_producto,
      ':id_registrado' => $data->_id_registrado
    );
    return $mysqli->update($query, $parametros);
  }

  
  

  

}