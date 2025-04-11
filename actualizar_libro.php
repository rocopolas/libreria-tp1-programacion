<?php
$conexion = new mysqli("localhost", "root", "", "libreria");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$editorial = $_POST['editorial'];
$año = $_POST['año'];

$sql = "UPDATE libros SET titulo = ?, autor = ?, editorial = ?, año = ? WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("sssii", $titulo, $autor, $editorial, $año, $id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Libro actualizado con éxito.";
} else {
    echo "No se realizaron cambios o hubo un error.";
}

// Podés redirigir de vuelta:
header("Location: index.html");
exit();
?>
