
<html>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Gestión de Garzones</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Modificar Garzón
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="index.php?modificarGarzon" method="post">
                            <div class="center-block">
                            <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                            <label>Rut </label>
                                            <input class="form-control" id="rut" name="rut" type="text" value="<?php echo  $garzon->getRut(); ?>"  placeholder="Ingrese rut de garzón" required >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                            <label>Nombre</label>
                                            <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo  $garzon->getNombre(); ?>"  placeholder="Ingrese nombre de garzón" required >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                            <label>Apellido Paterno </label>
                                            <input class="form-control" id="apellidoPaterno" name="apellidoPaterno" value="<?php echo  $garzon->getApellidoP(); ?>"  type="text" placeholder="Ingrese apellido paterno del garzón" required >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                            <label>Apellido Materno </label>
                                            <input class="form-control" id="apellidoMaterno" name="apellidoMaterno" value="<?php echo  $garzon->getApellidoM(); ?>"  type="text" placeholder="Ingrese apellido materno del garzón" required >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                            <label>Sueldo</label>
                                            <input class="form-control" id="sueldo" name="sueldo" value="<?php echo  $garzon->getSueldo(); ?>"  type="number" placeholder="Ingrese sueldo del garzón" required >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                            <label>Dirección</label>
                                            <input class="form-control" id="direccion" name="direccion" value="<?php echo  $garzon->getDireccion(); ?>"  type="text" placeholder="Ingrese dirección del garzón" required >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                            <label>Teléfono</label>
                                            <input class="form-control" id="telefono" name="telefono" value="<?php echo  $garzon->getTelefono(); ?>"  type="number" placeholder="Ingrese teléfono del garzón" required >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                  <div class="form-group">
                                        <label>Seleccione usuario</label>
                                        <select id="user" name="user" class="form-control">
                                            <option value="<?php echo $garzon->getUser()->getId(); ?>"><?php echo $garzon->getUser()->getName(); ?></option>
                                            <?php foreach ($data as $user): ?>
                                                <?php if ($user->getId() != $garzon->getUser()->getId()) { ?>
                                                    <option value="<?php echo $user->getId(); ?>"><?php echo $user->getName(); ?></option>
                                                <?php } ?>   
                                            <?php endforeach; ?> 
                                        </select>
                                    </div>
                                <input class="form-control" id="id" name="id"   value="<?php echo  $garzon->getId(); ?>" type="hidden"  required >
                          
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