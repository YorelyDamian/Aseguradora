

<?php
    
                                <?php 
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
                                                        
                                                    ";
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
                            }
                                
                                

                                
                                mysqli_close($conn);?>