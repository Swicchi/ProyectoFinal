<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administracion del sistema de restaurante</title>

    <!-- Bootstrap Core CSS -->
    <link href="view/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <!-- DataTables CSS -->
    <link href="view/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="view/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="view/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="view/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS 
    <link href="view/vendor/morrisjs/morris.css" rel="stylesheet">
-->
    <!-- Custom Fonts -->
    <link href="view/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
              
                <a class="navbar-brand" href="index.php">Administracion del Sistema</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
              
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="index.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            
            <!-- /.navbar-static-side -->
        </nav>
        
        <div id="page-wrapper">
              <div class="panel panel-default">
            <div class="panel-heading">
                Listar Ordenes
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
                                <th>Acción Actualizar</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php// foreach ($data as $value): ?>
                                <tr class="odd gradeA">
                                    <td><?php echo "A" //$value->//getNombre(); ?></td>
                                    <td><?php echo "B" //$value->//getPrecio(); ?></td>
                                    <td><?php echo "C"//$value->//getId_tipo()->getName(); ?></td>
                                    <td><?php
                                       /*/* If ($value->//getIngredientes() != null) {
                                            foreach ($value->//getIngredientes() as $ing):
                                                if ($ing!=null){
                                                echo $ing->//getName();
                                                echo '  ';
                                                } else {
                                                    
                                                }
                                            endforeach;
                                           */ ?>
                                             <?php// }else {
                                              echo 'No Hay Ingredientes';
                                                ?>
                                             <?php }
                            ?><div class="pull-right"><a class="btn btn-success btn-lg"  href="index.php?id=<?php// echo $value->//getId(); ?>&action=ingredientePlato" >Agregar Ingrediente</a>    
                                            </div></td>
                                    <td><a class="btn btn-danger btn-lg"  href="index.php?id=<?php// echo $value->//getId(); ?>&preparado" onclick="return validar();">Actualizar</a></td>
                                </tr>
    <?php// endforeach; ?>

                        </tbody>
                    </table>
                <?php
           //     } else {
                    echo '<h1>No Hay Datos</h1>';
           



                ?>
            </div>  
              
        </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
          
            <!-- /.row -->
        
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="view/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="view/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="view/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript 
    <script src="view/vendor/raphael/raphael.min.js"></script>
    <script src="view/vendor/morrisjs/morris.min.js"></script>
    <script src="view/data/morris-data.js"></script>
-->
    <!-- Custom Theme JavaScript -->
    <script src="view/dist/js/sb-admin-2.js"></script>
       <!-- DataTables JavaScript -->
    <script src="view/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="view/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="view/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="view/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        });
    });
    </script>
</body>

</html>


