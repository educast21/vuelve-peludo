<?php
include("connection.php");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Iniciar sesión
    session_start();

    // Contacto
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $tel = trim($_POST['tel']);
    $address = trim($_POST['add']);

    // Mascota
    $petType = trim($_POST['petType']);
    $petBreed = trim($_POST['petBreed']);
    $size = trim($_POST['size']);
    $petName = empty(trim($_POST['petname'])) ? 'Desconocido' : trim($_POST['petname']);
    $color = trim($_POST['color']);
    $desc = trim($_POST['desc']);

    // Hallazgo
    $foundDate = $_POST['founddate'];
    $foundTime = $_POST['foundtime'];
    $foundLocation = $_POST['found_add']; // corregido el nombre del campo

    // Imagen
    $imageUrls = [];
    $uploadDir = 'image_uploads/';
    $allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];

    if (isset($_FILES['images']['name'])) {
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $file_name = $_FILES['images']['name'][$key];
            $file_tmp = $_FILES['images']['tmp_name'][$key];

            if ($file_name && in_array(mime_content_type($file_tmp), $allowedTypes)) {
                $new_name = uniqid() . "_" . basename($file_name);
                $dest_path = $uploadDir . $new_name;

                if (move_uploaded_file($file_tmp, $dest_path)) {
                    $imageUrls[] = $new_name; // solo se guarda el nombre del archivo
                }
            }
        }
    }

    $imageUrlsString = implode(',', $imageUrls);

    // Consulta segura con prepared statement
    $stmt = $connection->prepare("
        INSERT INTO found_request 
        (name, email, phno, address, pet_type, pet_breed, pet_size, pet_name, pet_color, pet_description, found_date, found_time, found_address, found_images_url)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    if ($stmt) {
        $stmt->bind_param("ssssssssssssss", $name, $email, $tel, $address, $petType, $petBreed, $size, $petName, $color, $desc, $foundDate, $foundTime, $foundLocation, $imageUrlsString);

        if ($stmt->execute()) {
            $_SESSION['form_submitted'] = true;
            header("Location: thank-you.php");
            exit;
        } else {
            echo "Error al guardar: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $connection->error;
    }
}

mysqli_close($connection);
?>
