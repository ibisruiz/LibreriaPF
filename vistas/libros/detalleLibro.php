<?php

include ("../../modelo/conexion.php");

$libro_id = $_GET['id'];

$sql_libro = "SELECT * FROM titulos WHERE id_titulo = :libro_id";
$stmt_libro = $conexion->prepare($sql_libro);
$stmt_libro->bindParam(':libro_id', $libro_id);
$stmt_libro->execute();
$libro = $stmt_libro->fetch(PDO::FETCH_ASSOC);

$sql_comentarios = "SELECT * FROM comentarios WHERE libro_id = :libro_id";
$stmt_comentarios = $conexion->prepare($sql_comentarios);
$stmt_comentarios->bindParam(':libro_id', $libro_id);
$stmt_comentarios->execute();
$comentarios = $stmt_comentarios->fetchAll(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria Proyecto Final</title>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid row">
        <div class="col-md-6 offset-4 mt-5">
            <div class="card" style="width: 30rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $libro['titulo'] ?></h5>

                    <?php foreach ($comentarios as $comentario): ?>
                    <div class="mt-4">
                        <h6 class="card-subtitle mb-2 text-body-secondary"><?= $comentario['nombre'] ?> - <?= $comentario['correo'] ?> </h6>
                        <p class="card-text"><?= $comentario['comentario'] ?></p>
                    </div>  
    <?php           endforeach; ?>

                                      
                    <a href="index.php" class="card-link float-end btn btn-primary mt-3">Volver</a>
                </div>
            </div>

        </div>
    </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="../../index.js"></script>
</body>

</html>