<?php

namespace App\models;

defined("APPPATH") or die("Access denied");

use \Core\Database;
use \Core\MasterDom;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Register
{



  public static function insertNewUser($register)
  {
    $mysqli = Database::getInstance();
    $query = <<<sql
        INSERT INTO registrados(email,prefijo,nombre,apellidop,apellidom,nombreconstancia,telefono,id_pais,id_estado,id_modalidad,id_categoria,organizacion,id_especialidad,escuela,especialidad_texto,status) VALUES(:email,:prefijo,:nombre,:apellidop,:apellidom,:nombreconstancia,:telefono,:id_pais,:id_estado,:id_modalidad,:id_categoria,:organizacion,:id_especialidad,:escuela,:txt_especialidad,1)                        
sql;


    $parametros = array(
      ':email' => $register->_email,
      ':prefijo' => $register->_prefijo,
      ':nombre' => $register->_nombre,
      ':apellidop' => $register->_apellidop,
      ':apellidom' => $register->_apellidom,
      ':nombreconstancia' => $register->_nombreconstancia,
      ':telefono' => $register->_telephone,
      ':id_pais' => $register->_pais,
      ':id_estado' => $register->_estado,
      ':id_modalidad' => $register->_modalidad,
      ':id_categoria' => $register->_categoria,
      ':id_especialidad' => $register->_especialidad,
      ':organizacion' => $register->_organizacion,
      ':escuela' => $register->_escuela,
      ':txt_especialidad' => $register->_txt_especialidad
      // ':puesto' => $register->_puesto,
      // ':pais_organizacion' => $register->_pais_organizacion
    );

    $id = $mysqli->insert($query, $parametros);
    return $id;
  }

  public static function getProductInscripcion()
  {
    $mysqli = Database::getInstance(true);
    $query = <<<sql
      SELECT * FROM productos  WHERE id_producto = 1
sql;
    return $mysqli->queryOne($query);
  }

  public static function getUserByEmail($email)
  {
    $mysqli = Database::getInstance(true);
    $query = <<<sql
    SELECT re.*,ca.costo FROM registrados re
    INNER JOIN categorias ca ON ca.id_categoria = re.id_categoria
    WHERE re.email = '$email'
sql;
    return $mysqli->queryOne($query);
  }

  public static function getDatosFacturacionByEmail($email)
  {
    $mysqli = Database::getInstance(true);
    $query = <<<sql
    SELECT rf.descripcion_regimen_fiscal,cf.descripcion_uso_cfdi FROM registrados re
    INNER JOIN cat_regimen_fiscal rf ON rf.id_regimen_fiscal = re.regimen_fiscal
    INNER JOIN cat_uso_cfdi cf ON cf.id_uso_cfdi = re.cfdi
    WHERE re.email = '$email'
sql;
    return $mysqli->queryOne($query);
  }

  public static function updateBecado($user)
  {
    $mysqli = Database::getInstance(true);
    $query = <<<sql
    UPDATE registrados SET title = :prefijo, nombre = :nombre, apellidop = :apellidop, apellidom = :apellidom, telefono = :telefono, id_pais = :id_pais, id_estado = :id_estado, status = 1 WHERE email = :email;
sql;
    $parametros = array(
      ':prefijo' => $user->_prefijo,
      ':nombre' => $user->_nombre,
      ':apellidop' => $user->_apellidop,
      ':apellidom' => $user->_apellidom,
      ':telefono' => $user->_telephone,
      ':id_pais' => $user->_nationality,
      ':id_estado' => $user->_state,
      ':email' => $user->_email

    );

    return $mysqli->update($query, $parametros);
  }

  public static function UpdateUser($user)
  {
    $mysqli = Database::getInstance(true);
    $query = <<<sql
    UPDATE registrados SET title = :prefijo, nombre = :nombre, apellidop = :apellidop, apellidom = :apellidom, telefono = :telefono, referencia = :referencia,id_categoria = :id_categoria, especialidades = :especialidades,id_pais = :id_pais, id_estado = :id_estado ,monto_congreso = :monto_congreso,status = 1 WHERE email = :email;
sql;

    $parametros = array(
      ':prefijo' => $user->_prefijo,
      ':nombre' => $user->_nombre,
      ':apellidop' => $user->_apellidop,
      ':apellidom' => $user->_apellidom,
      ':telefono' => $user->_telephone,
      ':referencia' => $user->_referencia,
      ':id_categoria' => $user->_categorias,
      ':especialidades' => $user->_especialidades,
      ':id_pais' => $user->_nationality,
      ':id_estado' => $user->_state,
      ':email' => $user->_email,
      ':monto_congreso' => $user->_monto_congreso

    );

    return $mysqli->update($query, $parametros);
  }


  public static function getUserData($email)
  {
    $mysqli = Database::getInstance(true);
    $query = <<<sql
    SELECT r.*, c.costo 
    FROM registrados r
    INNER JOIN categorias c ON (r.id_categoria = c.id_categoria)
    WHERE r.email = '$email'
sql;

    return $mysqli->queryOne($query);
  }




  public static function getUser($email)
  {
    $mysqli = Database::getInstance(true);
    $query = <<<sql
        SELECT * FROM registrados  WHERE email = '$email'
sql;

    return $mysqli->queryAll($query);
  }

  public static function getPendiente()
  {
    $mysqli = Database::getInstance(true);
    $query = <<<sql
        SELECT MAX(clave) as clave FROM pendiente_pago;

sql;

    return $mysqli->queryOne($query);
  }

  public static function getUserById($id)
  {
    $mysqli = Database::getInstance(true);
    $query = <<<sql
        SELECT re.*,cate.costo FROM registrados re  
        INNER JOIN categorias cate ON cate.id_categoria = re.id_categoria
        WHERE re.id_registrado = '$id';
sql;

    return $mysqli->queryAll($query);
  }

  public static function getCountryAll()
  {
    $mysqli = Database::getInstance();
    $query = <<<sql
      SELECT * FROM paises WHERE id_pais != 156 ORDER BY pais ASC
sql;
    return $mysqli->queryAll($query);
  }

  public static function getState($pais)
  {
    $mysqli = Database::getInstance();
    $query = <<<sql
     SELECT * FROM estados WHERE id_pais = $pais;
sql;
    return $mysqli->queryAll($query);
  }

  public static function getPais()
  {
    $mysqli = Database::getInstance();
    $query = <<<sql
        SELECT * FROM paises WHERE id_pais != 156
sql;
    return $mysqli->queryAll($query);
  }

  public static function getPaisById($id)
  {
    $mysqli = Database::getInstance();
    $query = <<<sql
        SELECT * FROM paises WHERE id_pais = $id 
sql;
    return $mysqli->queryAll($query);
  }

  public static function getStateByCountry($id_pais)
  {
    $mysqli = Database::getInstance(true);
    $query = <<<sql
        SELECT * FROM estados where id_pais = '$id_pais'
sql;

    return $mysqli->queryAll($query);
  }

  public static function getAllEspecialidades()
  {
    $mysqli = Database::getInstance();
    $query = <<<sql
    SELECT * FROM especialidades WHERE id_especialidad != 0
    ORDER BY nombre ASC;
sql;
    return $mysqli->queryAll($query);
  }


  public static function getAllModalidades()
  {
    $mysqli = Database::getInstance();
    $query = <<<sql
    SELECT * FROM modalidad
sql;
    return $mysqli->queryAll($query);
  }

  public static function getMontoPago($id_categoria)
  {
    $mysqli = Database::getInstance(true);
    $query = <<<sql
        SELECT * FROM categorias where id_categoria = '$id_categoria'
sql;

    return $mysqli->queryOne($query);
  }

  public static function updateFiscalData($user)
  {
    $mysqli = Database::getInstance(true);
    $query = <<<sql
    UPDATE registrados re SET 
    re.razon_social = :business_name_iva, re.rfc = :code_iva,
    re.email_fac = :email_receipt_iva, cp_fiscal = :cp, regimen_fiscal = :regimen_fiscal,
    cfdi = :cfdi 
    WHERE re.email = :email;
sql;



    $parametros = array(
      ':business_name_iva' => $user->_business_name_iva,
      ':code_iva' => $user->_code_iva,
      ':email_receipt_iva' => $user->_email_receipt_iva,
      ':cp' => $user->_cp,
      ':regimen_fiscal' => $user->_regimen_fiscal,
      ':cfdi' => $user->_cfdi,
      ':email' => $user->_email
    );

    return $mysqli->update($query, $parametros);
  }

  public static function getDataUser($user)
  {
    $mysqli = Database::getInstance(true);
    $query = <<<sql
    SELECT * FROM registrados WHERE email = '$user'
sql;
    return $mysqli->queryAll($query);
  }


  /* Pendiente de Pago */
  public static function inserPendientePago($data)
  {
    $mysqli = Database::getInstance(1);
    $query = <<<sql
    INSERT INTO pendiente_pago (id_producto, id_registrado, reference, clave,
    fecha, monto, tipo_pago,status,comprado_en) 
    VALUES (:id_producto, :id_registrado, :reference, :clave, :fecha, :monto, :tipo_pago,:status, 1);
sql;

    $parametros = array(
      ':id_producto' => $data->_id_producto,
      ':id_registrado' => $data->_id_registrado,
      ':reference' => $data->_reference,
      ':clave' => $data->_clave,
      ':fecha' => $data->_fecha,
      ':monto' => $data->_monto,
      ':tipo_pago' => $data->_tipo_pago,
      ':status' => $data->_status

    );
    $id = $mysqli->insert($query, $parametros);
    return $id;
  }

  public static function getProductosPendientesPagoByUser($user_id,$clave)
  {
    $mysqli = Database::getInstance();
    $query = <<<sql
  SELECT cate.costo,ua.clave_socio,ua.porcentaje_beca,p.*,pp.*
  FROM registrados ua 
  INNER JOIN pendiente_pago pp ON(ua.id_registrado = pp.id_registrado)
  INNER JOIN productos p ON (p.id_producto = pp.id_producto)
  INNER JOIN categorias cate ON cate.id_categoria = ua.id_categoria
  WHERE pp.id_registrado = $user_id AND pp.clave = '$clave' AND pp.status = 0
sql;
    return $mysqli->queryAll($query);
  }

  public static function insertAsignaProducto($id_registrado, $id_producto)
  {

    $mysqli = Database::getInstance();
    $query = <<<sql
  INSERT INTO asigna_producto (id_registrado,id_producto,fecha_asignacion,status) 
  VALUES($id_registrado,$id_producto,NOW(),1)
sql;

    $parametros = array();

    $id = $mysqli->insert($query, $parametros);

    return $id;
  }

  public static function getProductosPendientesPago($user_id, $id_producto)
  {
    $mysqli = Database::getInstance();
    $query = <<<sql
    SELECT * FROM pendiente_pago WHERE id_producto = $id_producto AND id_registrado = $user_id
sql;
    return $mysqli->queryAll($query);
  }

  public static function getProductosAsignaProducto($user_id, $id_producto)
  {
    $mysqli = Database::getInstance();
    $query = <<<sql
  SELECT * FROM asigna_producto WHERE id_registrado = $user_id and id_producto = $id_producto
sql;
    return $mysqli->queryAll($query);
  }

  public static function updateImg($user)
  {
    $mysqli = Database::getInstance(true);

    $query = <<<sql
    UPDATE registrados SET avatar_img = :img  WHERE email = :email;
sql;
    $parametros = array(
      ':img' => $user->_img,
      ':email' => $user->_email
    );
    return $mysqli->update($query, $parametros);
  }

  public static function getCfdi()
  {
    $mysqli = Database::getInstance(true);
    $query = <<<sql
        SELECT * FROM cat_uso_cfdi
sql;

    return $mysqli->queryAll($query);
  }

  public static function getRegimenFiscal()
  {
    $mysqli = Database::getInstance(true);
    $query = <<<sql
        SELECT * FROM cat_regimen_fiscal
sql;

    return $mysqli->queryAll($query);
  }
}
