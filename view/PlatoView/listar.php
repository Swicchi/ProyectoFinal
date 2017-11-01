
<script>
    function validar() {
        //Ingresamos un mensaje a mostrar
        var mensaje = confirm('¿Desea eliminar este plato?');
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
        <h1 class="page-header">Gestion de Platos</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Listar Platos
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <?php if ($data != '') { ?>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Nombre Plato</th>
                                <th>Precio Plato</th>
                                <th>Tipo Plato</th>
                                <th>Ingredientes</th>
                                <th>Acción Eliminar</th>
                                <th>Acción Editar</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($data as $value): ?>
                                <tr class="odd gradeA">
                                    <td><?php echo $value->getNombre(); ?></td>
                                    <td><?php echo $value->getPrecio(); ?></td>
                                    <td><?php echo $value->getId_tipo()->getName(); ?></td>
                                    <td><?php
                                        If ($value->getIngredientes() != null) {
                                            foreach ($value->getIngredientes() as $ing):
                                                if ($ing!=null){
                                                echo $ing->getName();
                                                echo '  ';
                                                } else {
                                                    
                                                }
                                            endforeach;
                                            ?>
                                             <?php }else {
                                              echo 'No Hay Ingredientes';
                                                ?>
                                             <?php }
                            ?><div class="pull-right"><a class="btn btn-success btn-lg"  href="index.php?id=<?php echo $value->getId(); ?>&action=ingredientePlato" >Agregar Ingrediente</a>    
                                            </div></td>
                                    <td><a class="btn btn-danger btn-lg"  href="index.php?id=<?php echo $value->getId(); ?>&action=eliminarPlato" onclick="return validar();">Eliminar</a></td>
                                    <td><a class="btn btn-success btn-lg"  href="index.php?id=<?php echo $value->getId(); ?>&action=editarPlato">Editar</a></td>
                                </tr>
    <?php endforeach; ?>

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

