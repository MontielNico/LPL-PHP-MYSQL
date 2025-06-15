<?php
// ───────────────────────────────
// ALGORITMOS MATEMÁTICOS EN PHP
// ───────────────────────────────

// Verifica si un número es primo
function esPrimo($n) {
    if ($n < 2) return false;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) return false;
    }
    return true;
}

// Genera lista de primos hasta N
function primosHasta($n) {
    $primos = [];
    for ($i = 2; $i <= $n; $i++) {
        if (esPrimo($i)) $primos[] = $i;
    }
    return $primos;
}

// Devuelve los divisores de un número
function divisores($n) {
    $res = [];
    for ($i = 1; $i <= $n; $i++) {
        if ($n % $i == 0) $res[] = $i;
    }
    return $res;
}

// Calcula el factorial de un número
function factorial($n) {
    $res = 1;
    for ($i = 2; $i <= $n; $i++) {
        $res *= $i;
    }
    return $res;
}

// Suma los dígitos de un número
function sumaDigitos($n) {
    $suma = 0;
    foreach (str_split((string)$n) as $digito) {
        $suma += (int)$digito;
    }
    return $suma;
}

// Verifica si un número es centro numérico
function esCentroNumerico($n) {
    $sumaIzq = 0;
    for ($i = 1; $i < $n; $i++) {
        $sumaIzq += $i;
    }

    $sumaDer = 0;
    $j = $n + 1;
    while ($sumaDer < $sumaIzq) {
        $sumaDer += $j;
        $j++;
    }

    return $sumaIzq == $sumaDer;
}

// Resuelve una ecuación simple tipo "x op b = res"
function resolverEcuacion($a, $b, $res, $op) {
    switch($op) {
        case '+': return $res - $b;
        case '-': return $res + $b;
        case '*': return $res / $b;
        case '/': return $b != 0 ? $res * $b : null;
        default: return null;
    }
}

// Genera una secuencia aritmética
function secuenciaAritmetica($inicio, $razon, $cantidad) {
    $seq = [];
    for ($i = 0; $i < $cantidad; $i++) {
        $seq[] = $inicio + $i * $razon;
    }
    return $seq;
}

// Genera una secuencia geométrica
function secuenciaGeometrica($inicio, $razon, $cantidad) {
    $seq = [];
    for ($i = 0; $i < $cantidad; $i++) {
        $seq[] = $inicio * pow($razon, $i);
    }
    return $seq;
}

// Evalúa el resultado de una operación básica
function resultadoOperacion($a, $b, $op) {
    switch ($op) {
        case '+': return $a + $b;
        case '-': return $a - $b;
        case '*': return $a * $b;
        case '/': return $b != 0 ? $a / $b : null;
        default: return null;
    }
}

// Genera un número aleatorio entre dos valores
function numeroAleatorio($min, $max) {
    return rand($min, $max);
}

// Selecciona una operación aleatoria
function operacionAleatoria() {
    $ops = ['+', '-', '*', '/'];
    return $ops[array_rand($ops)];
}

// Valida si el valor es un número
function esNumeroValido($valor) {
    return is_numeric($valor);
}
?>
