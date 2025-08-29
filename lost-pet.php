<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mascotas perdidas | Vuelve Peludo</title>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="icon" href="./images/logos/logovp.png" type="image/png">
    <script src="/vuelve-peludo/scripts/script.js"></script>

</head>
<body onload="myFunction()">
<div class="load" id="loader"><hr/><hr/><hr/><hr/></div>
<div id="main" style="display:none;" class="animate-bottom">
    <?php include 'header.php'; ?>

    <div id="bread">
        <h2 class="main-title">Mascotas perdidas</h2> 
        <p>Inicio / Mascotas perdidas</p>  
    </div>

    <div id="lost-pet" class="d-flex flex-column align-items-center">
        <div class="owl-carousel">
            <?php
                include("connection.php");
                if (!$connection) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM lost_request ORDER BY RAND()";
                $result = $connection->query($sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if (!empty($row['lost_images_url'])) {
                            $imageUrls = explode(',', $row['lost_images_url']);
                            foreach ($imageUrls as $imageUrl) {}

                            $singlePageLink = 'single-lost-pet.php?id=' . $row['id'];
                            $limitedDescription = (strlen($row['pet_description']) > 100) ? substr($row['pet_description'], 0, 100) . '...' : $row['pet_description'];

                            echo '<a class="item-link" href="' . $singlePageLink . '">';
                            echo '<div class="card item">';
                            echo '<img loading="lazy" class="data-image" src="image.php?image=' . $imageUrl . '" alt="Pet Image">';
                            echo '<div class="card-info">';
                            echo '<p class="card-category">'. $row['pet_type'] . '</p>';
                            echo '<h2 class="card-title">' . $row['pet_name'] . '</h2>';
                            echo '<p class="card-desc">' . $limitedDescription . '</p>';
                            echo '<p class="card-detail">Fecha de extravío: ' . $row['lost_date'] . '</p>';
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

        <a href="all-lost-pet.php" class="btn-primary"> Ver todas las mascotas perdidas</a>

        <div class="lost-form">
            <form action="submit_lost_pet.php" method="POST" enctype="multipart/form-data">
                <div class="contact-details">
                    <h2>Información del dueño</h2>
                    <p class="lost-form-para">Tu información será usada solo para contactar en caso de hallazgo.</p> 
                    <div class="d-flex gap-15 mob-flex-column">
                        <input type="text" id="name" name="name" placeholder="Nombre completo *" required/>  
                        <input type="email" id="email" name="email" placeholder="Correo electrónico *" required />
                    </div>
                    <div>
                        <input type="tel" id="tel" name="tel" placeholder="Número de teléfono *" required />  
                        <textarea placeholder="Tu ubicación *" id="add" name="add" required></textarea>
                    </div>
                </div>

                <div class="pet-details">
                    <h2>Información de la mascota</h2>
                    <p class="lost-form-para">Por favor sé muy específico con las características de tu mascota.</p> 
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
                        <select id="size" name="size" required>
                            <option value="">Tamaño *</option>
                            <option value="large">Grande</option>
                            <option value="medium">Mediano</option>
                            <option value="small">Pequeño</option>
                        </select>  
                        <input type="text" id="pet-name" name="petname" placeholder="Nombre de la mascota" required/> 
                        <input type="text" id="color" name="color" placeholder="Color de la mascota *" required/> 
                    </div>
                    <textarea placeholder="Descripción de tu mascota.. *" id="desc" name="desc" required></textarea>
                </div>

                <div class="lost-details">
                    <h2>Información del extravío</h2>
                    <p class="lost-form-para">Favor de ser específico con la información</p>
                    <label for="date">Fecha</label>
                    <input type="date" id="date" name="lostdate" required/> 
                    <label for="time">Hora</label>
                    <input type="time" id="time" name="losttime" required/> 
                    <label for="lostadd">Ubicación</label>
                    <textarea placeholder="Ubicación donde fue extraviada *" id="lost-add" name="lostadd" required></textarea> 
                    <label for="photo-upload">Subir imágenes</label>
                    <div class="custom-upload">
                        <label for="photo-upload" class="custom-upload-label">
                            <i class="ri-camera-line"></i> <span>Elegir fotos</span> 
                            <input type="file" name="images[]" id="photo-upload" multiple accept="image/*" class="custom-upload-input" required>
                        </label>
                        <div id="selected-photos" class="selected-photos">
                            <p>Ninguna foto seleccionada</p>
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
    $('.play').on('click',function(){
        owl.trigger('play.owl.autoplay',[1000])
    })
    $('.stop').on('click',function(){
        owl.trigger('stop.owl.autoplay')
    })
</script>


</body>
</html>
