<?php
// 1. Centro numérico
function esCentroNumerico($n) {
    $sumaIzq = 0;
    for ($i = 1; $i < $n; $i++) {
        $sumaIzq += $i;
    }
    $sumaDer = 0;
    $j = $n + 1;
    while ($sumaDer < $sumaIzq) {
        $sumaDer += $j++;
    }
    return $sumaIzq === $sumaDer;
}

// 2. Número feliz
function esFeliz($n) {
    $vistos = [];
    while ($n != 1 && !isset($vistos[$n])) {
        $vistos[$n] = true;
        $n = array_sum(array_map(fn($d) => $d * $d, str_split((string)$n)));
    }
    return $n == 1;
}

// 3. Número Armstrong
function esArmstrong($n) {
    $digitos = str_split((string)$n);
    $suma = 0;
    $num_digitos = count($digitos);
    foreach ($digitos as $d) {
        $suma += pow((int)$d, $num_digitos);
    }
    return $suma == $n;
}

// 4. Número Capicúa
function esCapicua($n) {
    return (string)$n === strrev((string)$n);
}

// 5. Número Perfecto
function esPerfecto($n) {
    $suma = 0;
    for ($i = 1; $i < $n; $i++) {
        if ($n % $i == 0) $suma += $i;
    }
    return $suma === $n;
}

// 6. Número Deficiente
function esDeficiente($n) {
    $suma = 0;
    for ($i = 1; $i < $n; $i++) {
        if ($n % $i == 0) $suma += $i;
    }
    return $suma < $n;
}

// 7. Número Abundante
function esAbundante($n) {
    $suma = 0;
    for ($i = 1; $i < $n; $i++) {
        if ($n % $i == 0) $suma += $i;
    }
    return $suma > $n;
}

// 8. Número Triangular
function esTriangular($n) {
    $i = 1;
    $suma = 0;
    while ($suma < $n) {
        $suma += $i++;
    }
    return $suma == $n;
}

// 9. Número de Harshad
function esHarshad($n) {
    $suma = array_sum(str_split((string)$n));
    return $suma != 0 && $n % $suma == 0;
}

// 10. Número Automórfico
function esAutomorfico($n) {
    $cuadrado = $n * $n;
    return str_ends_with((string)$cuadrado, (string)$n);
}

// 11. Número Cuadrado Feliz
function esCuadradoFeliz($n) {
    $raiz = sqrt($n);
    return $raiz == floor($raiz) && esFeliz($n);
}
?>
