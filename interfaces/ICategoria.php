<?php
    require_once '../entidades/Categoria.php';
    interface ICategoria{
        public function cargar();
        public function guardar(Categoria $categoria);
    }
?>