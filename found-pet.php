<?php
    $error = "";
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mascotas Encontradas | Vuelve Peludo</title>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="icon" href="./images/logos/logovp.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">    
    <script src="/vuelve-peludo/scripts/script.js"></script>
</head>
<body onload="myFunction()">
<div class="load" id="loader"><hr/><hr/><hr/><hr/></div>
<div id="main" style="display:none;" class="animate-bottom">
    <?php include 'header.php'; ?>

    <div id="bread">
        <h2 class="main-title">Mascotas encontradas</h2> 
        <p>Inicio / Mascotas encontradas</p>  
    </div>

    <div id="lost-pet" class="d-flex flex-column align-items-center">
        <div class="owl-carousel">
            <?php
                if (!$connection) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM found_request ORDER BY RAND()";
                $result = $connection->query($sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if (!empty($row['found_images_url'])) {
                            $imageUrls = explode(',', $row['found_images_url']);
                            foreach ($imageUrls as $imageUrl) {}

                            $singlePageLink = 'single-found-pet.php?id=' . $row['id'];
                            $limitedDescription = (strlen($row['pet_description']) > 100) ? substr($row['pet_description'], 0, 100) . '...' : $row['pet_description'];
                            $petName = $row['pet_name'] ?: 'Desconocido';

                            echo '<a class="item-link" href="' . $singlePageLink . '">';
                            echo '<div class="card item">';
                            echo '<img loading="lazy" class="data-image" src="image.php?image=' . $imageUrl . '" alt="Pet Image">';
                            echo '<div class="card-info">';
                            echo '<p class="card-category">'. $row['pet_type'] . '</p>';
                            echo '<h2 class="card-title">' . $petName . '</h2>';
                            echo '<p class="card-desc">' . $limitedDescription . '</p>';
                            echo '<p class="card-detail">Fecha encontrada: ' . $row['found_date'] . '</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</a>';
                        } else {
                            echo '<img src="placeholder.jpg" alt="No Image Available">';
                        }
                    }
                }

                mysqli_close($connection);
            ?>
        </div>

        <a href="all-found-pet.php" class="btn-primary"> Ver todas las mascotas encontradas</a>

        <!-- FORMULARIO -->
        <div class="found-form">
            <form action="submit_found_pet.php" method="POST" enctype="multipart/form-data">
                <div class="contact-details">
                    <h2>Tu información</h2>
                    <p class="found-form-para">Tu información es privada y solo será utilizada con fines de contacto en caso de coincidencia.</p> 
                    <div class="d-flex gap-15 mob-flex-column">
                        <input type="text" name="name" placeholder="Tu nombre completo *" required/>  
                        <input type="email" name="email" placeholder="Correo electrónico *" required/>
                    </div>
                    <div>
                        <input type="tel" name="tel" placeholder="Número de celular *" required />  
                        <textarea name="add" placeholder="Tu ubicación *" required></textarea>
                    </div>
                </div>

                <div class="pet-details">
                    <h2>Información de la mascota</h2>
                    <p class="found-form-para">Por favor, sé específico con las características.</p> 
                    <div class="d-flex gap-15 mob-flex-column">
                        <select id="pettype" name="petType" onchange="populateSecondSelect()" required>
                            <option value="">Seleccione un tipo *</option>
                            <option value="dog">Perro</option>
                            <option value="cat">Gato</option>
                            <option value="bird">Pájaro</option>
                            <option value="rabbit">Conejo</option>
                            <option value="hamster">Hámster</option>
                            <option value="cuyo">Cuyo</option>
                            <option value="other">Otro</option>
                        </select> 
                        <select id="petbreed" name="petBreed" required>
                            <option value="">Seleccione una raza * (Primero elija el tipo)</option>
                        </select> 

                        <select name="size" required>
                            <option value="">Seleccione un tamaño *</option>
                            <option value="large">Grande</option>
                            <option value="medium">Mediano</option>
                            <option value="small">Pequeño</option>
                        </select>  
                        <input type="text" name="petname" placeholder="Nombre de la mascota (si lo sabes)" /> 
                        <input type="text" name="color" placeholder="Color de la mascota *" required/> 
                    </div>
                    <textarea name="desc" placeholder="Descripción de la mascota *" required></textarea>
                </div>

                <div class="found-details">
                    <h2>Detalles del hallazgo</h2>
                    <p class="found-form-para">Indica cuándo y dónde la encontraste.</p>
                    <label for="date">Fecha:</label>
                    <input type="date" name="founddate" required/> 
                    <label for="time">Hora:</label>
                    <input type="time" name="foundtime" required/> 
                    <label for="found_add">Ubicación:</label>
                    <textarea name="found_add" placeholder="Ubicación donde fue encontrada *" required></textarea> 
                    
                    <label for="photo-upload">Subir imágenes</label>
                    <div class="custom-upload">
                        <label for="photo-upload" class="custom-upload-label">
                            <i class="ri-camera-line"></i> <span>Elegir fotos</span> 
                            <input type="file" name="images[]" id="photo-upload" multiple accept="image/*" class="custom-upload-input" required>
                        </label>
                        <div id="selected-photos" class="selected-photos">
                            <p>Ninguna foto ha sido seleccionada</p>
                        </div>
                        <div id="preview-container" class="preview-container mob-flex-column"></div>
                    </div>
                </div>
                <input class="btn-primary found-submit" type="submit" value="Enviar">
            </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</div>

<script src="/vuelve-peludo/scripts/script.js"></script>
<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        loop:true,
        margin:10,
        autoplay:false,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        responsiveClass:true,
        responsive:{
            0:{ items:1, nav:false },
            600:{ items:3, nav:false },
            1000:{ items:4, nav:false }
        }
    });
</script>

</body>
</html>
