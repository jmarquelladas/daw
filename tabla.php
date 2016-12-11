<?php

/*
Descripción: Página de inicio de la Web. Inicio o login de usuario.
Versión: 1.0
Fecha: 11/12/2016 - 22:20
Autor: José Miguel Arquelladas
Email: jmaruiz@gmail.com
Twitter: @jmarquelladas
*/

$listado = array(
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	array('codigo' => '001', 'nombre' => 'José Miguel', 'ape1' => 'Arquelladas', 'ape2' => 'Ruiz'),
	);

//print_r($listado);

?>

<DOCTYPE html>
<html>
<head>
    <title>Ejemplo de tabla mostrando datos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link href="estilo.css" type="text/css" rel="stylesheet"/>
</head>
<body>
	<div class="w3-container">
		<table class="w3-table-all w3-hoverable">
			<thead>
				<tr class="w3-red">
					<td>Codigo</td><td>Nombre</td><td>Apellido 1º</td><td>Apellido 2º</td>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($listado as $linea => $registro) {
					echo '<tr class="w3-hover-blue">';
					foreach ($registro as $columna => $dato) {
						echo '<td>'.$dato.'</td>';
					}
					echo '</tr>';
				}
				?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4">Fin de listado</td>
				</tr>
			</tfoot>
		</table>
	</div>
</body>