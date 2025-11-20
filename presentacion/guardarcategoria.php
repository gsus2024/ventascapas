<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
            require_once '../entidades/Familia.php';
            require_once '../entidades/Categoria.php';
            require_once '../interfaces/IFamilia.php';
            require_once '../interfaces/ICategoria.php';
            require_once '../logica/LFamilia.php';
            require_once '../logica/LCategoria.php';
            $log=new LFamilia();
            $familias=$log->cargar();
        ?>

        <h1>Inserción de Categorias</h1>
        <hr>
        <form action="" method="post">
            <input type="text" name="txtNom" placeHolder="Ingrese Nombre">
            <select name="cbxFam">
                <option value="0">Seleccione</option>
                <?php
                    foreach($familias as $f){
                ?>
                <option value="<?=$f->getIdFamilia()?>"><?=$f->getNombre()?></option>
                <?php
                    }
                ?>
            </select>
            <br>
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>

<?php
    require_once '../entidades/Categoria.php';
    require_once '../interfaces/ICategoria.php';
    require_once '../logica/LCategoria.php';
    if($_POST){
        $cat=new Categoria();
        $cat->setNombre($_POST['txtNom']);
        $cat->setIdFamilia($_POST['cbxFam']);
        $log=new LCategoria();
        $log->guardar($cat);
        //header('Location: cargarcategorias.php');
    }
?>