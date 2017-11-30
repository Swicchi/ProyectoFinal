
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
                                    <input class="form-control" id="num" name="num" type="number" value="<?php echo  $mesa->getNumero(); ?>" placeholder="Ingrese nombre de mesa" required >
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls">
                                    <label>Cantidad Asientos</label>
                                    <input class="form-control" id="asiento" name="asiento" type="number" value="<?php echo  $mesa->getAsientos(); ?>" placeholder="Ingrese cantidad de asientos" required >
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                           <div class="control-group">
                                <div class="form-group floating-label-form-group controls">
                                    <label>Código Mesa</label>
                                    <input class="form-control" id="codigo" name="codigo" type="text" value="<?php echo  $mesa->getCodigo(); ?>" placeholder="Ingrese código de mesa" required >
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                                 <div class="form-group">
                                        <label>Seleccione garzón a cargo</label>
                                        <select id="garzon" name="garzon" class="form-control">
                                            <option value="<?php echo $mesa->getGarzon()->getId(); ?>"><?php echo $mesa->getGarzon()->getNombre(); ?></option>
                                            <?php foreach ($data as $garzon): ?>
                                                <?php if ($garzon->getId() != $mesa->getGarzon()->getId()) { ?>
                                                    <option value="<?php echo $garzon->getId(); ?>"><?php echo $garzon->getNombre(); ?></option>
                                                <?php } ?>   
                                            <?php endforeach; ?> 
                                        </select>
                                    </div>
                                <input class="form-control" id="id" name="id"   value="<?php echo  $mesa->getId(); ?>" type="hidden"  required >
                          
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