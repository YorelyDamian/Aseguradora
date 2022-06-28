<?php

    include("conexion.php");

    //if (isset($_GET['id']) and isset($_GET['id2'])){
        $name = $_GET['id'];
        $niv = $_GET['id2'];
        $idCli = $_GET['id3'];
        $query = "SELECT
                        cliente.*, 
                        autos.*
                    FROM
                        cliente
                        INNER JOIN
                        autos
                        ON 
                          cliente.nombre = autos.propietario
                        WHERE cliente.nombre = '$name' AND autos.propietario = '$name'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $idC = $row['idCliente'];
            $nombreC = $row['nombre'];
            $apellidoC = $row['apellido'];
            $dom = $row['domicilio'];
            $tel = $row['noTelefono'];
            $idSeg = $row['idSeguro'];
            $nivvv = $row['niv'];
            $marcka = $row['Marca'];
            $model = $row['Modelo'];
            $properti = $row['propietario'];
        }
    //}
if (isset($_POST['update'])) {
        $name = $_GET['id'];
        $niv = $_GET['id2'];
        $idCli = $_GET['id3'];
        $idC = $_POST['idCliente'];
        $nombreC = $_POST['nombre'];
        $apellidoC = $_POST['apellido'];
        $dom = $_POST['domicilio'];
        $tel = $_POST['noTelefono'];
        $idSeg = $_POST['idSeguro'];
        $nivvv = $_POST['niv'];
        $marcka = $_POST['marca'];
        $model = $_POST['Modelo'];
        $properti = $nombreC;

        $query = "UPDATE cliente set idCliente = '$idC', nombre = '$nombreC', apellido = '$apellidoC', domicilio = '$dom', noTelefono = '$tel', idSeguro = '$idSeg' WHERE idCliente = $idCli";
        $query2 = "UPDATE autos set Marca = '$marcka', Modelo = '$model', propietario = '$properti' WHERE niv=$nivvv";
        $result = mysqli_query($conn, $query);
        $result2 = mysqli_query($conn, $query2);
        if(!$result2){
            die("Query Failed");
        }
        $_SESSION['message'] = 'Task Updated Successfully';
        $_SESSION['message_type'] = 'warning';
        header('Location: index.php');
        
}

?>

<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>&id2=<?php echo $_GET['id2']; ?>&id3=<?php echo $row['idCliente']; ?>" method="POST">
        <div class="form-group">
          <?php //echo 'Id del Cliente'; ?>
          <input name="idCliente" type="hidden" class="form-control" value="<?php echo $idC; ?>" placeholder="Id del Cliente">
          <?php echo 'Nombre'; ?>
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombreC; ?>" placeholder="Nombre del Cliente">
          <?php echo 'Apellido'; ?>
          <input name="apellido" type="text" class="form-control" value="<?php echo $apellidoC; ?>" placeholder="Apellido Del Cliente">
          <?php echo 'Domicilio'; ?>
          <input name="domicilio" type="text" class="form-control" value="<?php echo $dom; ?>" placeholder="Domicilio del Cliente">
          <?php echo 'Telfono'; ?>
          <input name="noTelefono" type="text" class="form-control" value="<?php echo $tel; ?>" placeholder="Numero de Telefono">
          <?php echo 'Id del Seguro'; ?>
          <input name="idSeguro" type="text" class="form-control" value="<?php echo $idSeg; ?>" placeholder="Id del Seguro">
          <?php //echo 'Niv'; ?>
          <input name="niv" type="hidden" class="form-control" value="<?php echo $niv; ?>" placeholder="NIV">
          <?php echo 'Marca'; ?>
          <input name="marca" type="text" class="form-control" value="<?php echo $marcka; ?>" placeholder="Marca del Vehiculo">
          <?php echo 'Modelo'; ?>
          <input name="Modelo" type="text" class="form-control" value="<?php echo $model; ?>" placeholder="Modelo del Vehiculo">
          <?php //echo 'Propietario'; ?>
          <input name="propietario" type="hidden" class="form-control" value="<?php echo $properti; ?>" placeholder="Propietario">
        </div>

        <button class="btn-success" name="update">
          Update
        </button>
      </form>
      </div>
    </div>
  </div>
</div>