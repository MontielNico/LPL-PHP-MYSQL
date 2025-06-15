<?php

function muestro_form_ingreso($mensaje)
{
?>
<form name="formulario" method="post" action="index.php">
  <center>
    <table width="300" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2" align="center" bgcolor="#CCCCCC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><?php echo $mensaje; ?></strong></font></td>
      </tr>
      <tr>
        <td width="150" height="40" valign="middle"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Usuario</font></td>
        <td width="150" height="40" align="center" valign="middle"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
          <input name="usuario" type="text" id="usuario">
        </font></td>
      </tr>
      <tr>
        <td width="150" height="40" valign="middle"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Password</font></td>
        <td width="150" height="40" align="center" valign="middle"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
          <input name="clave" type="password" id="clave">
        </font></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input name="boton" type="submit" id="boton" value="Enviar"></td>
      </tr>
      </table>
  </center>
</form>
<?php 
}

function muestro_menu_opciones()
{	echo 'Bienvenido <strong>'.$_SESSION['usuario'].'</strong>. Este es su men� de opciones:<br>';
	echo '| <a href="index.php">Inicio</a> | ';
	echo '<a href="pagina1.php">Opci�n 1</a> | ';
	echo '<a href="pagina2.php">Opci�n 2</a> | ';
	echo '<a href="cierre_sesion.php">Cerrar sesi�n</a> |';
}

function muestro_pagina($titulo)
{	echo "<hr>";
	echo "<h2><center>".$titulo."</center></h2>";
	echo "<hr>";
}

function muestro_mensaje_usuario_no_valido()
{	echo 'No est� autorizado a ver est� p�gina. Por favor <a href="index.php">inicie sesi�n</a>';

}

function muestro_mensaje_cierre_sesion()
{	echo 'Se ha cerrado la sesi�n. Para ingresar nuevamente, vuelva a la <a href="index.php">p�gina de inicio</a>';
}


function usuario_valido($usu, $pass)
{	return ($usu == "nestor" && $pass == "5f0bd8ea4a350a5c8e6fc99183946f7f");
}
?>