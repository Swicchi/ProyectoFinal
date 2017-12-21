 <div >
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Listar Ordenes
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <?php if ($data != '') { ?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Número Orden</th>
                                        <th>Hora Creacion</th>
                                        <th>Tipo Orden</th>
                                        <th>Número Mesa</th>
                                        <th>Platos</th>
                                        <th>Bebidas</th>
                                        <th>Acción Actualizar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php foreach ($data as $value):  ?>
                                        <tr class="odd gradeA">
                                            <td><?php echo $value->getNumero(); ?></td>
                                            <td><?php echo $value->getHoraCreacion(); ?></td>
                                            <td><?php echo $value->getTipo(); ?></td>
                                            <td><?php echo $value->getMesa(); ?></td>
                                            <td><?php
                                                if ($value->getPlato() != null) {
                                                    foreach ($value->getPlato() as $ing):
                                                        if ($ing != null) {
                                                            echo $ing->getCantidad().' x '.$ing->getNombre();
                                                            echo ' <br>  ';
                                                        } else {
                                                            
                                                        }
                                                    endforeach;
                                                    ?>
                                                    <?php
                                                } else {
                                                echo 'No Hay Platos';
                                                }
                                                   
                                                ?></td>
                                            <td><?php
                                                if ($value->getBebida() != null) {
                                                    foreach ($value->getBebida() as $ing):
                                                        if ($ing != null) {
                                                            echo $ing->getCantidad().' x '.$ing->getName().' '.$ing->getDetalle();
                                                            echo ' <br> ';
                                                        } else {
                                                            
                                                        }
                                                    endforeach;
                                                    ?>
                                                    <?php
                                                } else {
                                                    echo 'No Hay Bebidas';
                                                }
                                                    ?>
                                                </td>
                                                <?php if($value->getHoraPreparacion()==NULL){ ?>
                                            <td><a class="btn btn-danger btn-lg"  href="index.php?id=<?php echo $value->getNumero(); ?>&action=preparado" onclick="return validar();">Actualizar</a></td>
                                                <?php }else { ?>
                                            <td><button class="btn btn-danger btn-lg"  disabled="true" href="index.php?id=<?php echo $value->getNumero(); ?>&action=preparado" onclick="return validar();">Preparado</button></td>
                                                <?php } ?>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                            <?php
                        } else {
                            echo '<h1>No Hay Datos</h1>';
                        }
                        ?>
                    </div>  

                </div>
                <!-- /.col-lg-12 -->
            </div>