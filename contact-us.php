<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | PawFinder</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="./images/logos/logovp.png" type="image/png">
</head>
<body onload="myFunction()">
<div class="load" id="loader"><hr/><hr/><hr/><hr/></div>
    <div id="main" style="display:none;" class="animate-bottom">
        <?php include 'header.php'; ?>

        <div id="bread">
            <h2 class="main-title">Contactanos</h2> 
            <p>Inicio / Contactanos</p>  
        </div>

        
        <div id="contact-container">
        <div class="contact-info">
            <h2>Contactanos</h2>
            <p>Si tiene alguna pregunta o comentario, contáctenos. Estamos aquí para ayudarle.</p>
            <p>Email: contact@vuelvepeludo.com</p>
            <p>Phone: +55 1234567890</p>
        </div>
        <div class="contact-form">
            <h3>Envia un mensaje</h3>
            <form>
                <input type="text" placeholder="Tu nombre" id="name">
                <input type="email" placeholder="Tu Email" id="email">
                <textarea placeholder="Tu mensaje" id="message"></textarea>
                <button type="submit" class="btn-primary">Enviar</button>
            </form>
        </div>
    </div>



        <?php include 'footer.php'; ?>
    </div>


    <script src="./scripts/script.js"></script>
</body>
</html>