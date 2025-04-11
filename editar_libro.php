<?php
$conexion = new mysqli("localhost", "root", "", "libreria");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
// Verificamos si se ha pasado un ID por GET
$id = $_GET['id'];

$sql = "SELECT * FROM libros WHERE id = ?";
$stmt = $conexion->prepare($sql);
// El marcador de posición ? se reemplaza por el valor de $id al ejecutar la consulta
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

// Verificamos si se encontró un libro con ese ID
if ($resultado->num_rows === 1) {
    $libro = $resultado->fetch_assoc();
} else {
    echo "Libro no encontrado.";
    exit();
}
?>

<h2>Editar libro</h2>
<form action="actualizar_libro.php" method="POST">
    <input type="hidden" name="id" value="<?= $libro['id'] ?>">

    <label>Título:</label>
    <input type="text" name="titulo" value="<?= htmlspecialchars($libro['titulo']) ?>"><br><br>

    <label>Autor:</label>
    <input type="text" name="autor" value="<?= htmlspecialchars($libro['autor']) ?>"><br><br>

    <label>Editorial:</label>
    <input type="text" name="editorial" value="<?= htmlspecialchars($libro['editorial']) ?>"><br><br>

    <label>Año:</label>
    <input type="number" name="año" value="<?= htmlspecialchars($libro['año']) ?>"><br><br>

    <button type="submit">Guardar cambios</button>
</form>
