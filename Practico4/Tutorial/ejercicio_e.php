<?php
$numero = rand(2,15);
$cadena = "";

for ($i=0; $i < $numero ; $i++) { 
    for ($j=0; $j < $i ; $j++) { 
        echo  " ".$i;
    }
    echo "<br>";
}

?>