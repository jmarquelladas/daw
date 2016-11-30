<?php

/*
 * Descripción: login2.php inicio de sesión
 * Versión: 1.0
 * Fecha: 15/octubre/2016
 * Autor: José Miguel Arquelladas
 * Email: jmaruiz@gmail.com
 * Twitter: @jmarquelladas
 */

include 'funciones.inc.php';
include 'DB.php';

if(isset($_REQUEST['aceptar'])) { // Se ha pulsado el botón aceptar de inicio de sesión
	if(isset($_REQUEST['sesion'])) {
	if(DB::verificaUsuario($_REQUEST['correo'], $_REQUEST['contrase'])) { // Las credenciales son correctas)
		session_start(); // Inicio de sesión para control de cookies
        $_SESSION['usuarios']['correo'] = $_REQUEST['correo'];
        $_SESSION['usuarios']['inicio']  = time();
        header('Location: entrada.php');
	} else {
        // Si las credenciales no son correctas, se vuelven a pedir.
        //$smarty->assign('mensaje','Usuario o contraseña no válidos');
        //$smarty->assign('opcion','usuarios');
        //$smarty->display('login.tpl');
	}
}
?>

<!DOCTYPE html>
<html lang="es-es">
<head>
	<title>Inicio de sesión</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Para adaptarlo a smartphones y Tablets -->
	<!-- Hojas de estilo -->
	<!-- Hoja nº1: Estilos de detalles complementarios -->
	<link rel="stylesheet" href="./include/css/principal.css">
	<!-- Para usar w3.css en la web es necesario realizar un enlace a "w3.css" -->
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">	 <!-- Enlace al Framework del estilo w3.css -->
</head>
<body>
	<header class="w3-container">
		<div class="w3-right-align w3-small">
			<p><?php echo fecha(); ?></p>
		</div>
	</header>
	<section class="w3-container">
		<div class="w3-row">
			<div class="w3-third w3-container"></div>
			<div class="w3-third w3-container">
				<center>
					<img src="./include/img/logo100.png" alt="Logo Empresa" height="20%" class="w3-image">
					<h2>Gestión de permisos</h2>
					<h3>Iniciar sesión</h3>
					<h4>Use su cuenta de usuario</h4>
				</center>
				<form class="w3-container" action="login2.php" method="post">
					<p>
						<label class="w3-label" for="email"></label>
						<input class="w3-input w3-border w3-round" type="email" name="correo" placeholder="Correo electrónico">
					</p>
					<p>
						<label class="w3-label" for="contrase"></label>
						<input class="w3-input w3-border w3-round" type="password" name="contrase" placeholder="Contraseña" required>
					</p>
					<p>
						<label>
							<input type="checkbox" name="sesion" value="recordar" checked> No cerrar la sesión
						</label>
					</p>
					<p>
						<button class="w3-btn" type="submit" name="aceptar">Aceptar</button>
						<br/>
						<a class="w3-small" href="#">Recordar datos de cuenta</a>
						<br/>
						<a class="w3-small" href="#">Crear cuenta</a>
					</p>
				</form>
			</div>
			<div class="w3-third w3-container"></div>
		</div>
	</section>
	<footer class="w3-container">
		<div class="w3-third w3-container"></div>
		<center class="w3-third w3-container w3-small">
			<a class="w3-half" href="#">Condiciones de uso</a>
			<a class="w3-half" href="#">Privacidad y cookies</a>
		</center>
		<div class="w3-third w3-container"></div>
	</footer>
</body>
</html>