<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'username', 'password', 'database');

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Vaciar inventario
$sql = "TRUNCATE TABLE productos";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array('mensaje' => 'Inventario vaciado correctamente'));
} else {
    echo json_encode(array('mensaje' => 'Error al vaciar inventario'));
}

$conn->close();
?>