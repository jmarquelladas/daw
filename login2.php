<!DOCTYPE html>
<html lang="es-es">
<head>
	<title>Inicio de sesión</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./include/css/principal.css">
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Para adaptarlo a smartphones y Tablets -->
	<!-- Para usar w3.css en la web es necesario realizar un enlace a "w3.css" -->
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">	 <!-- Enlace al Framework del estilo w3.css -->
</head>
<body>
	<?php include 'funciones.inc.php'; ?>
	<div class="w3-container">
		<div class="w3-right-align w3-small">
			<p><?php echo fecha(); ?></p>
		</div>
	</div>
	<?php
	if(isset($_REQUEST['aceptar'])) {
		echo "Pulsado ACEPTAR";
		if($_REQUEST['sesion'] = "1") {
			echo "<p>Sesion no guardada</p>";
		}
	}
	?>
	<div class="w3-container">
		<div class="w3-row">
			<div class="w3-third w3-container"></div>
			<div class="w3-third w3-container">
				<center>
					<img src="./include/img/logo100.png" alt="Logo Empresa" height="25%" class="w3-image">
					<h1>Gestión de permisos</h1>
					<h3>Inicie sesión para acceder</h3>
				</center>
				<form class="w3-container">
					<p>
						<label class="w3-label" for="email"></label>
						<input class="w3-input w3-border w3-round" type="email" name="correo" placeholder="Correo electrónico">
					</p>
					<p>
						<label class="w3-label" for="contrase"></label>
						<input class="w3-input w3-border w3-round" type="password" name="contrasenia" placeholder="Contraseña">
					</p>
					<p>
						<label>
							<input type="checkbox" name="sesion" value="1"> No cerrar la sesión
						</label>
					</p>
					<p>
						<button class="w3-btn" type="submit" name="aceptar">Aceptar</button>
						<br/>
						<a href="#">Recordar datos de cuenta</a>
						<br/>
						<a href="#">Crear cuenta</a>
					</p>
				</form>
			</div>
			<div class="w3-third w3-container"></div>
		</div>
	</div>
	<div style="padding-top:60px"></div>
</body>
</html>