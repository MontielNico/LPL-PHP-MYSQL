<?php session_start(); ?>
<html>
<head>
<title>Sesiones - P&aacute;gina de inicio</title>
</head>

<body>
<?php
require_once("Funciones.req.php");
if (isset($_SESSION['usuario']))
{	//El usuario est� autenticado. Muestro el men� de opciones
	muestro_menu_opciones();
	muestro_pagina("Inicio");
}
else
{	//El usuario a�n no inicio la sesi�n. Verifico si ingreso los datos o ingresa por primera vez
	if (isset($_POST['boton']) && $_POST['boton']=="Enviar")
	{	//Ingreso los datos. Los verifico
		$nom_usuario = $_POST['usuario'];
		$huella_pass = md5($_POST['clave']);

		if (usuario_valido($nom_usuario, $huella_pass))
		{	//El usuario es v�lido. Registro la variable de sesi�n
			$_SESSION['usuario'] = $nom_usuario;
			muestro_menu_opciones();
			muestro_pagina("Inicio");
		}
		else
		{	//No es un usuario v�lido. Muestro un mensaje de error y el formulario de ingreso de datos
			muestro_form_ingreso("Error en los datos ingresados.<br>Int�ntelo nuevamente");
		}
	}
	else
	{	//El usuario est� ingresando por primera vez. Muestro el formulario de ingreso de datos
		muestro_form_ingreso("Inicio de sesi�n");
	}
}
?>
</body>
</html>