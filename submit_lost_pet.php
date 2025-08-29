<?php
include("connection.php");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Escapar datos del formulario
    function limpiar($data, $conn) {
        return mysqli_real_escape_string($conn, trim($data));
    }

    // Datos del contacto
    $name    = limpiar($_POST['name'], $connection);
    $email   = limpiar($_POST['email'], $connection);
    $tel     = limpiar($_POST['tel'], $connection);
    $address = limpiar($_POST['add'], $connection);

    // Datos de la mascota
    $petType  = limpiar($_POST['petType'], $connection);
    $petBreed = limpiar($_POST['petBreed'], $connection);
    $size     = limpiar($_POST['size'], $connection);
    $petName  = limpiar($_POST['petname'], $connection);
    $color    = limpiar($_POST['color'], $connection);
    $desc     = limpiar($_POST['desc'], $connection);

    // Datos del extravío
    $lostDate     = limpiar($_POST['lostdate'], $connection);
    $lostTime     = limpiar($_POST['losttime'], $connection);
    $lostLocation = limpiar($_POST['lostadd'], $connection); // corregido aquí

    // Manejo de imágenes
    $imageUrls = [];
    $uploadDir = 'image_uploads/';

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    if (isset($_FILES['images']['name'])) {
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            if (!empty($_FILES['images']['name'][$key])) {
                $file_name = basename($_FILES['images']['name'][$key]);
                $file_tmp  = $_FILES['images']['tmp_name'][$key];
                $uniqueName = uniqid() . "_" . preg_replace("/[^a-zA-Z0-9.\-_]/", "_", $file_name);
                $targetPath = $uploadDir . $uniqueName;

                if (move_uploaded_file($file_tmp, $targetPath)) {
                    $imageUrls[] = $uniqueName;
                }
            }
        }
    }

    $imageUrlsString = implode(',', $imageUrls);

    // Inserción en la base de datos
    $sql = "INSERT INTO lost_request (
        name, email, phno, address,
        pet_type, pet_breed, pet_size, pet_name, pet_color, pet_description,
        lost_date, lost_time, lost_address, lost_images_url
    ) VALUES (
        '$name', '$email', '$tel', '$address',
        '$petType', '$petBreed', '$size', '$petName', '$color', '$desc',
        '$lostDate', '$lostTime', '$lostLocation', '$imageUrlsString'
    )";

    if (mysqli_query($connection, $sql)) {
        session_start();
        $_SESSION['form_submitted'] = true;
        header("Location: thank-you.php");
        exit;
    } else {
        echo " Error al guardar los datos: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>
