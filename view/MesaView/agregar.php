
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
                    Agregar Nuevo Mesa
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="index.php?nuevaMesa" method="post">
                                <div class="center-block">
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                            <label>Numero Mesa</label>
                                            <input class="form-control" id="num" name="num" type="number" placeholder="Ingrese numero de mesa" required >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                            <label>Cantidad Asientos</label>
                                            <input class="form-control" id="asiento" name="asiento" type="number" placeholder="Ingrese cantidad de asientos" required >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                            <label>Código Mesa</label>
                                            <input class="form-control" id="codigo" name="codigo" minlength="6"n type="text" placeholder="Ingrese codigo de mesa" required >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Seleccione Garzon a cargo</label>
                                        <select id="garzon" name="garzon" class="form-control">
                                            <?php foreach ($data as $garzon): ?>
                                                <option value="<?php echo $garzon->getId(); ?>"><?php echo $garzon->getName(); ?></option>
                                            <?php endforeach; ?> 
                                        </select>
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