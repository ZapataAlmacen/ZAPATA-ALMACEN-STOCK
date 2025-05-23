<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'username', 'password', 'database');

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Generar QR
$producto = $_GET['producto'];

$sql = "SELECT * FROM productos WHERE id = '$producto'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombre = $row['nombre'];
    $imagen = $row['imagen'];
    $ubicacion = $row['ubicacion'];
    $numeroParte = $row['numeroParte'];
    $cantidad = $row['cantidad'];

    // Generar QR
    $qr = array(
        'nombre' => $nombre,
        'imagen' => $imagen,
        'ubicacion' => $ubicacion,
        'numeroParte' => $numeroParte,
        'cantidad' => $cantidad
    );

    echo json_encode($qr);
} else {
    echo json_encode(array('mensaje' => 'Producto no encontrado'));
}

$conn->close();
?>