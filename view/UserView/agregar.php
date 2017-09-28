 <?php
     $link=mysqli_connect("localhost","root","","bdfinal");
         $sql="SELECT * FROM userrole;";
         $result=mysqli_query($link, $sql);
         while($row=mysqli_fetch_array($result)){
             $data[]=$row;
            }
    
            mysqli_close($link);                             
?>
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
                Agregar Nuevo Usuario
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="index.php?accion=nuevoUsuario" method="post">
                            <div class="center-block">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls">
                                    <label>Nombre Usuario</label>
                                    <input class="form-control" id="user" name="user" type="text" placeholder="Ingrese nombre de usuario" required >
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls">
                                    <label>Clave Usuario</label>
                                    <input class="form-control" id="pass" name="pass" type="password" placeholder="Ingrese clave de usuario" required >
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="form-group">
                               
                                <label>Seleccione rol</label>
                                <select id="rol" name="rol" class="form-control">
                                   <?php foreach ($data as $rol):?>
                                    <option value="<?php echo  $rol['id_userrole']; ?>"><?php echo $rol['name']; ?></option>
                                    <?php endforeach;?> 
                                </select>
                            </div>
                           
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