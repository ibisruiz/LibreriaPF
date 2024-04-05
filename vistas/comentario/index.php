<?php

include "../../modelo/conexion.php";
include ("../../controladores/eliminarComentario.php");

$sql = "SELECT c.nombre, c.correo, c.comentario, c.id_comentario, l.titulo AS nombre_libro
            FROM comentarios c
            INNER JOIN titulos l ON c.libro_id = l.id_titulo";

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
                        <a href="../autores/index.php" class="nav-link px-2 text-white fw-bold"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-compact-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671" />
                            </svg>
                            Listado de Autores
                        </a>
                    </li>
                    <li>
                        <a href="index.php" class="nav-link px-2 text-white fw-bold">
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
                <h2 class="mb-0">Mantenimiento Comentarios</h2>
            </div>

            <div class="child float-end">
                <a href="agregar.php" type="button" class="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                        class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                        <path
                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0" />
                    </svg>
                    <span class="visually-hidden">Button</span>
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid row">        
        <div class="col-md-10 offset-1">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th>Comentario</th>
                        <th>Nombre del libro</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($datos as $row) {
                    ?>
                        <tr>
                            <td scope="row">
                                <?= $row->nombre ?>
                            </td>
                            <td>
                                <?= $row->correo ?>
                            </td>
                            <td>
                                <?= $row->comentario ?>
                            </td>
                            <td>
                                <?= $row->nombre_libro ?>
                            </td>
                            <td>
                                <div class="btn-group float-end">
                                    <a href="editar.php?id=<?= $row->id_comentario?>" type="button" class="btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                            class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                        </svg>
                                        <span class="visually-hidden">Button</span>
                                    </a>
                                    <a onclick="Eliminar()" href="index.php?id=<?= $row->id_comentario ?>" type="button"
                                        class="btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                            class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                        </svg>
                                        <span class="visually-hidden">Button</span>
                                    </a>
                                </div>
                            </td>
                        </tr>

                    <?php 
                    }
                    ?>

                </tbody>
            </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="../../index.js"></script>
</body>

</html>