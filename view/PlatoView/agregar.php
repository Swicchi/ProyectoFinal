
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
                Agregar Nuevo Plato
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="index.php?accion=nuevaBebida" method="post">
                            <div class="center-block">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls">
                                    <label>Nombre Plato</label>
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Ingrese nombre de bebida" required >
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                          <div class="control-group">
                                <div class="form-group floating-label-form-group controls">
                                    <label>Precio Plato</label>
                                    <input class="form-control" id="precio" name="precio" type="number" placeholder="Ingrese precio de bebida" required >
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="form-group">
                               
                                <label>Seleccione tipo de plato</label>
                                <select id="tipo" name="tipo" class="form-control">
                                   <?php foreach ($data as $rol):?>
                                    <option value="<?php echo  $rol['id_tipoplato']; ?>"><?php echo $rol['nombre']; ?></option>
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