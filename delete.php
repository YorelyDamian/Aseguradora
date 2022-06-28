<?php

    include("conexion.php");

    //if (isset($_GET['id'])){
        $niv = $_GET['id2'];
        $id = $_GET['id'];
        $query = "DELETE FROM cliente WHERE nombre = '$id'";
        $query2 = "DELETE FROM autos WHERE niv = '$niv'";
        
        $result = mysqli_query($conn, $query);
        $result2 = mysqli_query($conn, $query2);
        if(!$result and !$result2){
            die("Query Failed");
        }
        $_SESSION['message'] = 'Usuario Eliminado Exitosamente';
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php");
    //}
?>