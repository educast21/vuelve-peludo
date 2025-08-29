<?php 
            // function to get the current page name
        function PageName() {
            return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
        }
        
        $current_page = PageName();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="manifest" href="manifest.json" />
    <link rel="stylesheet" href="./style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    
</head>
<body>
<nav >
        <div class="left-nav">
            <a href="index.php" class="logo"><img src="images/logos/logovp.png" id="logovp" alt=""></a>
        </div>
        <div class="menu menu-close">
            <i class="ri-close-fill hide-pc" id="button-close"></i>
            <ul id="navMenus" class="w-nav-link">
                <li><a class="<?php echo $current_page == 'index.php' ? 'active':NULL ?>" href="index.php">Inicio</a></li>
                <li><a class="<?php echo $current_page == 'about-us.php' ? 'active':NULL ?>" href="about-us.php">Acerca de nosotros</a></li>
                <li><a class="<?php echo $current_page == 'lost-pet.php' ? 'active':NULL ?>" href="lost-pet.php">Reportar peludo</a></li>
                <li><a class="<?php echo $current_page == 'found-pet.php' ? 'active':NULL ?>" href="found-pet.php">Encontre un peludo</a></li>
                <li><a class="<?php echo $current_page == 'tips.php' ? 'active':NULL ?>" href="tips.php">Consejos</a></li>
                <li><a class="<?php echo $current_page == 'contact-us.php' ? 'active':NULL ?>" href="contact-us.php">Contáctanos</a></li>
                <!-- <li><a href="./admin">Admin</a></li> -->
            </ul>

            <div class="menu-bottom-mobile hide-pc">
                <!-- <p>Donate Us</p> -->
                
            </div>
        </div>

        <div class="right-nav">
            
        </div>
    </nav>

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="/scripts/script.js"></script>
    <script>
        $("#button-open").click(function(){
            $(".menu-close").toggleClass("menu-open");
        });

        $("#button-close").click(function(){
            $(".menu-close").toggleClass("menu-open");
        });
    </script>
</body>
</html>