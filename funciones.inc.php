<?php

/*
 * Descripción: Funciones comunes php
 * Versión - Fecha: 1.0
 * Autor: José Miguel Arquelladas
 * Email: jmaruiz@gmail.com
 * Twitter: @jmarquelladas
 */


/* Esta función realiza la conexión a la base de datos
 * y comprueba si existen errores en dicha conexión.
 */
function conectar_bbdd() {

    try {
        $conex_banca = new PDO('mysql:host=localhost; dbname=banca_electronica', 'root', 'gr8814am');
        // Configuramos los atributos para controlar los errores
        $conex_banca->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conex_banca;
    }
    catch (PDOException $e) {
        return array($e->getCode(), $e->getMessage());
    }
}


/*
 * Función que realiza una consulta a una bbdd y devuelve el resultado
 */
function consulta_bbdd_array($sql, $conexion) {

    $resultado = $conexion->prepare($sql);
    $resultado->execute();
    // El resultado de la ejecución de la consulta se vuelva a un array
    return $resultado->fetchAll();
}


/* Esta función comprueba si en un dato introducido desde un formulario
 * html y para importes, se introduce una coma (,).
 * Si es así se sustituye por un punto (.) para que el dato
 * sea validado y la parte decimal se tenga en cuenta.
*/
function validar_importe($cantidad) {
    if(strpos($cantidad, ',')) { // El dato de $cantidad tiene una coma
        // Sustituimos por un punto la coma
        $cantidad = str_replace(',', '.', $cantidad);
    }
    return $cantidad;
}


/*
 * Función que devuelve la fecha actual de forma textual
 */
function fecha() {
    date_default_timezone_set("Europe/Madrid"); // Configuramos zona horaria.
    $num_mes = date("m"); // Mes en número
    $num_dia_semana = date("w"); // Día de la semana en número
    // Comprobamos el mes y le damos valor en texto
    switch ($num_mes) {
        case 1: $mes = "enero";
            break;
        case 2: $mes = "febrero";
            break;
        case 3: $mes = "marzo";
            break;
        case 4: $mes = "abril";
            break;
        case 5: $mes = "mayo";
            break;
        case 6: $mes = "junio";
            break;
        case 7: $mes = "julio";
            break;
        case 8: $mes = "agosto";
            break;
        case 9: $mes = "septiembre";
            break;
        case 10: $mes = "octubre";
            break;
        case 11: $mes = "noviembre";
            break;
        case 12: $mes = "diciembre";
            break;
    }

    // Hallamos el día de la semana y le damos valor en texto
    switch ($num_dia_semana) {
        case 0: $dia_semana = "lunes";
            break;
        case 1: $dia_semana = "martes";
            break;
        case 2: $dia_semana = "miércoles";
            break;
        case 3: $dia_semana = "jueves";
            break;
        case 4: $dia_semana = "viernes";
            break;
        case 5: $dia_semana = "sábado";
            break;
        case 6: $dia_semana = "domingo";
            break;
    }

    return $dia_semana.", ".date("j")." de ".$mes." de ".  date("Y") .".";
}

/*
 * Función que muestra los datos de los movimientos en un listado realizado
 * con etiquetas html para tablas
 * Parámetros:
 * $movimientos: Array con los movimientos consultados
 * $tam: tamaño del listado
 * $saldo: array con el saldo de los movimientos
 */
function listado_movimientos($movimientos, $tam, $saldo) {
    $tam_arr = count($movimientos); // Definimos el tamaño del array principal

    ?>
    <!-- Creamos el formulario dentro de una capa div -->
    <div name="listado" class='jmtables'>
        <!-- Creación de la tabla dentro del formulario -->
        <table>
            <thead>
                <tr>
                    <th colspan="5">Listado de los últimos <?php echo $tam;?> movimientos. Total: <?php echo $tam_arr ?> movimientos.</th>
                </tr>
                <tr>
                    <th>Codigo</th><th>Fecha</th><th>Concepto</th><th>Cantidad</th><th>Saldo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($movimientos)) { // Si existen movimientos

                    // Inicializamos la variable que nos indicará en que elemento
                    // del array el listado finaliza
                    if (count($movimientos)>$tam) {
                        $parada = count($movimientos)-$tam;
                    } else {
                        $parada = 0;
                    }

                    // Recorremos los registros del array principal
                    for ($celda=count($movimientos)-1; $celda>=$parada; $celda--) {
                        // creamos la linea de tabla
                        echo '<tr>';
                        // 1º columna/celda -> Codigo
                        echo '<td>'.$movimientos[$celda][0].'</td>';

                        // 2ª columna/celda -> fecha
                        // Pasamos la cadena a tipo fecha
                        $fecha = new DateTime($movimientos[$celda][2]);
                        // Formato
                        $fecha = $fecha->format('d/m/Y');
                        // Mostramos el resultado
                        echo '<td>'.$fecha.'</td>';

                        // 3ª columna/celda -> concepto
                        echo '<td>'.$movimientos[$celda][3].'</td>';

                        // 4ª columna/celda -> cantidad
                        if($movimientos[$celda][4] < 0)
                            echo '<td><span style="color:red";>'.number_format( (float) $movimientos[$celda][4],2,",",".").'€</span></td>'; // Añadimos signo negativo al movimiento
                        else
                            echo '<td>'.number_format( (float) $movimientos[$celda][4],2,",",".").'€</td>';

                        // 5ª columna/celda -> saldo
                        if($saldo[$celda] < 0)
                            echo '<td><span style="color:red";>'.number_format( (float) $saldo[$celda],2,",",".").'€</span></td>'; // Añadimos signo negativo al movimiento
                        else
                            echo '<td>'.number_format( (float) $saldo[$celda],2,",",".").'€</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">Sin movimientos</td></tr>';
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <!-- Insertamos en el pié del extracto el mensaje de fin de extracto
                    y la información del saldo actual de la cuenta -->
                    <td colspan="5"><p>Fin del extracto de movimientos. Saldo actual:
                    <?php
                    if(!empty($saldo)) { // Hay movimientos, añadimos la información del saldo.
                        echo '<strong>'.number_format( (float) $saldo[count($saldo)-1],2,",",".").' €';
                    } else { // No existen movimientos
                        echo '0,00€';
                    }
                    ?>
                    </strong></p></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <?php
}

/*
 * Función que muestra en un listado los movimientos de un array enviado como parámetro
 * Parámetros:
 * $movimientos: Array con los movimientos consultados
 */
function listado($movimientos) {
    $tam_arr = count($movimientos); // Definimos el tamaño del array principal

    ?>
    <!-- Creamos el formulario dentro de una capa div -->
    <div name="listado" class='jmtables'>
        <!-- Creación de la tabla dentro del formulario -->
        <table>
            <thead>
                <tr>
                    <th colspan="4">Listado de recibos.</th>
                </tr>
                <tr>
                    <th>Codigo</th><th>Fecha</th><th>Concepto</th><th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($movimientos)) { // Si existen movimientos

                    // Recorremos los registros del array principal
                    for ($celda=count($movimientos)-1; $celda>=0; $celda--) {
                        // creamos la linea de tabla
                        echo '<tr>';
                        // 1º columna/celda -> Codigo
                        echo '<td>'.$movimientos[$celda][0].'</td>';

                        // 2ª columna/celda -> fecha
                        // Pasamos la cadena a tipo fecha
                        $fecha = new DateTime($movimientos[$celda][2]);
                        // Formato
                        $fecha = $fecha->format('d/m/Y');
                        // Mostramos el resultado
                        echo '<td>'.$fecha.'</td>';

                        // 3ª columna/celda -> concepto
                        echo '<td>'.$movimientos[$celda][3].'</td>';

                        // 4ª columna/celda -> cantidad
                        if($movimientos[$celda][4] < 0)
                            echo '<td><span style="color:red";>'.number_format( (float) $movimientos[$celda][4],2,",",".").'€</span></td>'; // Añadimos signo negativo al movimiento
                        else
                            echo '<td>'.number_format( (float) $movimientos[$celda][4],2,",",".").'€</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="4">Sin movimientos</td></tr>';
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <!-- Insertamos en el pié del extracto el mensaje de fin de extracto
                    y la información del saldo actual de la cuenta -->
                    <td colspan="5"><p>Fin del listado de recibos.</p></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <?php
} // Fin de la Función listado