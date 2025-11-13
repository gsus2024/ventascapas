<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Inserción de Familias</h1>
        <hr>
        <form action="" method="post">
            <input type="text" name="txtNom" placeHolder="Ingrese Nombre">
            <input type="text" name="txtDes" placeHolder="Ingrese Descripción">
            <br>
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>

<?php
    require_once '../entidades/Familia.php';
    require_once '../interfaces/IFamilia.php';
    require_once '../logica/LFamilia.php';
    if($_POST){
        $fam=new Familia();
        $fam->setNombre($_POST['txtNom']);
        $fam->setDescripcion($_POST['txtDes']);
        $log=new LFamilia();
        $log->guardar($fam);
        header('Location: cargarfamilias.php');
    }
?>