<?php
//incluir la conexión de base de datos 
require "../config/conexion.php";
class Asistencia 
{

  // Implementamos nuestro constructor 
  public function_construct()
  {    
  }


  // Listar registros
  public function listar()
  {
    $sql = "SELECT a. *, CONCAT(e.nombre,'',e.apellidos) AS empleado ,e.codigo FROM asistencias a INNER JOIN empleados e ON a. empleado_id=e.id ORDER BY a.id DESC";
    return ejecutarConsulta($sql);
  }


  public function listar_reporte($fecha_inicio, $fecha_fin, $empleado_id)
  {
    $sql = "SELECT a.*, CONCAT(e.nombre,'',e.apellidos) AS empleado, e.codigo FROM asistencias a INNER JOIN empleados e ON a. empleado_id=e.id WHERE DATE(a.fecha)>='$fecha_inicio' AND DATE(a.fecha)<='$fecha_fin' AND a.empleado_id='$empleado_id'";
    return ejecutarConsulta($sql);
  }
}