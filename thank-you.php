<?php
session_start();

if (!isset($_SESSION['form_submitted'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gracias | Vuelve Peludo</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="./images/logos/icon.png" type="image/png">
</head>
<body onload="myFunction()">
<div class="load" id="loader"><hr/><hr/><hr/><hr/></div>
    <div id="main" style="display:none;" class="animate-bottom">
        <?php include 'header.php'; ?>

        <div id="bread">
            <h2 class="main-title">Gracias</h2> 
            <p>Inicio / Gracias</p>  
        </div>

        <h1>Felicitaciones! Con tu ayuda ayudarás a una mascota a encontar su camino a casa </h1>

        <div class="long"></div>
        <?php include 'footer.php'; ?>
    </div>


    <script src="./scripts/script.js"></script>
</body>
</html>