<?php

if (!empty($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM comentarios WHERE id_comentario = $id";

    $stmt = $conexion -> prepare($sql);
    $stmt -> execute();
    $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    if($resultado == 1) { 
    echo '<div class="alert alert-success">El registro se ha eliminado</div>';
    }
}



