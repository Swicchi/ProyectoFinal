
<script>
function validar(){
	     //Ingresamos un mensaje a mostrar
        var mensaje = confirm('¿Desea eliminar esta persona?');
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
                    <h1 class="page-header">Gestion de Usuarios</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Listar Usuarios
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                  <?php if($data != ''){?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nombre Usuario</th>
                                        <th>Clave</th>
                                        <th>Rol</th>
                                        <th>Acción Eliminar</th>
                                        <th>Acción Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as  $value):?>
                                     <tr class="odd gradeA">
                                        <td><?php echo  $value->getName();?></td>
                                         <td><?php echo  $value->getUserPass();?></td>
                                       <td><?php echo  $value->getRol()->getName();?></td>
                                       <?php if ( $value->getRol()->getName()=="Administrador") {  ?>
                                       <td><button class="btn btn-danger btn-lg"  disabled="true"  >Eliminar</button></td>
                                      <?php }else{  ?>
                                       <td><a class="btn btn-danger btn-lg"  href="index.php?id=<?php echo  $value->getId();?>&action=eliminarUsuario" onclick="return validar();">Eliminar</a></td>
                                      <?php }  ?>
                                       <td><a class="btn btn-success btn-lg"  href="index.php?id=<?php echo  $value->getId();?>&action=editarUsuario">Editar</a></td>
                                    </tr>
                                      <?php endforeach;?>
                                    </tbody>
                                </table>
                              <?php } else {
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
     
     