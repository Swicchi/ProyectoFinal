
<html>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Gestion de Alimentos</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Modificar Alimento
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="index.php?modificarAlimento" method="post">
                            <div class="center-block">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls">
                                    <label>Nombre Alimento</label>
                                    <input class="form-control" id="name" name="name" type="text" value="<?php echo  $alimento->getName(); ?>" placeholder="Ingrese nombre de alimento" required >
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                           
                                <input class="form-control" id="id" name="id"   value="<?php echo  $alimento->getId(); ?>" type="hidden"  required >
                          
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