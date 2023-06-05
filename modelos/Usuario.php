<?php
    class Usuario {
        private $conn;
        private $table = "usuarios";

        public function __construct($cx)
        {
            $this->conn = $cx;
        }

        public function registro ($nombre, $email, $password) {
            //Instruccion que dice que hacer
            $qry = "insert into ".$this->table. " (nombre, email, password, rol_id) values (:nombre, :email, :password, 2)";
            //Preparar la operacion
            $st = $this->conn->prepare($qry);
            //Encriptar contraseña
            $pass_encriptada = md5($password);
            //Asocial los parametros del qry
            $st->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $st->bindParam(":email", $email, PDO::PARAM_STR);
            $st->bindParam(":password", $pass_encriptada, PDO::PARAM_STR);
            // Se ejecuta la accion
            if ($st->execute()) {
                return true;
            }
            return false;
        }

        public function valida_email ($email){
            $qry = "select * from ". $this->table . " where email = :email";
            $st = $this->conn->prepare($qry);
            $st->bindParam (':email',$email, PDO::PARAM_STR);
            $st->execute();
            $resultado = $st->fetch(PDO::FETCH_ASSOC);
            if ($resultado){
                return true;
            }
            return false;
        }

        public function listar (){
            $qry = "select * from view ". $this->table;
            $st = $this->conn->prepare($qry);
            $st->execute();
            return $st->fetchAll(PDO::FETCH_OBJ);
        }

    }