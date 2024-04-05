<?php

// Datos de conexión a la base de datos
$servidor = "127.0.0.1";
$usuario = "root";
$contrasena = "";
$database = "dblibreria";

// Crear conexión

$conexion = new PDO("mysql:host=$servidor;dbname=$database", $usuario, $contrasena);



