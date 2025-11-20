<?php
    class DB{
        public function conectar(){
            $url='pgsql:host=localhost; dbname=ventasdbaqp';
            $user='postgres';
            $password='123';
            $cn=new PDO($url, $user, $password);
            return $cn;
        }
    }
?>