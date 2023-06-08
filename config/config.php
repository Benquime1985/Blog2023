<?php
    $protocolo = "https";
    $servidor = "localhost";
    $proyecto = "blog2023";
    // Definimos la ruta de admin
    define ('RUTA_ADMIN',$protocolo.'://'.$servidor."/".$proyecto."/admin/");
    //Definimos la ruta de un usuario sin autenticar
    define ('RUTA_FRONT',$protocolo.'://'.$servidor."/".$proyecto."/");
?>