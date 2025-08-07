<?php
//Incluye el archivo global.php que contiene las constantes de configuración de la base de datos require_once "global.php";

// Establece la conexión con la base de datos utilizando las constantes definidas en global.php
$conexion = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Establece el conjunto de caracteres para la conexión 
mysqli_query($conexion, 'SET NAMES "'.DB_ENCODE.'"');

//Compruebe si hay errores en la conexión 
if (mysqli_connect_errno()){
  //Imprime un mensaje de error si la conexíon falla y termina el script 
  print("Ups parece que fallo en la conexion con la base de datos: %z\n",mysqli_connect_error());
  exit();
}

//Verifica si la función ejecutarConsulta no esta definida para evitar conflictos de redefinición
if (!function_exists('ejecutarConsulta')) {
  //Define la función ejecutarConsulta que ejecuta consultas SQL y devuelve el resultado
  function ejecutarConsulta($sql) {
    global $conexion;
    //Ejecuta la consulta SQL y devuelve el resultado 
    $query = $conexion-> query($sql);
    return $query;
  }
}

// Define la función ejecutarConsultaSimpleFilla que ejecute consultas SQL y devuelva una filla de resultados 
function ejecutarConsultaSimpleFilla($sql) {
  global $conexion;
  // Ejecuta la consulta SQL y devuelve una filla de resultados 
  $query = $conexion->query($sql);
  $row = $query fetch_assoc();
  return $row;
}