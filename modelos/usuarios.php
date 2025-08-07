<?php 
//incluir la conexión de la base de datos 
require "../config/conexion.php";
class Usuario 
{

  //implementamos nuestro constructor 
  public function __construct()
  {   
  }

  //metodo insertar registro 
  public function insertar($nombre, $apellido, $login, $email, $clavehash, $codigo_empleado)
  {
    $sql = "INSERT INTO usuarios (nombre, apellido, login, email, password, codigo_empleado, estado) VALUES ('$nombre', '$apellido', '$login', '$email', '$clavehash', '$codigo_empleado', '1' )";
    return ejecutarConsulta($sql);
  }
//metodo editar
  public function editar($idusuario, $nombre, $apellido, $login, $email, $clavehash, $codigo_empleado)
  {
    if (!empty($clavehash)){
      $sql = "UPDATE usuarios SET nombre='$nombre', apellido= '$apellido', login= '$login', email= '$email', password= '$clavehash', codigo_empleado= '$codigo_empleado' WHERE idusuario= '$idusuario'";
    }else {
      $sql = "UPDATE usuarios SET nombre= '$nombre', apellido= '$apellido', login= '$login'. email= '$email', password= '$clavehash', codigo_empleado= '$codigo_empleado' WHERE idusuario= '$idusuario'"; 
    }
    return ejecutarConsulta($sql);
  }

  public function desactivar($idusuario)
  {
    $sql ="UPDATE usuarios SET estado= '0' WHERE idusuario= '$idusuario'";
    return ejecutarConsulta($sql);
  }
  public function activar($idusuario)
  {
    $sql = "UPDATE usuarios SET estado= '1' WHERE idusuario= '$idusuario'";
    return ejecutarConsulta($sql)
  }

  //metodo para mostrar registros 
  public function mostrar($idusuario)
  {
    $sql = "SELECT * FROM   usuarios WHERE idusuario= '$idusuario'";
    return ejecutarConsultaSimpleFilla($sql)
  }

  //listar registros
  public function listar()
  {
    $sql = "SELECT * FROM usuarios";
    return ejecutarConsulta($sql);
  }

  public function cantidad_usuario()
  {
    $sql = "SELECT count(*) nombre FROM usuarios";
    return ejecutarConsulta($sql)
  }

  //Metodo para verificar el acceso al sistema 
  public function verificar($login, $clave)
  {
    $sql = "SELECT * FROM usuarios WHERE login= '$login' AND password= '$clave' AND estado= '1'";
  }
}