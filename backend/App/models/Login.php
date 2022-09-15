<?php

namespace App\models;

defined("APPPATH") or die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;

class Login
{

    public static function getById($usuario)
    {
        $mysqli = Database::getInstance(true);
        $query = <<<sql
        SELECT ua.*, ra.nombre FROM utilerias_asistentes ua INNER JOIN registros_acceso ra WHERE ua.id_registro_acceso = ra.id_registro_acceso and ua.usuario LIKE :usuario
sql;
        $params = array(
            ':usuario' => $usuario->_usuario,
            // ':password'=>$usuario->_password
        );

        return $mysqli->queryOne($query, $params);
    }

    public static function getUserRAById($usuario)
    {
        $mysqli = Database::getInstance(true);
        $query = <<<sql
        SELECT * FROM registrados
        WHERE email LIKE :usuario
sql;
        $params = array(
            ':usuario' => $usuario->_usuario,
            // ':password'=>$usuario->_password
        );

        return $mysqli->queryOne($query, $params);
    }

    public static function getAllUsers()
    {
        $mysqli = Database::getInstance(true);
        $query = <<<sql
        SELECT r.*
        FROM registrados r
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

    public static function getEmail($email)
    {
        $mysqli = Database::getInstance(true);
        $query = <<<sql
        SELECT * FROM registrados WHERE email LIKE '$email'
sql;

        return $mysqli->queryOne($query);
    }

    public static function insert($data)
    {
        $mysqli = Database::getInstance(1);
        $query = <<<sql
        INSERT INTO registrados(nombre, apellidop, apellidom, email, prefijo, especialidad, telefono, id_pais, id_estado,identificador)
        VALUES(:nombre, :apellidop,:apellidom, :email, :prefijo, :especialidad, :telefono, :pais, :estado, :identificador);
sql;

        $parametros = array(

            ':nombre' => $data->_nombre,
            ':apellidop' => $data->_apellidop,
            ':apellidom' => $data->_apellidom,
            ':email' => $data->_email,
            ':prefijo' => $data->_prefijo,
            ':especialidad' => $data->_especialidad,
            ':telefono' => $data->_telefono,
            ':pais' => $data->_pais,
            ':estado' => $data->_estado,
            ':identificador' => $data->_identificador

        );
        $id = $mysqli->insert($query, $parametros);
        return $id;
    }

    public static function getFreeCourses()
    {
        $mysqli = Database::getInstance(true);
        $query = <<<sql
        SELECT *
        FROM cursos
        WHERE free = 1
sql;

        return $mysqli->queryAll($query);
    }


    public static function insertCursos($registrado, $curso)
    {
        $mysqli = Database::getInstance(1);
        $query = <<<sql
        INSERT INTO asigna_curso (
            id_asigna_curso, 
            id_registrado, 
            id_curso, 
            fecha_asignacion,
            tiene_escala,
            status)

        VALUES (
            null, 
            $registrado, 
            $curso, 
            NOW(), 
            1)
sql;


        $id = $mysqli->insert($query);

        return $id;
    }

    public static function getUser($usuario)
    {
        $mysqli = Database::getInstance(true);
        $query = <<<sql
        SELECT *
        FROM registrados  
        WHERE email = '$usuario'
sql;

        return $mysqli->queryAll($query);
    }

    public static function getUserByEmail($email)
    {
        $mysqli = Database::getInstance(true);
        $query = <<<sql
        SELECT *
        FROM registrados 
        WHERE email = '$email'
sql;

        return $mysqli->queryAll($query);
    }

    public static function getAllEspecialidades()
    {
        $mysqli = Database::getInstance();
        $query = <<<sql
        SELECT * FROM especialidades
sql;
        return $mysqli->queryAll($query);
    }

    public static function getPais()
    {
        $mysqli = Database::getInstance();
        $query = <<<sql
        SELECT * FROM paises
sql;
        return $mysqli->queryAll($query);
    }

    public static function getCategorias()
    {
        $mysqli = Database::getInstance();
        $query = <<<sql
        SELECT * FROM categorias WHERE id_categoria != 1 
        ORDER BY orden ASC 
sql;
        return $mysqli->queryAll($query);
    }

    public static function updateMember($user)
    {
        $mysqli = Database::getInstance(true);
        $query = <<<sql
        UPDATE registrados SET nombre = :nombre, apellidop = :apellidop, apellidom = :apellidom, prefijo = :prefijo,email = :email, datos = 1 WHERE id_registrado = :id_registrado;
sql;
        $parametros = array(
            ':nombre' => $user->_nombre,
            ':apellidop' => $user->_apellidop,
            ':apellidom' => $user->_apellidom,
            ':prefijo' => $user->_prefijo,
            ':email' => $user->_email,
            ':id_registrado' => $user->_id_registrado

        );

        return $mysqli->update($query, $parametros);
    }

    public static function getProductos()
    {
        $mysqli = Database::getInstance();
        $query = <<<sql
        SELECT * FROM productos WHERE es_curso = 1 or es_congreso = 1 
sql;
        return $mysqli->queryAll($query);
    }
}
