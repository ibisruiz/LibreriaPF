<?php

if (!empty($_POST["btnAgregar"]))  
{
    if (!empty($_POST["nombre"]) and 
        !empty($_POST["correoElectronico"]) and 
        !empty($_POST["asunto"]) and 
        !empty($_POST["fecha"]) and 
        !empty($_POST["comentario"]) and
        !empty($_POST["libro_id"])) 
        {


            include("../modelo/conexion.php");

            $nombre = $_POST['nombre'];
            $correoElectronico = $_POST['correoElectronico']; 
            $asunto = $_POST['asunto'];
            $fecha = $_POST['fecha'];
            $comentario = $_POST['comentario'];
            $libro_id = $_POST['libro_id'];
            
            $sql = "INSERT INTO comentarios(fecha, correo, nombre, asunto, comentario, libro_id) 
                    VALUES ('$fecha', '$correoElectronico', '$nombre', '$asunto', '$comentario', '$libro_id')";
            
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            header("location:index.php");

        } 
        else 
        {
            echo '<div class="alert alert-danger">Todos los campos son obligatorios</div>';
        }
        
}






