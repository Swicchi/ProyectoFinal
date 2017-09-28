 <?php
     $link=mysqli_connect("localhost","root","","bdfinal");
         $sql="SELECT * FROM user NATURAL JOIN userrole;";
         $result=mysqli_query($link, $sql);
         while($row=mysqli_fetch_array($result)){
             $data[]=$row;
            }
    
            mysqli_close($link);                             
?>  
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
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nombre Usuario</th>
                                        <th>Rol</th>
                                        <th>Clave</th>
                                        <th>Acción Eliminar</th>
                                        <th>Acción Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as  $value):?>
                                     <tr class="odd gradeA">
                                        <td><?php echo  $value['user'];?></td>
                                         <td><?php echo  $value['password'];?></td>
                                       <td><?php echo  $value['name'];?></td>
                                       <td><a class="btn btn-success btn-lg"  href="index.php?id=<?php echo  $value['id_user'];?>&accion=eliminar" onclick="return validar();">Eliminar</a></td>
                                       <td><a class="btn btn-success btn-lg"  href="index.php?id=<?php echo  $value['id_user'];?>&accion=editar">Editar</a></td>
                                    </tr>
                                      <?php endforeach;?>


                                       
                                    
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
           
            <!-- /.row -->
     
     