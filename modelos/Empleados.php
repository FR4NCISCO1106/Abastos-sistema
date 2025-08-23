<?php 
// incluir la conexion a la base de datos 
require "../config/conexion.php";

class Empleado
{
  // Constructor de la calse Empleado
  public function_construct()
  { 
  }

  // Metodo para insertar un nuevo registro de empleado
  public function insertar($nombre, $apellidos, $documentos_numero, $telefono, $codigo)
  {
    $sql = "INSERT INTO empleados (nombre, apellidos, documento_numero, telefono, codigo) VALUES ('$nombre', '$apellidos', '$documentos_numero', '$telefono', '$codigo')";
    return ejecutarConsulta($sql)
  }

  //Metodo para editar un registro de empleado existente
  public function editar($empleado_id, $nombre, $apellidos, $documentos_numero, $telefono, $codigo)
  {
    $sql = "UPDATE empleados SET nombre='$nombre', apellidos='$apellidos', documento_numero='$documentos_numero', telefono= '$telefono', codigo= '$codigo' WHERE id= '$empleado_id'";
  }


  //Metodo para mostrar los detalles de un empleado especifico
  public function mostrar($empleado_id)
  {
    $sql = "SELECT * FROM empleados WHERE id= '$empleado_id'";
    return ejecutarConsultaSimpleFilla($sql);
  }

  // Método para listar todos los registros de empeleados 
  public function listar()
  {
    $sql = "SELECT * FROM empleados";
    return ejecutarConsulta($sql);
  }

  // Método para listar y mostrar en un select los registros de empleados 
  public function select()
  {
    $sql = "SELECT * FROM empleados";
    return ejecutarConsulta($sql);
  }
}