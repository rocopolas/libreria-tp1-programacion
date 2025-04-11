<?php
$conexion = new mysqli("localhost", "root", "", "libreria");

// Verificamos la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Hacemos la consulta
$sql = "SELECT * FROM libros";
$resultado = $conexion->query($sql);

// Mostramos los libros
// comprueba si hay resultados
if ($resultado->num_rows > 0) {
    // pasa por cada libro
    while ($libro = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($libro['titulo']) . "</td>";
        echo "<td>" . htmlspecialchars($libro['autor']) . "</td>";
        echo "<td>" . htmlspecialchars($libro['editorial']) . "</td>";
        echo "<td>" . htmlspecialchars($libro['año']) . "</td>";
        echo "<td>
                <button onclick=\"editarLibro({$libro['id']})\">Editar</button>
                <button onclick=\"eliminarLibro({$libro['id']})\">Eliminar</button>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No hay libros en la base de datos.</td></tr>";
}

$conexion->close();
?>
