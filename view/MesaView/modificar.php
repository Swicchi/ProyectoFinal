
<html>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Gestion de Mesas</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Modificar Mesa
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="index.php?modificarMesa" method="post">
                            <div class="center-block">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls">
                                    <label>Numero Mesa</label>
                                    <input class="form-control" id="num" name="num" type="number" value="<?php echo  $bebida->getNumero(); ?>" placeholder="Ingrese nombre de mesa" required >
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls">
                                    <label>Cantidad Asientos</label>
                                    <input class="form-control" id="asiento" name="asiento" type="number" value="<?php echo  $bebida->getCantidad(); ?>" placeholder="Ingrese precio de bebida" required >
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                           <div class="control-group">
                                <div class="form-group floating-label-form-group controls">
                                    <label>Código Mesa</label>
                                    <input class="form-control" id="detalle" name="detalle" type="text" value="<?php echo  $bebida->getCodigo(); ?>" placeholder="Ingrese detalle de bebida" required >
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                                <input class="form-control" id="id" name="id"   value="<?php echo  $bebida->getId(); ?>" type="hidden"  required >
                          
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