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

    <h2 class="text-center mb-4 mt-5">Agregar Comentario</h2>

    <div class="container-fluid row">
        <div class="col-md-6 offset-3 mt-3">

            <form method="POST">

                <?php
                include ("../../modelo/conexion.php");
                include ("../../controladores/agregarComentario.php");

                $sql_libros = "SELECT id_titulo, titulo FROM titulos";
                $stmt_libros = $conexion->prepare($sql_libros);
                $stmt_libros->execute();
                $libros = $stmt_libros->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <div class="mb-3">
                    <label for="nombre" class="form-label fw-semibold fst-italic">Indique su nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>

                <div class="mb-3">
                    <label for="correoElectronico" class="form-label fw-semibold fst-italic">Correo electrónico</label>
                    <input type="email" class="form-control" id="correoElectronico" name="correoElectronico">
                </div>

                <div class="mb-3">
                    <label for="fecha" class="form-label fw-semibold fst-italic">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha">
                </div>

                <div class="mb-3">
                    <label for="asunto" class="form-label fw-semibold fst-italic">Asunto</label>
                    <input type="text" class="form-control" id="asunto" name="asunto">
                </div>                
               
                <label for="libro_id" class="form-label fw-semibold fst-italic">Libro</label>
                <select name="libro_id" id="libro_id" class="form-select mb-3">
                    <option selected disabled value="">Seleccione un libro...</option>
                        <?php foreach ($libros as $libro): ?>
                            <option value="<?= $libro['id_titulo'] ?>"><?= $libro['titulo'] ?></option>
                        <?php endforeach; ?>
                </select>

                <div class="mb-3">
                    <label for="comentario" class="form-label fw-semibold fst-italic">Comentario</label>
                    <textarea type="text" class="form-control" id="comentario" name="comentario" rows="5"
                        cols="40"></textarea>
                </div>

                <div class="offset-4 mb-3 mt-2">
                    <button type="submit" class="btn btn-primary" name="btnAgregar" value="ok">Enviar</button>
                    <a href="index.php" type="submit" class="btn btn-secondary ms-3">Volver</a>
                </div>

            </form>
        </div>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>