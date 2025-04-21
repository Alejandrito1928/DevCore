<?php
header('Content-Type: application/json');

$conexion = new mysqli("localhost", "root", "", "componentes_pc");
if ($conexion->connect_error) {
    die(json_encode(["error" => "Conexión fallida: " . $conexion->connect_error]));
}

$query = "SELECT * FROM productos";
$resultado = $conexion->query($query);

$productos = [];
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $productos[] = $fila;
    }
}

echo json_encode($productos);
$conexion->close();
?>