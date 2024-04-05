<?php

include ("../../modelo/conexion.php");
include ("../../controladores/editarComentario.php");

$sql_libros = "SELECT id_titulo, titulo FROM titulos";
$stmt_libros = $conexion->prepare($sql_libros);
$stmt_libros->execute();
$libros = $stmt_libros->fetchAll(PDO::FETCH_ASSOC);


$id = $_GET["id"];



$sql = "SELECT * FROM comentarios WHERE id_comentario = $id";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$datos = $stmt->fetchAll(PDO::FETCH_OBJ);

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


    <h2 class="text-center mb-4 mt-5">Editar Comentario</h2>

    <div class="container-fluid row">
        <div class="col-md-6 offset-3 mt-5">

            <form method="POST">

                <?php
                foreach ($datos as $row) { ?>

                    <input type="hidden" name="id_comentario" value="<?= $_GET["id"] ?>">

                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-semibold fst-italic">Indique su nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $row->nombre ?>">
                    </div>

                    <div class="mb-3">
                        <label for="correoElectronico" class="form-label fw-semibold fst-italic">Correo electrónico</label>
                        <input type="email" class="form-control" id="correoElectronico" name="correoElectronico"
                            value="<?= $row->correo ?>">
                    </div>

                    <div class="mb-3">
                        <label for="asunto" class="form-label fw-semibold fst-italic">Asunto</label>
                        <input type="text" class="form-control" id="asunto" name="asunto" value="<?= $row->asunto ?>">
                    </div>

                    <?php
                    $fecha = $row->fecha;

                    $fecha_formateada = date("Y-m-d", strtotime($fecha));
                    ?>

                    <div class="mb-3">
                        <label for="fecha" class="form-label fw-semibold fst-italic">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" value="<?= $fecha_formateada ?>">
                    </div>

                    <label for="libro_id" class="form-label fw-semibold fst-italic">Libro</label>
                <select name="libro_id" id="libro_id" class="form-select mb-3">
                    <option selected value="">Seleccione un libro...</option>
                        <?php foreach ($libros as $libro): ?>
                            <option value="<?= $libro['id_titulo'] ?>" <?= ($row->libro_id == $libro['id_titulo']) ? 'selected' : '' ?>>
                                <?= $libro['titulo'] ?>
                            </option>
                        <?php endforeach; ?>
                </select>

                    <div class="mb-3">
                        <label for="comentario" class="form-label fw-semibold fst-italic">Comentario</label>
                        <textarea type="text" class="form-control" id="comentario" name="comentario" rows="5"
                            cols="40"><?= $row->comentario ?></textarea>
                    </div>

                    <div class="offset-4 mb-3 mt-2">
                        <button type="submit" class="btn btn-primary" name="btnEditar" value="ok">Guardar</button>
                        <a href="index.php" type="submit" class="btn btn-secondary ms-3">Volver</a>
                    </div>

                </form>

                <?php
                }
                ?>

        </div>
    </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>