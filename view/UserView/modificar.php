
<html>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Gestión de Usuarios</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Modificar Usuario
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="index.php?modificarUsuario" method="post">
                                <div class="center-block">
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                            <label>Nombre Usuario</label>
                                            <input class="form-control" id="user" name="user" type="text" value="<?php echo $user->getName(); ?>" placeholder="Ingrese nombre de usuario" required >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                            <label>Clave Usuario</label>
                                            <input class="form-control" id="pass" name="pass"  minlength="8" max="14" value="<?php echo $user->getUserPass(); ?>" type="password" placeholder="Ingrese clave de usuario" required >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Seleccione rol</label>
                                        <select id="rol" name="rol" class="form-control">
                                            <option value="<?php echo $user->getRol()->getId(); ?>"><?php echo $user->getRol()->getName(); ?></option>
                                            <?php foreach ($data as $rol): ?>
                                                <?php if ($rol->getId() != $user->getRol()->getId()) { ?>
                                                    <option value="<?php echo $rol->getId(); ?>"><?php echo $rol->getName(); ?></option>
                                                <?php } ?>   
                                            <?php endforeach; ?> 
                                        </select>
                                    </div>
                                    <input class="form-control" id="id" name="id"   value="<?php echo $user->getId(); ?>" type="hidden"  required >

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