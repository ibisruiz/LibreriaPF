<?php

if (!empty($_POST["btnEditar"]))  
{
    if (!empty($_POST["nombre"]) and 
        !empty($_POST["correoElectronico"]) and 
        !empty($_POST["asunto"]) and 
        !empty($_POST["fecha"]) and 
        !empty($_POST["comentario"]) and
        !empty($_POST["libro_id"])) 
        
        {
           include("../modelo/conexion.php");

            $idComentario = $_POST['id_comentario'];
            $nombre = $_POST['nombre'];
            $correoElectronico = $_POST['correoElectronico'];
            $asunto = $_POST['asunto'];
            $fecha = $_POST['fecha'];
            $comentario = $_POST['comentario'];
            $libro_id = $_POST['libro_id'];
            
            $sql = "UPDATE comentarios SET fecha='$fecha', correo='$correoElectronico', nombre='$nombre', asunto='$asunto', comentario='$comentario', libro_id='$libro_id'
                    WHERE id_comentario = $idComentario";
            
            $stmt = $conexion -> prepare($sql);
            $stmt -> execute();
            $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            header("location:index.php");

        } else 
        {
            echo '<div class="alert alert-danger">Todos los campos son obligatorios</div>';
        }

}