<?php
include("connection.php");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$search = isset($_GET['search']) ? mysqli_real_escape_string($connection, $_GET['search']) : '';

$sql = "SELECT * FROM found_request 
        WHERE pet_name LIKE '%$search%' OR
              pet_type LIKE '%$search%' OR
              pet_breed LIKE '%$search%' OR
              pet_color LIKE '%$search%' OR
              pet_description LIKE '%$search%' OR
              found_date LIKE '%$search%'";

$result = $connection->query($sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if (!empty($row['found_images_url'])) {
            $imageUrls = explode(',', $row['found_images_url']);
            $imageUrl = trim($imageUrls[0]); // Usamos solo la primera

            $singlePageLink = 'single-found-pet.php?id=' . $row['id'];
            $limitedDescription = (strlen($row['pet_description']) > 100) 
                                    ? substr($row['pet_description'], 0, 100) . '...'
                                    : $row['pet_description'];

            $petName = $row['pet_name'] ?: 'Desconocido';

            echo '<a class="item-link" href="' . $singlePageLink . '">';
            echo '<div class="card item">';
            echo '<img loading="lazy" class="data-image" src="image.php?image=' . htmlspecialchars($imageUrl) . '" alt="Imagen de mascota">';
            echo '<div class="card-info">';
            echo '<p class="card-category">' . htmlspecialchars($row['pet_type']) . '</p>';
            echo '<h2 class="card-title">' . htmlspecialchars($petName) . '</h2>';
            echo '<p class="card-desc">' . htmlspecialchars($limitedDescription) . '</p>';
            echo '<p class="card-detail">Fecha encontrada: ' . htmlspecialchars($row['found_date']) . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</a>';
        }
    }
} else {
    echo '<p>No se encontraron mascotas encontradas que coincidan.</p>';
}

mysqli_close($connection);
