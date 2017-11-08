<?php

/*
  CLASE PARA LA CONEXION Y LA GESTION DE LA BASE DE DATOS Y LA PAGINA WEB
 */
class conexionDB {
    private $conexion;

    /* METODO PARA CONECTAR CON LA BASE DE DATOS */
    public function conectar() {
        if (!isset($this->conexion)) {
            $this->conexion = mysqli_connect("localhost","remferna","TbHpo54sQSSS","remferna");
        }
    }

    /* METODO PARA REALIZAR UNA CONSULTA 
      INPUT:
      $sql | codigo sql para ejecutar  la consulta
      OUTPUT: $result
     */
    public function consulta($sql) {
        $resultado = mysqli_query($this->conexion,$sql);
        if (!$resultado) {
            echo 'MySQL Error: ' . mysqli_error($this->conexion);
            exit;
        }
        return $resultado;
    }

    /* METODO PARA CONTAR EL NUMERO DE RESULTADOS
      INPUT: $result
      OUTPUT:  cantidad de registros encontrados
     */
    public function count_filas($result) {
       
        return mysqli_num_rows($result);
    }

    /* METODO PARA CREAR ARRAY DESDE UNA CONSULTA
      INPUT: $result
      OUTPUT: array con los resultados de una consulta
     */
    public function fetch_assoc($result) {
        
        return mysqli_fetch_assoc($result);
    }
     public function fetch_array($result) {
       
        return mysqli_fetch_array($result);
    }

    /* METODO PARA CERRAR LA CONEXION A LA BASE DE DATOS */
    public function disconnect() {
        mysqli_close($this->conexion);
    }
}

?>