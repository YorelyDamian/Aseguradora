<?php include("conexion.php") ?>

<?php include("includes/header.php") ?>

<nav class="navbar navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="auto.ico" alt="" width="30" height="24" class="d-inline-block align-text-top">
            ASEGURADORA
        </a>
        
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                
                <form class="d-flex" action="" method="get">
                    <input id="txtBuscador" class="form-control me-2" type="text" placeholder="Poliza"
                        aria-label="Search" name="busqueda"> 
                    <input type="submit" class="btn btn-outline-secondary" name="enviar" value="buscar" type="button"> <img id="img1" src="lupa.ico" alt=""
                        width="25" height="25" class="d-inline-block align-text-top" /></input>

                </form>
        
            </div>
        </nav>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <form action="save.php" method="POST"> 
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">REGISTRO.</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <?php if(isset($_SESSION['message'])){?>
                
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message']?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            <?php }?>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <label for="exampleFormControlInput1" class="form-label">DATOS DEL COMPRADOR</label>
                        <input type="text" name="nombre" placeholder='Nombre(s)' class='form-control ' />
                        <input type="text" name="apellido" placeholder='Apellido Paterno' class='form-control ' />
                        <input type="text" name="domicilio" placeholder='Domicilio' class='form-control ' />
                        <input type="text" name="telefono" placeholder='Telefono' class='form-control ' />
                    </li>
                </ul>
                <ul id="datoAuto" class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <label for="exampleFormControlInput1" class="form-label">DATOS DEL AUTOMOVIL</label>
                        <input type="text" name="marca" placeholder='Marca' class='form-control ' />
                        <input type="number" name="placas" placeholder='NIV' class='form-control ' />
                        <input type="text" name="modeloAuto" placeholder='Modelo' class='form-control ' />
                    </li>
                </ul>
                <ul id="datoAuto" class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <label for="exampleFormControlInput1" class="form-label">SEGURO</label>
                        <div class="group-vertical">
                            <input type="radio" id="radio1" style="margin: 10px" name="oficina" value="CDMX" ><label id="radio2">
                                CDMX</label>
                            <input type="radio" id="radio1" style="margin: 10px" name="oficina" value="QUERETARO" ><label id="radio2">
                                QUERETARO</label>
                            <input type="radio" id="radio1" style="margin: 10px" name="oficina" value="MONTERREY" ><label id="radio2">
                                MONTERREY</label>
                        </div>
                    </li>
                </ul>
                <ul id="datoAuto" class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <label for="exampleFormControlInput1" class="form-label">SEGURO</label>
                        <div class="group-vertical">
                            <input type="radio" id="radio2" style="margin: 10px" name="tipoSeg" value="Basico" ><label id="radio2">
                                Basico</label>
                            <input type="radio" id="radio2" style="margin: 10px" name="tipoSeg" value="Intermedio" ><label id="radio2">
                                Intermedio</label>
                            <input type="radio" id="radio2" style="margin: 10px" name="tipoSeg" value="Completo" ><label id="radio2">
                                Completo</label>
                        </div>
                    </li>
                </ul>
                
                    <button id="btnGuardar" name="guardar" class="btn btn-outline-success" type="submit">GUARDAR REGISTRO</button>
               
            </div>
            </form>
        </div>
    </div>
</nav>
<nav id="tablaRegistros" class='p-auto'>
    <div class="row d-flex flex-wrap">
        <div class="card" id='cajitaProducto'>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido Paterno</th>
                            <th scope="col">Auto</th>
                            <th scope="col">Placas</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Aseguradora</th>
                            <th scope="col">Sucursal</th>
                            <th scope="col">Tipo de Seguro</th>
                            <th scope="col">Paquete #</th>
                            <th scope="col">SINIESTRO</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            
                        </tr>
                    </thead>
                    <tbody>                      
                    <?php
                            if(isset($_GET['enviar'])){
                            $busqueda = $_GET['busqueda'];
                            $query = "SELECT
                                            cliente.idCliente, 
                                            cliente.nombre, 
                                            cliente.apellido, 
                                            autos.Marca, 
                                            autos.niv, 
                                            cliente.noTelefono, 
                                            seguro.nombreSeg, 
                                            seguro.direccion, 
                                            seguro.tipo_seguro, 
                                            seguro.idSeguro
                                        FROM
                                            autos
                                            INNER JOIN
                                            cliente
                                            ON 
                                                autos.propietario = cliente.nombre
                                            INNER JOIN
                                            seguro
                                            ON 
                                                cliente.idSeguro = seguro.idSeguro
                                            WHERE seguro.direccion LIKE '%$busqueda%'
                                            ";
                            }
                            //WHERE cliente.nombre = '$buscar'
                            $result = mysqli_query($conn,$query);
                            while($row = mysqli_fetch_assoc($result)){ ?>
                                <tr>
                                    <td><?php echo $row['idCliente'] ?></td>
                                    <td><?php echo $row['nombre'] ?></td>
                                    <td><?php echo $row['apellido'] ?></td>
                                    <td><?php echo $row['Marca'] ?></td>
                                    <td><?php echo $row['niv'] ?></td>
                                    <td><?php echo $row['noTelefono'] ?></td>
                                    <td><?php echo $row['nombreSeg'] ?></td>
                                    <td><?php echo $row['direccion'] ?></td>
                                    <td><?php echo $row['tipo_seguro'] ?></td>
                                    <td><?php echo $row['idSeguro'] ?></td>
                                    <td>
                                        <a href="saveAccidente.php?id2=<?php echo $row['niv']; ?>" class="btn rounded-pill btn-outline-secondary" type="button">
                                            <img id="img1" src="accidente.ico" alt="" width="25" height="25"
                                                class="d-inline-block align-text-top" /></a>
                                    </td>
                                    <td>
                                        <a  href="delete.php?id=<?php echo $row['idCliente']; ?>&id2=<?php echo $row['niv']; ?>" class="btn rounded-pill btn-outline-secondary" type="button">
                                            <img id="img1" src="delete.ico" alt="" width="25" height="25"
                                                class="d-inline-block align-text-top" /></a>
                                    </td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $row['nombre']; ?>&id2=<?php echo $row['niv']; ?>&id3=<?php echo $row['idCliente']; ?>" class="btn rounded-pill btn-outline-secondary" type="button">
                                            <img id="img1" src="editar.ico" alt="" width="25" height="25"
                                                class="d-inline-block align-text-top" /></a>
                                    </td>
                                    
                                </tr>
                            
                            <?php } 
                                mysqli_close($conn);?>   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</nav>

</html>