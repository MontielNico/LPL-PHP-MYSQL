<?php

$conn = new mysqli("localhost", "root", "", "franquicia");

if (isset($_GET['texto'])) {
    $texto = $_GET['texto'];
    $sql = "SELECT descripcion FROM producto WHERE descripcion LIKE '%$texto%' LIMIT 3";
    $res = $conn->query($sql);

    $sugerencias = [];

    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $sugerencias[] = $row;
        }
    }

    echo json_encode($sugerencias);
}
?>