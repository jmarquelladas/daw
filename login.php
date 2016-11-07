<!DOCTYPE html>
<html lang="en">
<head>
	<title>Entrada</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<img src="./include/img/logo100.png" alt="Logo Empresa" class="img-responsive" height="25%" >
		<h1>Gestión de permisos</h1>
		<h2>Inicia sesión para acceder</h2>
		<form>
			<div class="form-group">
				<label for="exampleInputEmail1">Usuario o Dirección de correo electrónico</label>
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Correo electrónico">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Contraseña</label>
				<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox"> No cerrar sesión
				</label>
			</div>
			<button type="submit" class="btn btn-default">Aceptar</button>
			<a class="help-block" href="#">No recuerdo los datos de mi cuenta</a>
		</form>
		<a href="#">Crear cuenta</a>
	</div>
</body>
</html>