<?php
if (isset($_GET['image'])) {
    $imageFilename = basename($_GET['image']); 
    $imagePath = 'image_uploads/' . $imageFilename;

    if (file_exists($imagePath)) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $imagePath);
        finfo_close($finfo);

        // ✅ Solo permitir tipos seguros
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (in_array($mimeType, $allowedTypes)) {
            header('Content-Type: ' . $mimeType);
            header('Content-Length: ' . filesize($imagePath));
            readfile($imagePath);
            exit;
        } else {
            http_response_code(403);
            echo 'Tipo de archivo no permitido.';
            exit;
        }
    } else {
        http_response_code(404);
        echo 'Imagen no encontrada.';
        exit;
    }
} else {
    http_response_code(400);
    echo 'Falta el parámetro de imagen.';
    exit;
}
