  
<script>
function validar(){
	     //Ingresamos un mensaje a mostrar
        var mensaje = confirm('¿Desea actualizar estado de este alimento?');
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
                    <h1 class="page-header">Gestión de Alimentos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Listar Alimentos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <?php if($data != ''){?>
                        
                            
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nombre Alimento</th>
                                        <th>Estado</th>
                                        <th>Actualizar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                    <?php foreach ($data as  $value):?>
                                     <tr class="odd gradeA">
                                        <td><?php echo  $value->getName();?></td>
                                        <td><?php if($value->getEstado()==1){ echo  "Disponible";}else{echo  "No Disponible";}?></td>
                                       <td><a class="btn btn-danger btn-lg"  href="index.php?id=<?php echo  $value->getId();?>&action=estadoAlimento" onclick="return validar();">Cambiar estado</a></td>
                                       
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
   
     