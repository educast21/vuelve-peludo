<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Vuelve Peludo - Tu aliado en la búsqueda de mascotas perdidas </title>
    <link rel="manifest" href="manifest.json" />
    <link rel="icon" href="./images/logos/logovp.png" type="image/png">
</head>
<body onload="myFunction()">
<div class="load" id="loader"><hr/><hr/><hr/><hr/></div>
    <div id="main" style="display:none;" class="animate-bottom">
        <?php include 'header.php'; ?>

        <div id="hero" class="nav-animate">
            <h3 class="sub-title animate__animated animate__fadeInUp">Bienvenido a Vuelve Peludo</h3>  
            <h2 class="main-title animate__animated animate__fadeInUp">Tu aliado en la búsqueda de mascotas perdidas</h2> 
            <div class="btn-grp">
                <a href="./lost-pet.php" class="btn-primary hero-btn-1 animate__animated animate__fadeInUp">Reportar peludo</a>
                <a href="./found-pet.php" class="btn-primary hero-btn-2 animate__animated animate__fadeInUp">Encontre un peludo</a>
            </div> 
            <img src="./images/hero-bg.png" alt="pet-image" class="pet-image animate__animated animate__fadeInUp">
            <h1 class="bg-text animate__animated animate__fadeInUp">Pets</h1>
        </div>

        <div id="about">
            <div class="left-abt">
            <h1 class="bg-text">Love</h1>
                <img src="./images/img3.png" alt="about" class="abt-img">
            </div>
            <div class="right-abt">
                <h3 class="sub-title">Conoce más sobre Vuelve Peludo</h3>  
                <h2 class="main-title">El corazón detrás de Vuelve Peludo</h2> 
                <p class="abt-content">Vuelve Peludo es una plataforma creada con el corazón, pensada para ayudar a quienes han perdido una mascota o han encontrado una sin hogar. 
Aquí, la comunidad se une para que cada peludo regrese a su familia.</p>
                <a href="about-us.php" class="btn-primary">Leer más</a>
            </div>
        </div>


        <div id="testimonial">
            <div class="uper-testi">
                <h1 class="main-title">Testimonios</h1>
                <p class="sub-title">Historias reales de personas que recuperaron a sus mascotas gracias a Vuelve Peludo.</p>
            </div>
            <div class="lower-testi">
                <div class="owl-carousel">
                        <div class="item">
                            <div class="testi-content">
                                <p class="text-justify">"Mi perrita Luna se perdió en el parque y no sabíamos qué hacer. Subimos su foto a Vuelve Peludo y, en menos de 24 horas, una persona la reconoció y nos contactó. ¡Estamos eternamente agradecidos!"</p>
                                <div>
                                    <h3>Maria López.</h3>
                                    <h3>Ciudad de México.</h3>
                                </div>
                                <img src="./paw-40.svg" alt="paw-bg" class="testi-bg">
                            </div>
                        </div>

                        <div class="item">
                            <div class="testi-content">
                                <p class="text-justify">"Encontré un perrito perdido cerca de mi casa y no sabía cómo ayudar. Gracias a Vuelve Peludo pude subir su información y su familia lo encontró en cuestión de horas."</p>
                                <div>
                                    <h3>Javier Torres.</h3>
                                    <h3>Monterrey, Nuevo León.</h3>
                                <img src="./paw-40.svg" alt="paw-bg" class="testi-bg">
                                    
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="testi-content">
                                <p class="text-justify">"Nuestro gato Max desapareció por varios días. Pensábamos que no volvería, pero gracias a una publicación en Vuelve Peludo, una vecina lo reconoció y nos avisó. ¡Fue increíble!"</p>
                                <div>
                                    <h3>Fernanda Ruiz.</h3>
                                    <h3>Ecatepec, Estado de México</h3>
                                <img src="./paw-40.svg" alt="paw-bg" class="testi-bg">

                                </div>
                            </div>
                        </div>
 
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </div>


    <script src="./scripts/script.js"></script>
    <script>
            // Testimonials

        var owl = $('.owl-carousel');
                owl.owlCarousel({
                    loop:true,
                    margin:10,
                    autoplay:true,
                    autoplayTimeout:2000,
                    autoplayHoverPause:true,
                    responsiveClass:true,
                    responsive:{
                        0:{
                            items:1,
                            nav:false
                        },
                        600:{
                            items:2,
                            nav:false
                        },
                        1000:{
                            items:3,
                            nav:true,
                        }
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