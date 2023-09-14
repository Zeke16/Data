<?php
require '../../db/db.php';
require '../../constantes.php';
$css = CDN_BS_CSS;
$js = CDN_BS_JS;
$icons = CDN_ICONOS;

$query = "SELECT * FROM tbl_especies";
$ejecutar = $conn->prepare($query);
$ejecutar->execute();
$data = $ejecutar->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?= $css ?>
    <?= $icons ?>
</head>

<body>
    <div class="row p-4">
        <div class="col-md-11">
            <h1>Listado de especies</h1>
        </div>
        <div class="col-md-1">
            <a href="http://" target="_blank" class="btn btn-primary text-center">Crear &nbsp; <i class="fas fa-plus"></i></a>
        </div>
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Listado de especies</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-stripped">
                    <thead class="thead-dark">
                        <th>Nombre: </th>
                        <th>Estado: </th>
                        <th>Fecha creacion: </th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $especie) {
                        ?>
                            <tr>
                                <td><?= $especie->nombre ?></td>
                                <td><?= $especie->estado ?></td>
                                <td><?= $especie->fecha ?></td>
                                <td><?= $especie->nombre ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?= $js ?>
</body>

</html>