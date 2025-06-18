<?php 
    $error="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mascotas Perdidas | Vuelve Peludo</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="./images/logos/logovp.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">    
</head>
<body onload="myFunction()">
<div class="load" id="loader"><hr/><hr/><hr/><hr/></div>
    <div id="main" style="display:none;" class="animate-bottom">
        <?php include 'header.php'; ?>

        <div id="bread">
            <h2 class="main-title">Macotas encontradas</h2> 
            <p>Casa / Mascotas perdidas</p>  
        </div>
        <div id="found-pet">
            <div class="found-content mob-flex-column">
                <div class="found-content-left mob-width-100">
                    <img src="./images/found_image.jpg" alt="found-image" class="found-img">
                </div>
                <div class="found-content-right mob-width-100">
                    <img src="./images/comma.svg" alt="comma" class="comma">
                    <p>Cada dia, innumerables mascotas se pierden, lo que deja una gran desolación para la familia, en este momento, tu tienes la oportunidad de poder hacer una pequeña diferencia.
                    Favor de llenar el siguiente formualrio si encontraste a una mascota perdida, proporciona la mayor información que puedas y no escatimes en características.
                    
                    </p>
                    <div>
                        <h4 style="margin-bottom:15px"> Por qué tu contribución es importante?:</h4>
                        <ul style="list-style:none;">
                            <li><i class="ri-checkbox-circle-fill"></i>Reunir familias: Con tu ayuda podemos hacer llegar esperanza para encontrar a un miembro de la familia</li>
                            <li><i class="ri-checkbox-circle-fill"></i>Traer alegría: Imagínate el momento en que una familia vuelve a abrazar a su querida mascota. Al participar en este proceso, estás siendo un catalizador de esos momentos mágicos.  </li>
                            <li><i class="ri-checkbox-circle-fill"></i> Formar una comunidad: Tu participación fortalece esta red y asegura que más mascotas encuentren el camino de vuelta a casa, mientras promueve un espíritu de cuidado mutuo</li>
                        </ul>
                    </div>
                </div>              
            </div>
            <div class="found-form">
                <form action="submit_found_pet.php" method="POST" enctype="multipart/form-data">
                    <div class="contact-details">
                        <h2>Información del dueño </h2>
                        <p class="found-form-para">Tu información es privada y secreta, nos encargaremos de darle buen uso y solo será utilizadda para fines de apoyo a este programa</p> 
                        <div class="d-flex gap-15 mob-flex-column">
                            <input type="text" id="name" name="name" placeholder="Tu nombre completo *" required/>  
                            <input type="email" id="email" name="email" placeholder="Correo electrónico *" required  />
                        </div>
                        <div>
                            <input type="tel" id="tel" name="tel" placeholder="Número de celular *" required />  
                            <textarea placeholder="Tu ubicación *"  id="add" name="add" required></textarea>
                        </div>
                    </div>
                    <div class="pet-details">
                        <h2>Información de tu mascota</h2>
                        <p class="found-form-para">Por favor de ser muy especifíco con las características de tu mascota</p> 
                        <div class="d-flex gap-15 mob-flex-column">
                            <select id="pettype" name="petType" onchange="populateSecondSelect()" required>
                                <option value="">Selecciona tipo *</option>
                                <option value="dog">Perro</option>
                                <option value="cat">Gato</option>
                                <option value="rabbit">Conejo</option>
                                <option value="turtle">Tortuga</option>
                                <option value="cow">Vaca</option>
                            </select> 
                            <select id="petbreed" name="petBreed" required>
                                <option value="">Seleccione una raza * (Primero elija el tipo)</option>
                            </select> 
                            <select id="size" name="size" required>
                                <option value="">Seleccione un tamaño *</option>
                                <option value="large">Grande</option>
                                <option value="medium">Mediano</option>
                                <option value="small">Pequeño</option>
                            </select>  
                            <input type="text" id="pet-name" name="petname" placeholder="Nombre de mascota (Si hay uno)" required/> 
                            <input type="text" id="color" name="color" placeholder="Color de la mascota *" required/> 
                        </div>
                            <textarea placeholder="Descripcion de la mascota.. *"  id="desc" name="desc" required></textarea>
                    </div>
                    <div class="found-details">
                        <h2>Informacion en la cual la mascota fue encontrada</h2>
                        <p class="found-form-para">Favor de ser específico con la información</p>
                            <label for="Date">Fecha</label>
                            <input type="date" id="date" name="founddate" placeholder="Fecha en la que fue encontrada" required/> 
                            <label for="Date">Hora </label>
                            <input type="time" id="time" name="foundtime" placeholder="Hora en la que fue encontrada" required/> 
                            <label for="address">Ubicación</label>
                            <textarea placeholder="Ubicación donde fue encontrada *"  id="found-add" name="found-add" required></textarea> 
                            <label for="address">Subir imágenes</label>
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
    <script src="./scripts/script.js"></script>
</body>
</html>