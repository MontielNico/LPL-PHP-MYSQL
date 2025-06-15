<?php
$cadena = "Mi primera pagina php";

echo "longitud de la cadena = ". strlen($cadena) . "<br>";
echo "cadena en Mayusculas = ". strtoupper($cadena) . "<br>";
echo "cantidad de letras 'a' = ". substr_count($cadena, "a") . "<br>";
echo "cadena invertida = " . strrev($cadena);

?>