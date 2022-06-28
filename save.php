<?php 

include('conexion.php');

    $name = $_POST['nombre'];
    $lastName = $_POST['apellido'];
    $adress = $_POST['domicilio'];
    $phone = $_POST['telefono'];
    $mark = $_POST['marca'];
    $placas = $_POST['placas'];
    $model = $_POST['modeloAuto'];
    $office = $_POST['oficina'];
    $typeSeg = $_POST['tipoSeg'];
    $uno;

    if($office == "CDMX" and $typeSeg == "Basico"){
        $uno = "2";
    }elseif($office == "CDMX" and $typeSeg == "Intermedio"){
        $uno = "3";
    }elseif($office == "CDMX" and $typeSeg == "Completo"){
        $uno = "4";
    }elseif($office == "QUERETARO" and $typeSeg == "Basico"){
        $uno = "5";
    }elseif($office == "QUERETARO" and $typeSeg == "Intermedio"){
        $uno = "6";
    }elseif($office == "QUERETARO" and $typeSeg == "Completo"){
        $uno = "7";
    }elseif($office == "MONTERREY" and $typeSeg == "Basico"){
        $uno = "8";
    }elseif($office == "MONTERREY" and $typeSeg == "Intermedio"){
        $uno = "9";
    }elseif($office == "MONTERREY" and $typeSeg == "Completo"){
        $uno = "10";
    }

    $query = "INSERT INTO cliente VALUES (DEFAULT, '$name','$lastName','$adress','$phone','$uno')";
    $query2 = "INSERT INTO autos VALUES ('$placas','$mark','$model','$name')";

    if(mysqli_query($conn, $query) and mysqli_query($conn, $query2)){
		$_SESSION['message'] = 'Usuario Registrado Exitosamente';
        $_SESSION['message_type'] = 'success';

        header("Location: index.php");
    }else{
        echo "Error Al registrar";
    }
    
    mysqli_close($conn);

?>