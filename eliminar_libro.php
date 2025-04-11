<?php
$conexion = new mysqli("localhost", "root", "", "libreria");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$id = $_GET['id'];

$sql = "DELETE FROM libros WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

// Verificamos si se eliminó algún registro
if ($stmt->affected_rows > 0) {
    echo "Libro eliminado con éxito.";
} else {
    echo "No se encontró el libro o hubo un error.";
}

// Redirige de nuevo a la lista principal
header("Location: index.html"); // o index.php, según tu caso
exit();
?>
