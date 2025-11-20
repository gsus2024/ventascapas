<?php
    require_once '../entidades/Familia.php';
    require_once '../interfaces/IFamilia.php';
    require_once '../logica/LFamilia.php';

    $fam=new Familia();
    $fam->setIdFamilia($_GET['idfam']);
    $log=new LFamilia();
    $log->borrar($fam);
    header('Location:cargarfamilias.php');
?>