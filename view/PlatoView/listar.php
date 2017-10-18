
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
                                    <td><?php echo $value['nombre']; ?></td>
                                    <td><?php echo $value['precio']; ?></td>
                                    <td><?php echo $value['nombre_tipo']; ?></td>
                                    <td><?php
                                        If ($value[6] != null) {
                                            foreach ($value[6] as $ing):
                                                echo $ing['nombre'];
                                                echo '  ';
                                            endforeach;
                                            ?>
                                            <div class="pull-right"><a class="btn btn-success btn-lg"  href="index.php?id=<?php echo $value['id_plato']; ?>&action=ingredientePlato">Agregar Ingrediente</a>    
                                            </div>  <?php }else {
                                              echo 'No Hay Ingredientes';
                                                ?>
                                             <div class="pull-right"><a class="btn btn-success btn-lg"  href="index.php?id=<?php echo $value['id_plato']; ?>&action=ingredientePlato" >Agregar Ingrediente</a>    
                                            </div><?php }
                            ?></td>
                                    <td><a class="btn btn-success btn-lg"  href="index.php?id=<?php echo $value['id_plato']; ?>&action=eliminarPlato" onclick="return validar();">Eliminar</a></td>
                                    <td><a class="btn btn-success btn-lg"  href="index.php?id=<?php echo $value['id_plato']; ?>&action=editarPlato">Editar</a></td>
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

