<?php

        session_start();        
        $usuario = "root";
        $contras = "PumasFC1";
        $servidor = "localhost";
        $bd = "aseguradora";

        $conn = mysqli_connect($servidor,
        $usuario,
        $contras,
        $bd) OR DIE
        ("Problemas al conectar al Servidor de Base de Datos".mysqli_connect_error()
        );
        mysqli_set_charset($conn, "uft8");
?>