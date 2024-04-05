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

    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <a href="../libros/index.php" class="nav-link px-2 text-white fw-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-compact-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671" />
                            </svg>
                            Listado de Libros
                        </a>
                    </li>
                    <li>
                        <a href="index.php" class="nav-link px-2 text-white fw-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-compact-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671" />
                            </svg>
                            Listado de Autores
                        </a>
                    </li>
                    <li>
                        <a href="../comentario/index.php" class="nav-link px-2 text-white fw-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-compact-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671" />
                            </svg>
                            Mantenimiento Comentarios
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="container">


        <div class="parent">
            <div class="child">
                <h2 class="mb-0">Autores en la librería</h2>
            </div>            
        </div>
    </div>

    <div class="container-fluid row">
        <div class="col-md-10 offset-1">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre del autor</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Pais</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    include "../../modelo/conexion.php";

                    $sql = "SELECT * FROM autores";

                    $stmt = $conexion->prepare($sql);
                    $stmt->execute();
                    $datos = $stmt->fetchAll(PDO::FETCH_OBJ);

                    foreach ($datos as $row) {

                        ?>

                        <tr>
                            <td scope="row">
                                <?= $row->nombre ?>
                                <?= $row->apellido ?>
                            </td>
                            <td>
                                <?= $row->ciudad ?>
                            </td>
                            <td>
                                <?= $row->estado ?>
                            </td>
                            <td>
                                <?= $row->pais ?>
                            </td>

                        </tr>

                    <?php }
                    ?>

                </tbody>
            </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>