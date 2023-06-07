<?php
    class Publicacion {
        private $conn;
        private $table = "publicaciones";

        public function __construct($cx)
        {
            $this->conn = $cx;
        }
    

        public function listar (){
            $qry = "select * from view_". $this->table;
            $st = $this->conn->prepare($qry);
            $st->execute();
            return $st->fetchAll(PDO::FETCH_OBJ);
        }
    
    
    }