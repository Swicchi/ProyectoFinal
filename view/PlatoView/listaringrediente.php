
<script>
    function validar() {
        //Ingresamos un mensaje a mostrar
        var mensaje = confirm('¿Esta seguro de realizar esta acción?');
        //Detectamos si el usuario acepto el mensaje
        if (mensaje) {
            return true;
        }
        //Detectamos si el usuario denegó el mensaje
        else {
            return false;
        }
    }
</script>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Gestión de Platos</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Ingredientes de <?php echo $data->getNombre(); ?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <?php if ($data != '') { ?>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Nombre Ingrediente</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($data->getIngredientes() != null) { ?>
                            <?php foreach ($data->getIngredientes() as $value): ?>
                                <tr class="odd gradeA">
                                    <td><?php echo $value->getName(); ?></td>
                                    <td><a class="btn btn-danger btn-lg"  href="index.php?id=<?php echo $value->getId(); ?>&action=eliminarIngredientexPlato&idplato=<?php echo $data->getId(); ?>" onclick="return validar();">Eliminar</a></td>
                                 </tr>
                            <?php endforeach;
                            }?>
                             <?php if ($data->getnoIngredientes() != null) { ?>
                            <?php foreach ($data->getnoIngredientes() as $value): ?>
                                <tr class="odd gradeA">
                                    <td><?php echo $value->getName(); ?></td>
                                    <td><a class="btn btn-success btn-lg"  href="index.php?id=<?php echo $value->getId(); ?>&action=agregarIngredientexPlato&idplato=<?php echo $data->getId(); ?>" onclick="return validar();">Agregar</a></td>
                                 </tr>
                            <?php endforeach; 
                             }?>
                        </tbody>
                    </table>
                <?php
                } else {
                    echo '<h1>No Hay Datos</h1>';
                }



                ?>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-6 -->

<!-- /.row -->

