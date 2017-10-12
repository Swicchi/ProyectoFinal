<?php

require_once "conexionDB.php";

/*
  CLASE PARA LA GESTION DE LOS USUARIOS
 */

class Usuario extends conexionDB {
    
    

    function LoginUsuario($user, $pass) {
        $this->conectar();
        $query = $this->consulta("SELECT rutEmpleado,contrasena FROM empleado WHERE rutEmpleado= '$user' AND contrasena = '$pass'");

        if ($this->count_filas($query) > 0) {
            return true;
        } else {
            return false;
        }
    }


    function LoginSeguridad($user, $pass) {
        $this->conectar();
        $query = $this->consulta("SELECT tipoCuenta FROM empleado WHERE rutEmpleado= '$user' AND contrasena = '$pass'");
        $result = mysql_fetch_array($query);
        if ($result[0] == true) {
            return true;
        } else {
            return false;
        }
    }


    function getClientes() {
        //conexion a la base de datos
        $this->conectar();
        $query = $this->consulta("SELECT * FROM cliente");

        if ($this->count_filas($query) > 0) { // existe -> datos correctos
            //se llenan los datos en un array
            while ($tsArray = $this->fetch_assoc($query))
                $data[] = $tsArray;

            return $data;
        } else {
            return '';
        }

        $this->disconnect();
    }

    function saveClientesBD($rut, $nombre, $apellidoP, $apellidoM, $correo, $telefono, $calle, $nCasa, $villa, $mt) {
        $this->conectar();
        $query = $this->consulta("SELECT * FROM cliente where rutCliente ='$rut'");
        if ($this->count_filas($query) > 0) {
            return FALSE;
            $this->disconnect();
        } else {
            $query = "INSERT INTO `cliente`(`rutCliente`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `correo`, `telefono`, `calle`, `nCasa`, `villa`,`mtJardin`)"
                    . " VALUES('$rut', '$nombre', '$apellidoP', '$apellidoM', '$correo', '$telefono','$calle', '$nCasa', '$villa','$mt')";

            return $this->consulta($query);
            $this->disconnect();
        }
    }

    function deleteCliente($rut) {
        $this->conectar();
        $query = "DELETE FROM `cliente` WHERE rutCliente = '$rut'";
        return $this->consulta($query);
        $this->disconnect();
    }

    function getCliente($rut) {
        $this->conectar();
        $query = "SELECT * FROM `cliente` WHERE `rutCliente` = '$rut'";
        $query = $this->consulta($query);
        $tsArray = $this->fetch_assoc($query);
        return $tsArray;
    }

    function updateClientesBD($rutActual, $rut, $nombre, $apellidoP, $apellidoM, $correo, $telefono, $calle, $nCasa, $villa, $mt) {
        $this->conectar();
        $query = "UPDATE `cliente` SET "
                . "`rutCliente`='$rut',`nombre`='$nombre',`apellidoPaterno`='$apellidoP',`apellidoMaterno`='$apellidoM',"
                . "`correo`='$correo',`telefono`='$telefono',`calle`='$calle',`nCasa`='$nCasa',`villa`='$villa',`mtJardin`='$mt' WHERE `rutCliente` = '$rutActual'";
        $this->consulta($query);
        $this->disconnect();
    }

}

?>