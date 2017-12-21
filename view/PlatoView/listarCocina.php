
<script>
   function validar2(){
	     //Ingresamos un mensaje a mostrar
        var mensaje = confirm('¿Desea cambiar el estado de este plato?');
        //Detectamos si el usuario acepto el mensaje
        if (mensaje) {
            return true;
        }
        //Detectamos si el usuario denegó el mensaje
        else {
            return false;
        }
}
</script>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Gestión de Platos</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Listar Platos
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <?php if ($data != '') { ?>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Nombre Plato</th>
                                <th>Precio Plato</th>
                                <th>Tipo Plato</th>
                                          <th>Estado</th>
                                <th>Ingredientes</th>
                                        <th>Acción Actualizar</th>
                                <th>Imagen</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($data as $value): ?>
                                <tr class="odd gradeA">
                                    <td><?php echo $value->getNombre(); ?></td>
                                    <td><?php echo '$ '.$value->getPrecio(); ?></td>
                                    <td><?php echo $value->getId_tipo()->getName(); ?></td>
                                        <td><?php if($value->getEstado()==1){ echo  "Disponible";}else{echo  "No Disponible";}?></td>
                                    <td><?php
                                        If ($value->getIngredientes() != null) {
                                            foreach ($value->getIngredientes() as $ing):
                                                if ($ing!=null){
                                                echo $ing->getName();
                                                echo '  ';
                                                } else {
                                                    
                                                }
                                            endforeach;
                                            ?>
                                             <?php }else {
                                              echo 'No Hay Ingredientes';
                                                ?>
                                             <?php }
                            ?></td>
                                   <td><a class="btn btn-danger btn-lg"  href="index.php?id=<?php echo  $value->getId();?>&action=estadoPlato" onclick="return validar2();">Cambiar estado</a></td>
                                       
 <td><button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal<?php echo $value->getId(); ?>">
                                    Ver Imagen
                                    </button></td>
                                </tr>
                             <div class="modal fade" id="myModal<?php echo $value->getId();?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"><?php echo $value->getNombre(); ?></h4>
                                        </div>
                                        <div  class="modal-body">
                                           
                                            <div align="center">
                                            <img   width="400" height="200" src="<?php echo $value->getImage();?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
    <?php endforeach; ?>

                        </tbody>
                    </table>
                   
                <?php
                } else {
                    echo '<h1>No Hay Datos</h1>';
                }



                ?>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-6 -->

<!-- /.row -->

