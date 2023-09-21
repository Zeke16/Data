<?php
include '../../db/db.php';
$query = "SELECT * from tbl_pacientes";
$smt = $conn->prepare($query);
$smt->execute();
$data = $smt->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach($data as $info){ ?>
        <img src="<?= $info->imagen?>"></img>
    
    <?php }?>
</body>
</html>