<?php
include("connection.php");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $petId = intval($_GET['id']);

    $sql = "SELECT * FROM found_request WHERE id = $petId";
    $result = $connection->query($sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $imageUrls = explode(',', $row['found_images_url']);
    } else {
        die("Mascota no encontrada.");
    }
} else {
    die("ID de mascota no especificado.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($row['pet_name']); ?> | Vuelve Peludo</title>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="icon" href="./images/logos/logovp.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body onload="myFunction()">
<div class="load" id="loader"><hr/><hr/><hr/><hr/></div>
<div id="main" style="display:none;" class="animate-bottom">
    <?php include 'header.php'; ?>

    <div id="bread">
        <h2 class="main-title"><?php echo htmlspecialchars($row['pet_name']); ?></h2>
        <p>Inicio / Mascotas encontradas / <?php echo htmlspecialchars($row['pet_name']); ?></p>
    </div>

    <div class="main-product mob-flex-column">
        <div class="left-single mob-width-100">
            <div class="owl-carousel">
                <?php foreach ($imageUrls as $imageUrl): ?>
                    <img loading="lazy" class="data-image-full item" src="image.php?image=<?php echo htmlspecialchars(trim($imageUrl)); ?>" alt="Pet Image">
                <?php endforeach; ?>
            </div>
        </div>

        <div class="right-single mob-width-100">
            <h4 class="single-category"><?php echo htmlspecialchars($row['pet_type']); ?></h4>
            <h1 class="single-title"><?php echo htmlspecialchars($row['pet_name']); ?></h1>
            <p class="single-desc"><?php echo htmlspecialchars($row['pet_description']); ?></p>

            <button class="btn-primary contact-btn" data-id="<?php echo $row['id']; ?>">Solicitar información de contacto</button>
            <div id="contact-info" style="display: none; margin-top: 20px;"></div>

            <table class="styled-table">
                <tbody>
                    <tr><td>Raza:</td><td><?php echo htmlspecialchars($row['pet_breed']); ?></td></tr>
                    <tr><td>Tamaño:</td><td><?php echo htmlspecialchars($row['pet_size']); ?></td></tr>
                    <tr><td>Color:</td><td><?php echo htmlspecialchars($row['pet_color']); ?></td></tr>
                    <tr><td>Fecha encontrada:</td><td><?php echo htmlspecialchars($row['found_date']); ?></td></tr>
                    <tr><td>Hora encontrada:</td><td><?php echo htmlspecialchars($row['found_time']); ?></td></tr>
                    <tr><td>Lugar de hallazgo:</td><td><?php echo htmlspecialchars($row['found_address']); ?></td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Sugerencias -->
    <div id="lost-pet">
        <h1 class="single-title" style="text-align:center; margin-bottom:20px">Otros peludos encontrados</h1>
        <div class="d-flex mob-flex-column">
            <?php
            $sql = "SELECT * FROM found_request WHERE id != $petId ORDER BY RAND() LIMIT 4";
            $result = $connection->query($sql);

            while ($suggestion = mysqli_fetch_assoc($result)) {
                if (!empty($suggestion['found_images_url'])) {
                    $imageUrls = explode(',', $suggestion['found_images_url']);
                    $imageUrl = trim($imageUrls[0]);

                    $singlePageLink = 'single-found-pet.php?id=' . $suggestion['id'];
                    $limitedDescription = (strlen($suggestion['pet_description']) > 100)
                        ? substr($suggestion['pet_description'], 0, 100) . '...'
                        : $suggestion['pet_description'];
                    $petName = empty($suggestion['pet_name']) ? 'Desconocido' : $suggestion['pet_name'];

                    echo '<a class="item-link" href="' . $singlePageLink . '">';
                    echo '<div class="card item">';
                    echo '<img class="data-image" src="image.php?image=' . htmlspecialchars($imageUrl) . '" alt="Pet Image">';
                    echo '<div class="card-info">';
                    echo '<p class="card-category">' . htmlspecialchars($suggestion['pet_type']) . '</p>';
                    echo '<h2 class="card-title">' . htmlspecialchars($petName) . '</h2>';
                    echo '<p class="card-desc">' . htmlspecialchars($limitedDescription) . '</p>';
                    echo '<p class="card-detail">Fecha encontrada: ' . htmlspecialchars($suggestion['found_date']) . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</a>';
                }
            }
            $connection->close();
            ?>
        </div>

        <div style="text-align:center; margin-top:30px">
            <a href="all-found-pet.php" class="btn-primary">Ver todos los peludos encontrados</a>
        </div>
    </div>
</div>

<!-- Mostrar datos de contacto -->
<script>
$(document).ready(function () {
    $('.contact-btn').on('click', function () {
        const petId = $(this).data('id');
        $.get('contact-report.php', { id: petId }, function (data) {
            $('#contact-info').html(data).slideDown();
        });
    });
});
</script>

<!-- Owl Carousel -->
<script src="./scripts/script.js"></script>
<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsive: {
            0: { items: 1, nav: false },
            600: { items: 1, nav: false },
            1000: { items: 1, nav: false }
        }
    });
</script>
</body>
</html>
