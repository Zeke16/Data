<?php
include '../../db/db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Crear la ruta/directorio donde se guardara la imagen
    $carpeta = 'imagenes';

    //Separar la extension
    $infoExtension = explode(".", $_FILES["imagenes"]["name"]);

    //Extension de la imagen
    $extension = $infoExtension[1];

    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
    //Generar nombre aleatorio de imagen
    $aleatorio = substr(str_shuffle($permitted_chars), 0, 10);

    //Crear la ruta de la imagen con la instancia a guardar
    $imagen = $carpeta . "/" . $aleatorio . "." . $extension;
    //imagenes/kjasnbfkjasnfkas.jpg

    //Instancia de subida de imagen
    $tmp = $_FILES["imagenes"]["tmp_name"];

    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777);

        if (move_uploaded_file($tmp, $imagen)) {
            $query = "INSERT INTO tbl_pacientes 
            (
                nombre, 
                enfermedades,
                vacunas, 
                id_raza, 
                imagen, 
                creado_en, 
                actualizado_en,
                creado_por,
                actualizado_por, 
                fecha_creacion
            ) VALUES
            (
                :nombre, 
                :enfermedades,
                :vacunas, 
                :id_raza, 
                :imagen, 
                :creado_en, 
                :actualizado_en, 
                :creado_por,
                :actualizado_por, 
                :fecha_creacion)";

            $data = [
                ':nombre' => 'Manchas',
                ':enfermedades' => 'Sarna',
                ':vacunas' => 'Rabia',
                ':id_raza' => 1,
                ':imagen' => $imagen,
                ':creado_en' => date('Y-m-d H:i:s'),
                ':actualizado_en' => date('Y-m-d H:i:s'),
                ':creado_por' => 1,
                ':actualizado_por' => 1,
                ':fecha_creacion' => date('Y-m-d')
            ];
            echo $query;
            $stmt = $conn->prepare($query);
            $stmt->execute($data);
            echo "IMAGEN GUARDADA" . $imagen;
        } else {
            echo "IMAGEN NO GUARDADA";
        }
    } else {
        if (move_uploaded_file($tmp, $imagen)) {
            $query = "INSERT INTO tbl_pacientes 
            (
                nombre, 
                enfermedades,
                vacunas, 
                id_raza, 
                imagen, 
                creado_en, 
                actualizado_en,
                creado_por,
                actualizado_por, 
                fecha_creacion
            ) VALUES
            (
                :nombre, 
                :enfermedades,
                :vacunas, 
                :id_raza, 
                :imagen, 
                :creado_en, 
                :actualizado_en, 
                :creado_por,
                :actualizado_por, 
                :fecha_creacion)";

            $data = [
                ':nombre' => 'Manchas',
                ':enfermedades' => 'Sarna',
                ':vacunas' => 'Rabia',
                ':id_raza' => 4,
                ':imagen' => $imagen,
                ':creado_en' => date('Y-m-d H:i:s'),
                ':actualizado_en' => date('Y-m-d H:i:s'),
                ':creado_por' => 1,
                ':actualizado_por' => 1,
                ':fecha_creacion' => date('Y-m-d')
            ];
            echo $query;
            $stmt = $conn->prepare($query);
            $stmt->execute($data);
            echo "IMAGEN GUARDADA" . $imagen;
        } else {
            echo "IMAGEN NO GUARDADA";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" enctype="multipart/form-data" method="post">
        <input type="file" name="imagenes" id="imagenes"> Seleccionar imagen
        <button type="submit">Enviar</button>
    </form>
</body>

</html>