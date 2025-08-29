<?php
include("connection.php");

if (!$connection) {
    die(" Error de conexión.");
}

if (isset($_GET['id'])) {
    $petId = intval($_GET['id']);
    $sql = "SELECT name, email, phno FROM lost_request WHERE id = $petId";
    $result = mysqli_query($connection, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='contact-card'>";
        echo "<p><strong>Nombre del contacto:</strong> " . htmlspecialchars($row['name']) . "</p>";
        echo "<p><strong>Correo:</strong> " . htmlspecialchars($row['email']) . "</p>";
        echo "<p><strong>Teléfono:</strong> " . htmlspecialchars($row['phno']) . "</p>";
        echo "</div>";
    } else {
        echo "<p>No se encontró la información del contacto.</p>";
    }
} else {
    echo "<p>ID no especificado.</p>";
}
?>
