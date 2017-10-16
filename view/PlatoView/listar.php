
<script>
    function validar() {
        //Ingresamos un mensaje a mostrar
        var mensaje = confirm('¿Desea eliminar esta bebida?');
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
                                            <div class="pull-right"><a class="btn btn-success btn-lg"  href="index.php?id=<?php echo $value['id_plato']; ?>&action=ingredientePlato">Agregar Ingredientes</a>    
                                            </div>  <?php }else {
                                            ?>
                                            <div class="pull-right"><a class="btn btn-success btn-lg"  href="index.php?id=<?php echo $value['id_plato']; ?>&action=ingredientePlato" >Agregar Ingredientes</a>    
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




                /*  array(6) {
                  [0]=&gt;
                  array(1) {
                  [0]=&gt;
                  array(4) {
                  ["id_plato"]=&gt;
                  string(1) "7"
                  ["nombre"]=&gt;
                  string(5) "Arroz"
                  ["precio"]=&gt;
                  string(4) "1200"
                  ["nombre_tipo"]=&gt;
                  string(14) "Acompanamiento"
                  }
                  }
                  [1]=&gt;
                  array(1) {
                  [3]=&gt;
                  array(1) {
                  [0]=&gt;
                  NULL
                  }
                  }
                  [2]=&gt;
                  array(1) {
                  [0]=&gt;
                  array(4) {
                  ["id_plato"]=&gt;
                  string(1) "5"
                  ["nombre"]=&gt;
                  string(14) "Caldo de pollo"
                  ["precio"]=&gt;
                  string(4) "2300"
                  ["nombre_tipo"]=&gt;
                  string(18) "Platillo Principal"
                  }
                  }
                  [3]=&gt;
                  array(1) {
                  [3]=&gt;
                  array(4) {
                  [0]=&gt;
                  NULL
                  [1]=&gt;
                  NULL
                  [2]=&gt;
                  array(1) {
                  ["ingrediente"]=&gt;
                  string(5) "Arroz"
                  }
                  [3]=&gt;
                  array(1) {
                  ["ingrediente"]=&gt;
                  string(6) "Tomate"
                  }
                  }
                  }
                  [4]=&gt;
                  array(1) {
                  [0]=&gt;
                  array(4) {
                  ["id_plato"]=&gt;
                  string(1) "6"
                  ["nombre"]=&gt;
                  string(18) "Cazuela de Chancho"
                  ["precio"]=&gt;
                  string(4) "3000"
                  ["nombre_tipo"]=&gt;
                  string(18) "Platillo Principal"
                  }
                  }
                  [5]=&gt;
                  array(1) {
                  [3]=&gt;
                  array(5) {
                  [0]=&gt;
                  NULL
                  [1]=&gt;
                  NULL
                  [2]=&gt;
                  array(1) {
                  ["ingrediente"]=&gt;
                  string(5) "Arroz"
                  }
                  [3]=&gt;
                  array(1) {
                  ["ingrediente"]=&gt;
                  string(6) "Tomate"
                  }
                  [4]=&gt;
                  NULL
                  }
                  }
                  } */
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

