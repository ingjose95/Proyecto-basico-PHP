
<?php

class Conection{

    private $server='localhost';
    private $user='root';
    private $password='';
    private $conection;


    public function __construct()

    {
        try{
            $this->conection= new PDO("mysql:host=$this->server;dbname=album", $this->user, $this->password);
            $this->conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){

            return 'Falla de conección a la base de datos'.$e->getMessage() ;

        }
    }

    public function executer($sql){ // INSERTAR/BORRAR/ACTUALIZAR

        $this->conection->exec($sql);

        return $this->conection->lastInsertId();

    }

    public function read($sql){ //LEER

        $sentencia = $this->conection->prepare($sql);

        $sentencia->execute();

        return $sentencia->fetchAll();



    }
}







?>