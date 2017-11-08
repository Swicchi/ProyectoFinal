
<html>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Gestion de Platos</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Modificar Plato
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="index.php?modificarPlato" method="post" enctype="multipart/form-data">
                                <div class="center-block">
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                            <label>Nombre Plato</label>
                                            <input class="form-control" id="name" name="nombre" type="text" value="<?php echo $plato->getNombre(); ?>" placeholder="Ingrese nombre de plato" required >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                            <label>Precio Plato</label>
                                            <input class="form-control" id="precio" name="precio" type="number" value="<?php echo $plato->getPrecio(); ?>" placeholder="Ingrese precio de plato" required >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                      <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                            <label>Imagen del plato</label>
                                            <input  id="image" name="image" type="file" size="20"  >
                                             <input  id="ruta" name="ruta" type="hidden" value="<?php echo $plato->getImage();?>" >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                          
                                    </div>
                                    <a class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal<?php echo $plato->getId(); ?>">
                                    Ver Imagen
                                    </a>
                                     <div class="modal fade" id="myModal<?php echo $plato->getId();?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"><?php echo $plato->getNombre(); ?></h4>
                                        </div>
                                        <div class="modal-body">
                                           
                                           
                                            
                                            <img width="400" height="200" src="<?php echo $plato->getImage();?>">
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                                    <div class="form-group">
                                        <label>Seleccione Tipo</label>
                                        <select id="tipo" name="tipo" class="form-control">
                                            <option value="<?php echo $plato->getId_tipo()->getId(); ?>"><?php echo $plato->getId_tipo()->getName(); ?></option>
                                            <?php foreach ($data as $rol): ?>
                                                <?php if ($rol->getId() != $plato->getId_tipo()->getId()) { ?>
                                                    <option value="<?php echo $rol->getId(); ?>"><?php echo $rol->getName(); ?></option>
                                                <?php } ?>   
                                            <?php endforeach; ?> 
                                        </select>
                                    </div>
                                    <input class="form-control" id="id" name="id"   value="<?php echo $plato->getId(); ?>" type="hidden"  required >

                                    <button type="submit" class="btn btn-default">Enviar</button>
                                    <button type="reset" class="btn btn-default">Limpiar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->


                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->

    <!-- /.row -->

</html>