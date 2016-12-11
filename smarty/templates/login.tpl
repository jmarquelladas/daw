<!DOCTYPE html>
<!--
Descripción: Template smarty para index.php
Versión - Fecha: 1.0
Autor: José Miguel Arquelladas
Email: jmaruiz@gmail.com
Twitter: @jmarquelladas
-->

<html>
    <head>
        <title>Inicio de sesión Banca Electónica DWES 2015-2016</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
        <link href="estilo.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <div id="contenedor" >
            <div id='menu'>
                <h3>Banco DWES. Entrada a la Banca.</h3>
                <!-- Comprobamos la opción a mostrar en pantalla
                Opciones:
                    * inicio: menu inicial
                    * administrar: comprobacion de credenciales del administrador y entrada al menu de administración
                    * usuarios: comprobacion de credenciales de usuario y entrada al menu de usuario
                -->

                <!-- Opción inicio -->
                {if $opcion=="inicio"}
                    <!-- Menu inicial de opciones -->
                    <form name="opciones_inicio" action="index.php" method="post">
                        <div id="botones_formulario">
                            <input type="submit" name="admin" value="Administrar Usuarios" class="botones">
                            <input type="submit" name="sesion" value="Iniciar sesión" class="botones">
                        </div>
                    </form>
                {/if}

                <!-- Opción administrar -->
                {if $opcion=="administrar"}
                    <!-- Formulario inicio administrador -->
                    <h3>Inicio administración</h3>
                    <h4>{$mensaje}</h4>
                    <form name="inicio_administracion" caption="index.php" method="post">
                        <p><input type="text" name="login" placeholder="Login" autofocus></p>
                        <p><input type="password" name="contras" placeholder="Contraseña"></p>
                        <div id="botones_formulario">
                            <input type="submit" name="admin" value="Iniciar Administración" class="botones">
                            <input type="submit" name="cancelar" value="Salir" class="botones">
                        </div>
                    </form>
                {/if}

                <!-- Opcion usuarios -->
                {if $opcion=="usuarios"}
                    <!-- Formulario inicio usuario -->
                    <h3>Inicio de sesión</h3>
                    <h4>{$mensaje}</h4>
                    <form name="inicio_sesion" caption="index.php" method="post">
                        <p><input type="text" name="usuario" placeholder="Usuario" autofocus></p>
                        <p><input type="password" name="contras" placeholder="Contraseña"></p>
                        <div id="botones_formulario">
                            <input type="submit" name="sesion" value="Iniciar sesión" class="botones">
                            <input type="submit" name="cancelar" value="Salir" class="botones">
                        </div>
                    </form>
                {/if}
            </div>
            <div id="pie">
                <p class="pie_pagina">Tarea 5 - DWES. DAW 2015-2016.<br/>José Miguel Arquelladas Ruiz</p>
            </div>
        </div>
    </body>
</html>

