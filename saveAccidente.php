<?php

    include("conexion.php");
        $niv = $_GET['id2'];

if (isset($_POST['update'])) {
                $niv = $_GET['id2'];
                $desc = $_POST['descAcc'];
                $placeA = $_POST['place'];
                $dateA = $_POST['date'];
                $query = "INSERT INTO accidente VALUES (DEFAULT, '$desc','$placeA','$dateA','$niv')";
                $result = mysqli_query($conn, $query);
                if(!$result){
                    die("Query Failed");
                }
                $_SESSION['message'] = 'Siniestro Registrado';
                $_SESSION['message_type'] = 'success';
                header('Location: index.php');
                
}

?>

<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="saveAccidente.php?id2=<?php echo $_GET['id2']; ?>" method="POST">
        <div class="form-group">
          <?php echo 'Lugar'; ?>
          <input name="place" type="text" class="form-control" placeholder="Lugar">
          <?php echo 'Fecha'; ?>
          <input name="date" type="text" class="form-control" placeholder="Fecha (DD/MM/AAAA)">
          <?php echo 'Descripcion del siniestro'; ?>
          <textarea name="descAcc" class="form-control" cols="30" rows="10"></textarea>
        </div>

        <button class="btn-success" name="update">
          REGISTRAR SINIESTRO
        </button>
      </form>
      </div>
    </div>
  </div>
</div>