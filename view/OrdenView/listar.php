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
                                        <th>Numero Orden</th>
                                        <th>Hora Creación</th>
                                        <th>Hora Preparación</th>
                                        <th>Hora Entrega</th>
                                        <th>Tipo Orden</th>
                                        <th>Numero Mesa</th>
                                        <th>Platos</th>
                                        <th>Bebidas</th>
                                        <th>Monto Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php foreach ($data as $value): $monto=0; ?>
                                        <tr class="odd gradeA">
                                            <td><?php echo $value->getNumero(); ?></td>
                                            <td><?php echo $value->getHoraCreacion(); ?></td>
                                            <td><?php echo $value->getHoraPreparacion(); ?></td>
                                            <td><?php echo $value->getHoraEntrega(); ?></td>
                                            <td><?php echo $value->getTipo(); ?></td>
                                            <td><?php echo $value->getMesa(); ?></td>
                                            <td><?php
                                                if ($value->getPlato() != null) {
                                                    foreach ($value->getPlato() as $ing):
                                                        if ($ing != null) {
                                                            echo $ing->getCantidad().' x '.$ing->getNombre();
                                                            $monto=$monto+($ing->getCantidad()*$ing->getPrecio());
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
                                                            $monto=$monto+($ing->getCantidad()*$ing->getPrecio());
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
                                            <td><?php echo "$ ".$monto?></td>
                                                 
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
         