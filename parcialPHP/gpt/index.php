<?php
session_start();

// Clase Usuario
class Usuario {
    private $nombre;
    private $edad;

    public function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function presentarse() {
        return "Hola, soy $this->nombre y tengo $this->edad años.";
    }
}

// Cerrar sesión si se pidió
if (isset($_GET['logout'])) {
    setcookie("nombre", "", time() - 3600); // Borra la cookie
    session_destroy(); // Destruye la sesión
    header("Location: index.php");
    exit;
}

// Procesamiento del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];

    // Guardar en cookie y sesión
    setcookie("nombre", $nombre, time() + 300); // 5 minutos
    $_SESSION["edad"] = $edad;
}

// Ver si ya hay datos (cookie y sesión)
$nombreGuardado = isset($_COOKIE["nombre"]) ? $_COOKIE["nombre"] : null;
$edadGuardada = isset($_SESSION["edad"]) ? $_SESSION["edad"] : null;

// Mostrar saludo si hay datos guardados
if ($nombreGuardado && $edadGuardada) {
    $usuario = new Usuario($nombreGuardado, $edadGuardada);
    echo "<p>" . $usuario->presentarse() . "</p>";
    echo '<a href="index.php?logout=1">Cerrar sesión</a>';
} else {
    // Mostrar formulario
    ?>
    <form method="post" action="">
        Nombre: <input type="text" name="nombre" required><br>
        Edad: <input type="number" name="edad" required><br>
        <input type="submit" value="Iniciar sesión">
    </form>
    <?php
}
?>
