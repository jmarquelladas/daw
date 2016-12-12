<?php

/*
Descripción: Página de inicio de la Web. Inicio o login de usuario.
Versión: 0.1 
Fecha: 12/12/2016
Autor: José Miguel Arquelladas
Email: jmaruiz@gmail.com
Twitter: @jmarquelladas
*/

// Realizamos la carga de las clases
require_once('DB.php');

// Realizamos la carga de la librería Smarty
require_once('Smarty.class.php');

// Creamos el nuevo objeto Smarty y configuramos las 
// rutas de los directorios de smarty
$smarty = new Smarty;
$smarty->template_dir = "./smarty/templates";
$smarty->compile_dir = "./smarty/templates_c";
$smarty->config_dir = "./smarty/configs";
$smarty->cache_dir = "./smarty/cache";


// Inicio de formulario de inicio de administracion
// Comprobamos si ha sido seleccionada esta opcion
if(isset($_REQUEST['aceptar'])) { // Se ha pulsado el botón de administrar usuarios

    if(!empty($_REQUEST['usuario']) && !empty($_REQUEST['contras'])) {
        $usuario = $_REQUEST['usuario'];
        $contras = $_REQUEST['contras'];

        if(DB::verificaUsuario($usuario, $contras)) { // Las credenciales son correctas
            session_start(); // iniciamos sesion para control de cookies
            $_SESSION['usuarios']['usuario'] = $usuario;
            $_SESSION['usuarios']['inicio'] = time();
            setcookie('usuario',$usuario);
            header('Location: cuentas.php');
        } else {
            // Si las credenciales no son correctas, se vuelven a pedir.
            $smarty->assign('mensaje','Usuario o contraseña no válidos');
            $smarty->assign('opcion','usuarios');
            $smarty->display('login.tpl');

        }
    } else {
        // Si las credenciales estan vacías
        $smarty->assign('mensaje', 'Debe introducir un nombre de usuario y una contraseña.');
        $smarty->assign('opcion','');
        $smarty->assign('login.tpl');
    }
?>