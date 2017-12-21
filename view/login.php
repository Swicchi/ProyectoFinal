<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administración del sistema de restaurante</title>

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

<body background="img/back.jpg">

    <div class="container">
        <div class="row">
            <br>
            <br>
            <div style=" text-align:center">
            <div  style="filter:alpha(opacity=50); opacity:0.5; display:inline-block; " class="panel">
            <h1  class="text-center">SISTEMA DE RESTAURANTES
            </h1>
            
             </div>
                <div>
            <div class="col-md-4 col-md-offset-4">
                <div   class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ingrese sus datos de usuario</h3>
                    </div>
                    <div  class="panel-body">
                        <form role="form" action="index.php?loginUser" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Ingrese nombre de Usuario" name="user" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Ingrese clave" name="password" type="password" value="" minlength="8">
                                </div>
                               
                                <!-- Change this to a button or input when using this as a form -->
                                 <button type="submit" class="btn btn-lg btn-success btn-block">Ingresar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="view/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="view/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="view/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="view/dist/js/sb-admin-2.js"></script>

</body>

</html>
