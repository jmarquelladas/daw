<?php

/* 
 * Descripción: Funciones principales y comunes
 * Versión - Fecha: 1.0 15/nov/2016
 * Autor: José Miguel Arquelladas
 * Email: jmaruiz@gmail.com
 * Twitter: @jmarquelladas
 */

class Funciones {
    
    // Definición de constantes de la Clase
    const USUARIO = "root";
    const PASSW = "gr8814am";
    const NOM_BD = "permisosrrhh";

    /**
     * Función accesoDB: Establece la conexión a la BD y devuelve error 
     * en caso de no poder realizarse.
     * No recibe parámetros.
     * @return \PDO Objeto PDO con la conexión realizada a la BD foro4.
     */
    public function accesoBD() {

        try {
            // Configuramos las opciones de conexión a la BBDD
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $dsn = "mysql:host=localhost; dbname=".self::NOM_BD;
            $conex = new PDO($dsn, self::USUARIO, self::PASSW, $opciones);
            // Configuramos los atributos para controlar los errores.
            $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conex;
        } 
            catch (PDOException $ex) {
            return array($ex->getCode(), $ex->getMessage());
        }
    } // Función accesoBD
    
    /**
     * Función getUsuariosNombre: Devuelve los datos de usuario y nombre completo que ha sido 
     * buscada en la tabla trabajadores con una cadena pasada en el formulario de busqueda.
     * @param string $cadena La cadena introducida para realizar la busqueda
     * @return array $listado Arreglo con los datos o registros que coinciden con la cadena de busqueda.
     */
    public function getUsuariosNombre($cadena) {
        // Creamos la sentencia SQL
        $sql = "SELECT id, ape1||' '||ape2||', '||nombre AS nombre_completo FROM usuarios ";
        $sql .= "WHERE nombre LIKE '%'$cadena'%'";
        $sql .= "ORDER BY nombre_completo";
        // Realizamos la conexión a la BD.
        $conexion = self::accesoBD();
        // Comprobamos se se ha realizado la conexión correctamente
        if(!is_array($conexion)){
            // Realizamos la consulta
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            // volcamos los datos en un arreglo
            $listado = $consulta->fetchAll();
            // Cerramos la conexión a la BD
            unset($conexion);
            return $listado;
        } else { // No ha podido ser posible conectar a la BD.
            // Mensajes del error de conexión a la BD.
            echo "Código del error: ".$resultado[0]."<br/>";
            echo "Mensaje del error: ".$resultado[1]."<br/>";
            return FALSE;
        }
    }
}
