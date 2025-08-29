<?php
include("connection.php");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$search = isset($_GET['search']) ? mysqli_real_escape_string($connection, $_GET['search']) : '';

// Consulta solo sobre la tabla de mascotas perdidas
$sql = "SELECT * FROM lost_request 
        WHERE pet_name LIKE '%$search%' OR
              pet_type LIKE '%$search%' OR
              pet_description LIKE '%$search%' OR
              lost_date LIKE '%$search%'";

$result = $connection->query($sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Si hay imagen
        if (!empty($row['lost_images_url'])) {
            $imageUrls = explode(',', $row['lost_images_url']);
            $imageUrl = trim($imageUrls[0]); // Usamos solo la primera

            $singlePageLink = 'single-lost-pet.php?id=' . $row['id'];
            $limitedDescription = (strlen($row['pet_description']) > 100) 
                                    ? substr($row['pet_description'], 0, 100) . '...'
                                    : $row['pet_description'];

            echo '<a class="item-link" href="' . $singlePageLink . '">';
            echo '<div class="card item">';
            echo '<img loading="lazy" class="data-image" src="image.php?image=' . htmlspecialchars($imageUrl) . '" alt="Pet Image">';
            echo '<div class="card-info">';
            echo '<p class="card-category">' . htmlspecialchars($row['pet_type']) . '</p>';
            echo '<h2 class="card-title">' . htmlspecialchars($row['pet_name']) . '</h2>';
            echo '<p class="card-desc">' . htmlspecialchars($limitedDescription) . '</p>';
            echo '<p class="card-detail">Fecha Extravío: ' . htmlspecialchars($row['lost_date']) . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</a>';
        } else {
            // En caso de no tener imagen
            echo '<div class="card item">';
            echo '<img src="placeholder.jpg" alt="No Image Available">';
            echo '<div class="card-info">';
            echo '<p class="card-category">' . htmlspecialchars($row['pet_type']) . '</p>';
            echo '<h2 class="card-title">' . htmlspecialchars($row['pet_name']) . '</h2>';
            echo '<p class="card-desc">' . htmlspecialchars($row['pet_description']) . '</p>';
            echo '<p class="card-detail">Fecha Extravío: ' . htmlspecialchars($row['lost_date']) . '</p>';
            echo '</div>';
            echo '</div>';
        }
    }
} else {
    echo '<p>No se encontraron resultados.</p>';
}

mysqli_close($connection);
?>
