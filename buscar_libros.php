<?php
$conexion = new mysqli("localhost", "root", "", "libreria");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$busqueda = $_GET['q']; // lo que escribió el usuario

// Preparamos la consulta
// like ? seria el valor que se le pasa a la consulta
// ? es un marcador de posición que se reemplaza por el valor real al ejecutar la consulta
$sql = "SELECT * FROM libros WHERE titulo LIKE ?";
$stmt = $conexion->prepare($sql);
$like = "%" . $busqueda . "%";
// bind_param vincula el valor de la variable $like al marcador de posición ? en la consulta SQL
$stmt->bind_param("s", $like);
$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    while ($libro = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($libro['titulo']) . "</td>";
        echo "<td>" . htmlspecialchars($libro['autor']) . "</td>";
        echo "<td>" . htmlspecialchars($libro['editorial']) . "</td>";
        echo "<td>" . htmlspecialchars($libro['año']) . "</td>";
        echo "<td>
                <div class='dropdown'>
                    <button type='button' class='btn btn-secondary dropdown-toggle ms-1 mb-1' data-bs-toggle='dropdown' aria-expanded='false' data-bs-auto-close='outside'>
                        Editar
                    </button>
                    <form action='actualizar_libro.php' method='POST' class='dropdown-menu p-4'>
                        <input type='hidden' name='id' value=" . $libro['id'] . ">
                        <div class='mb-3'>
                            <label>Título:</label>
                            <input type='text' name='titulo'><br><br>
                        </div>
                        <div class='mb-3'>
                            <label>Autor:</label>
                            <input type='text' name='autor'><br><br>
                        </div>
                        <div class='mb-3'>
                            <label>Editorial:</label>
                            <input type='text' name='editorial'><br><br>
                        </div>
                        <div class='mb-3'>
                            <label>Año:</label>
                            <input type='number' name='año'><br><br>
                        <button type='submit' class='btn btn-primary'>Modificar</button>
                    </form>
                </div>

                <a href='eliminar_libro.php?id=" . $libro['id'] . "' onclick=\"return confirm('¿Seguro que querés eliminar este libro?')\">
                    <button class='btn btn-outline-danger ms-1'>Eliminar</button>
                </a>

              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No se encontraron libros</td></tr>";
}

$conexion->close();
?>
