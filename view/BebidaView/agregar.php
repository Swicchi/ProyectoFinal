
<html>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Gestión de Bebidas</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Agregar Nuevo Bebida
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="index.php?nuevaBebida" method="post">
                            <div class="center-block">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls">
                                    <label>Nombre Bebida</label>
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Ingrese nombre de bebida" required >
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                          <div class="control-group">
                                <div class="form-group floating-label-form-group controls">
                                    <label>Precio Bebida</label>
                                    <input class="form-control" id="precio" name="precio" type="number" placeholder="Ingrese precio de bebida" required >
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                           <div class="control-group">
                                <div class="form-group floating-label-form-group controls">
                                    <label>Detalle Bebida</label>
                                    <input class="form-control" id="detalle" name="detalle" type="text" placeholder="Ingrese detalle de bebida" required >
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                           
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