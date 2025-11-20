<?php
    require_once '../datos/DB.php';
    require_once '../entidades/Familia.php';
    require_once '../interfaces/IFamilia.php';
    class LFamilia implements IFamilia{
        public function cargar(){
            $db=new DB(); //declaramos nuestra instancia DB para consumir el método conectar
            $cn=$db->conectar(); //obtenemos la conexión que retorna nuestro método
            $sql="select * from familia"; //consulta a ejecutar
            $ps=$cn->prepare($sql); //preparamos la query
            $ps->execute(); //ejecutamos la query
            $filas=$ps->fetchAll(); //obtenemos todas las filas de la ejecución
            $familias= array(); //declaramos una lista de tamaño dinámico
            foreach($filas as $f){ //iteramos nuestras filas
                $fam=new Familia(); //declaramos un objeto de tipo familia para setearle nuestra fila
                $fam->setIdFamilia($f[0]);
                $fam->setNombre($f[1]);
                $fam->setDescripcion($f[2]);
                array_push($familias, $fam); //agregamos nuestro objeto con la fila seteada a nuestra lista de familias
            }
            return $familias; //devolvemos el listado de familias poblado
        }

        public function guardar(Familia $familia){
            $db=new DB();
            $cn=$db->conectar();
            $sql="insert into familia (nombre, descripcion) values (:nom, :des)";
            $ps=$cn->prepare($sql);
            $ps->bindParam(':nom', $familia->getNombre());
            $ps->bindParam(':des', $familia->getDescripcion());
            $ps->execute();
        }

        public function borrar(Familia $familia){
            $db=new DB();
            $cn=$db->conectar();
            $sql="delete from familia where idfamilia=:idfam";
            $ps=$cn->prepare($sql);
            $ps->bindParam(':idfam', $familia->getIdFamilia());
            $ps->execute();
        }
    }
?>