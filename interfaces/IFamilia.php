<?php
    require_once '../entidades/Familia.php';
    interface IFamilia{
        //Definimos nuestras firmas de métodos
        public function cargar();
        public function guardar(Familia $familia);
        public function borrar(Familia $familia);
    }
?>