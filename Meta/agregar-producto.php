<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'username', 'password', 'database');

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Agregar producto
$nombre = $_POST['nombre'];
$imagen = $_POST['imagen'];
$ubicacion = $_POST['ubicacion'];
$numeroParte = $_POST['numeroParte'];
$cantidad = $_POST['cantidad'];

$sql = "INSERT INTO productos (nombre, imagen, ubicacion, numeroParte, cantidad) VALUES ('$nombre', '$imagen', '$ubicacion', '$numeroParte', '$cantidad')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array('mensaje' => 'Producto agregado correctamente'));
} else {
    echo json_encode(array('mensaje' => 'Error al agregar producto'));
}

$conn->close();
?>