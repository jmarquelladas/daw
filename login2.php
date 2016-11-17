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
	<div class="w3-container">
		<div class="w3-row">
			<div class="w3-third w3-container"></div>
			<div class="w3-third w3-container">
				<img src="./include/img/logo100.png" alt="Logo Empresa" height="25%" class="w3-image">
				<h1>Gestión de permisos</h1>
				<h3>Inicie sesión para acceder</h3>
				<form>
					<div>
						<label for="email"></label>
						<input type="email" placeholder="Correo electrónico">
					</div>
					<div>
						<label for="contrase"></label>
						<input type="password" placeholder="Contraseña">
					</div>
					<div>
						<label>
							<input type="checkbox"> No cerrar la sesión
						</label>
					</div>
					<button type="submit">Aceptar</button>
					<a href="#">No recuerdo los datos de mi cuenta</a>
				</form>
				<a href="#">Crear cuenta</a>
			</div>
			<div class="w3-third w3-container"></div>
		</div>
	</div>
</body>
</html>