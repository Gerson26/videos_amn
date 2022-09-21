<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;

class Transmision{


    public static function getLineaPrincialAll(){
        $mysqli = Database::getInstance(true);
        $query =<<<sql
        SELECT * FROM especialidades
sql;

        return $mysqli->queryAll($query);
    }

    public static function checkPreCongress($id_registrado){
        $mysqli = Database::getInstance(true);
        $query =<<<sql
        SELECT re.email,ap.id_producto FROM registrados re
        INNER JOIN asigna_producto ap ON ap.id_registrado = re.id_registrado
        WHERE ap.id_producto = 2 AND ap.id_registrado = $id_registrado;
sql;

        return $mysqli->queryAll($query);
    }

    public static function getTransmisionById($id){
        $mysqli = Database::getInstance(true);
        try {
            $query =<<<sql
            SELECT * FROM transmision
            WHERE id_transmision = $id
sql;

        return $mysqli->queryOne($query);
        } catch (\Throwable $th) {
            return false;
        }
        
    }

    public static function getTransmisionsTotalMinutes(){
        $mysqli = Database::getInstance(true);
        try {
            $query =<<<sql
            SELECT sum(duracion) as duracion FROM transmision
sql;

        return $mysqli->queryOne($query);
        } catch (\Throwable $th) {
            return false;
        }
        
    }

    public static function getProgrsoTransmision($id,$num_transmision){
        $mysqli = Database::getInstance(true);
        $query =<<<sql
        SELECT * FROM progresos_transmision
        WHERE id_transmision = $num_transmision AND id_registrado = $id
sql;

        return $mysqli->queryOne($query);
    }

    public static function getProgrsoTransmisionsTotal($id){
        $mysqli = Database::getInstance(true);
        $query =<<<sql
        SELECT * FROM progresos_transmision
        WHERE id_registrado = $id
sql;

        return $mysqli->queryAll($query);
    }

    public static function insertProgreso($registrado,$transmision,$sala = null){
        $mysqli = Database::getInstance(1);
        $query=<<<sql
        INSERT INTO progresos_transmision (id_transmision, sala,id_registrado, minutos, visto_ultimavez) 
        VALUES ('$transmision','$sala','$registrado','0', NOW())
sql;
  
      $id = $mysqli->insert($query);
  
      return $id;
    }


    public static function insertPregunta($data){
        $mysqli = Database::getInstance(1);
        $query=<<<sql
        INSERT INTO new_preguntas (id_registrado, pregunta, fecha, tipo, id_tipo, sala) 
        VALUES (:id_registrado,:pregunta,NOW(),:tipo,:id_tipo,:sala)
sql;
        $parametros = array(
            ':id_registrado'=>$data->_id_registrado,
            ':pregunta'=>$data->_pregunta, 
            ':tipo'=>$data->_tipopre,
            ':id_tipo'=>$data->_id_tipopre,
            ':sala'=>$data->_salapre
        );      
  
        $id = $mysqli->insert($query, $parametros);
    
        return $id;
    }

//     public static function insertChat($data){
//         $mysqli = Database::getInstance(1);
//         $query=<<<sql
//         INSERT INTO chat (id_registrado, chat, 	fecha, tipo, id_tipo, sala) 
//         VALUES (:id_registrado,:chat,NOW(),:tipo,:id_tipo,:sala)
// sql;
//         $parametros = array(
//             ':id_registrado'=>$data->_id_registrado,
//             ':chat'=>$data->_chat,
//             ':tipo'=>$data->_tipo,
//             ':id_tipo'=>$data->_id_tipo,
//             ':sala'=>$data->_sala
//         );      
  
//         $id = $mysqli->insert($query, $parametros);
    
//         return $id;
//    }

    public static function insertNewChat($data){
        $mysqli = Database::getInstance(1);
        $query=<<<sql
        INSERT INTO new_chat (id_registrado, chat, fecha, tipo, id_tipo, sala) 
        VALUES (:id_registrado,:chat,NOW(),:tipo,:id_tipo,:sala)
sql;
        $parametros = array(
            ':id_registrado'=>$data->_id_registrado,
            ':chat'=>$data->_chat,
            ':tipo'=>$data->_tipo,
            ':id_tipo'=>$data->_id_tipo,
            ':sala'=>$data->_sala
        );      
  
        $id = $mysqli->insert($query, $parametros);
    
        return $id;
    }


    public static function insertNewPregunta($data){
        $mysqli = Database::getInstance(1);
        $query=<<<sql
        INSERT INTO new_preguntas (user_id, pregunta, fecha, tipo, id_tipo, sala) 
        VALUES (:user_id,:pregunta,NOW(),:tipo,:id_tipo,:sala)
sql;
        $parametros = array(
            ':user_id'=>$data->_id_registrado,
            ':pregunta'=>$data->_pregunta,
            ':tipo'=>$data->_tipo,
            ':id_tipo'=>$data->_id_tipo,
            ':sala'=>$data->_sala
        );      
  
        $id = $mysqli->insert($query, $parametros);
    
        return $id;
    }


//     public static function getChatByID($data){
//         $mysqli = Database::getInstance(true);
//         $query =<<<sql
//         SELECT c.*, reg.nombre, reg.apellidop, reg.apellidom, reg.avatar_img
//         FROM chat c
//         INNER JOIN registrados reg ON (reg.id_registrado = c.id_registrado)
//         WHERE c.tipo = :tipo and c.sala = :sala and c.id_tipo = :id_tipo;
// sql;

//         $parametros = array(
//             ':tipo'=>$data->_tipo,
//             ':sala'=>$data->_sala,
//             ':id_tipo'=>$data->_id_tipo
//         );
//         return $mysqli->queryAll($query, $parametros);
//     }
 
    public static function getNewChatByID($data){
        $mysqli = Database::getInstance(true);
        $query =<<<sql
        SELECT nc.*, r.nombre, r.apellidop, r.apellidom, r.avatar_img
        FROM new_chat nc
        INNER JOIN registrados r ON (r.id_registrado = nc.id_registrado)
        WHERE nc.tipo = :tipo and nc.sala = :sala and nc.id_tipo = :id_tipo;
sql;

        $parametros = array(
            ':tipo'=>$data->_tipo,
            ':sala'=>$data->_sala,
            ':id_tipo'=>$data->_id_tipo
        );
        return $mysqli->queryAll($query, $parametros);
    }

    public static function getNewPreguntaByID($data){
        $mysqli = Database::getInstance(true);
        $query =<<<sql
        SELECT nc.*, uad.name_user, uad.surname, uad.second_surname
        FROM new_chat nc
        INNER JOIN utilerias_administradores uad ON (uad.user_id = nc.user_id)
        WHERE nc.tipo = :tipo and nc.sala = :sala and nc.id_tipo = :id_tipo;
sql;

        $parametros = array(
            ':tipo'=>$data->_tipo,
            ':sala'=>$data->_sala,
            ':id_tipo'=>$data->_id_tipo
        );
        return $mysqli->queryAll($query, $parametros);
    }
    

    public static function updateProgreso($id_transmision, $registrado, $minutos){
        $mysqli = Database::getInstance();
        $query=<<<sql
            UPDATE progresos_transmision SET minutos = '$minutos'
            WHERE id_transmision = '$id_transmision' AND id_registrado = '$registrado'
sql;
        return $mysqli->update($query);
    }

    public static function updateProgresoFecha($id_transmision, $registrado, $minutos){
        $mysqli = Database::getInstance();
        $query=<<<sql
            UPDATE progresos_transmision SET minutos = '$minutos', visto_ultimavez = NOW()
            WHERE id_transmision = '$id_transmision' AND id_registrado = '$registrado'
sql;
        return $mysqli->update($query);
    } 

    public static function getPais(){
        $mysqli = Database::getInstance(true);
        $query =<<<sql
        SELECT * FROM especialidades
sql;

        return $mysqli->queryAll($query);
    }


    public static function updateDataUser($user)
  {
    $mysqli = Database::getInstance(true);
    $query = <<<sql
    UPDATE registrados SET evaluacion_inicial = :evaluacion_inicial, calificacion_inicial = :calificacion_inicial WHERE id_registrado = :id_registrado
sql;
    $parametros = array(
      ':evaluacion_inicial' => $user->_evaluacion_inicial,
      ':calificacion_inicial' => $user->_calificacion_inicial,
      ':id_registrado' => $user->_id_registrado
    );

    return $mysqli->update($query, $parametros);
  }

  public static function updateDataUserCalificacionFinal($user)
  {
    $mysqli = Database::getInstance(true);
    $query = <<<sql
    UPDATE registrados SET evaluacion_final = :evaluacion_final, calificacion_final = :calificacion_final WHERE id_registrado = :id_registrado
sql;
    $parametros = array(
      ':evaluacion_final' => $user->_evaluacion_final,
      ':calificacion_final' => $user->_calificacion_final,
      ':id_registrado' => $user->_id_registrado
    );

    return $mysqli->update($query, $parametros);
  }

  public static function insertRespuestas($data){
    $mysqli = Database::getInstance(1);
    $query=<<<sql
    INSERT INTO registro_encuesta_evaluacioninicial (pregunta_id, respuesta_id, id_registrado, fecha_registro, num_intento) 
    VALUES (:pregunta_id,:respuesta_id,:id_registrado,NOW(),1)
sql;
    $parametros = array(
        ':pregunta_id'=>$data->_pregunta_id,
        ':respuesta_id'=>$data->_respuesta_id, 
        ':id_registrado'=>$data->_id_registrado
    );      

    $id = $mysqli->insert($query, $parametros);

    return $id;
}

public static function getTotalRespuestasByUserAndEvaluacion($id_registrado,$id_evaluacion){
    $mysqli = Database::getInstance(true);
    $query =<<<sql
    SELECT pre.*, ree.*
    FROM preg_resp_evaluacioninicial pre
    INNER JOIN registro_encuesta_evaluacioninicial ree ON (ree.respuesta_id = pre.id_respuesta)
    INNER JOIN preg_evaluacion_inicial pei ON (pei.id_pregunta = pre.id_pregunta)
    INNER JOIN evaluaciones ev ON (ev.id_evaluacion = pei.id_evaluacion)
    WHERE ree.id_registrado = $id_registrado AND pei.id_evaluacion = $id_evaluacion
sql;

   
    return $mysqli->queryAll($query);
}

public static function getDataUser($id_registrado){
    $mysqli = Database::getInstance(true);
    $query =<<<sql
    SELECT * FROM registrados WHERE id_registrado = $id_registrado
sql;

    return $mysqli->queryOne($query);
}


public static function searchRespuestas($id_evaluacion){
    $mysqli = Database::getInstance(true);
    $query =<<<sql
    SELECT count(*) as total
    FROM registro_encuesta_evaluacioninicial ree
    INNER JOIN preg_evaluacion_inicial pei ON (ree.pregunta_id = pei.id_pregunta)
    WHERE pei.id_evaluacion = $id_evaluacion
sql;

    // $parametros = array(
    //     ':pregunta_id'=>$data->_pregunta_id,
    //     ':respuesta_id'=>$data->_respuesta_id,
    //     ':id_registrado'=>$data->_id_registrado
    // );
    return $mysqli->queryOne($query);
}



    
}