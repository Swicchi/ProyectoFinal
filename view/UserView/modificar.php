
<html>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Gestion de Usuarios</h1>
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
                        <form role="form" action="index.php?accion=modificarUsuario" method="post">
                            <div class="center-block">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls">
                                    <label>Nombre Usuario</label>
                                    <input class="form-control" id="user" name="user" type="text" value="<?php echo  $user1['user']; ?>" placeholder="Ingrese nombre de usuario" required >
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls">
                                    <label>Clave Usuario</label>
                                    <input class="form-control" id="pass" name="pass"  minlength="8" max="14" value="<?php echo  $user1['password']; ?>" type="password" placeholder="Ingrese clave de usuario" required >
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="form-group">
                               
                                <label>Seleccione rol</label>
                                <select id="rol" name="rol" class="form-control">
                                     <option value="<?php echo  $user1['id_userrole']; ?>"><?php echo $user1['name']; ?></option>
                                 <?php foreach ($data as $rol):?>
                                     <?php if($rol['id_userrole']!=$user1['id_userrole']){?>
                                              <option value="<?php echo  $rol['id_userrole']; ?>"><?php echo $rol['name']; ?></option>
                                  <?php } ?>   
                               <?php endforeach;?> 
                                </select>
                            </div>
                                <input class="form-control" id="id" name="id"   value="<?php echo  $user1['id_user']; ?>" type="hidden"  required >
                          
                            <button type="submit" class="btn btn-default">Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>
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