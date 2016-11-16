<?php

/*
Descripción: Página de inicio de la Web. Inicio o login de usuario.
Versión: 1.0 
Fecha: 29/feb/2016
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
if(isset($_REQUEST['admin'])) { // Se ha pulsado el botón de administrar usuarios
    
    if(empty($_REQUEST['login']) || empty($_REQUEST['contras'])) {
        $smarty->assign('mensaje','Debe introducir Login del administrador y su contraseña');
    } else {
        // Comprobación de credenciales del administrador
        $login = $_REQUEST['login'];
        $contras = $_REQUEST['contras'];
        
        if($login=="dwes" && $contras=="dwes") { // comprobamos si las credenciales son correctas
            // credenciales correctas
            $smarty->assign('mensaje','');
            header("Location: administrador.php");
        } else {
            // Si las credenciales no son correctas, se vuelven a pedir.
            $smarty->assign('mensaje','Login o contraseña no válidos');
        }
    }
    $smarty->assign('opcion','administrar');
    $smarty->display('login.tpl');
    
} elseif(isset($_REQUEST['sesion'])) { // Se ha pulsado el botón de inicio de sesión de usuario
    // Inicio de formulario de inicio de sesión de usuario
    // Comprobamos si ya ha sido enviado
    if(empty($_REQUEST['usuario']) || empty($_REQUEST['contras'])) {
        $smarty->assign('mensaje','Debe introducir un nombre de usuario y una contraseña');
        $smarty->assign('opcion','usuarios');
        $smarty->display('login.tpl');
    } else {
        // Comprobación de credenciales en la BBDD
        if(DB::verificaUsuario($_REQUEST['usuario'], $_REQUEST['contras'])) { // Las credenciales son correctas
            session_start(); // Iniciamos sesión
            $_SESSION['usuarios']['usuario'] = $_REQUEST['usuario'];
            $_SESSION['usuarios']['inicio']  = time();
            setcookie('color','#ffffff'); // Creamos la cookie para el color por defecto.
            header('Location: banca.php');
        } else {
            // Si las credenciales no son correctas, se vuelven a pedir.
            $smarty->assign('mensaje','Usuario o contraseña no válidos');
            $smarty->assign('opcion','usuarios');
            $smarty->display('login.tpl');
        }
    }
} else { // No se ha pulsado aún ninguna opción. Mostramos menú inicial.
    $smarty->assign('mensaje','');
    $smarty->assign('opcion','inicio');
    $smarty->display('login.tpl');
}
?>