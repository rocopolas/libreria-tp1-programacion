<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $año = $_POST['año'];

    $conn = new mysqli('localhost', 'root', '', 'libreria');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO libros (titulo, autor, editorial, año) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssi", $titulo, $autor, $editorial, $año);

        if ($stmt->execute()) {
            header("Location: index.html");
            exit();
        } else {
            echo "Error al agregar el libro: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $conn->close();
}

?>