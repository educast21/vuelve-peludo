<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | PawFinder</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="./images/logos/logovp.png" type="image/png">
</head>
<body onload="myFunction()">
<div class="load" id="loader"><hr/><hr/><hr/><hr/></div>
    <div id="main" style="display:none;" class="animate-bottom">
        <?php include 'header.php'; ?>

        <div id="bread">
            <h2 class="main-title">Acerca de nosotros</h2> 
            <p>Inicio / Acerca de nosotros</p>  
        </div>

        <div id="about-page">
            <div class="left-abt">
            <h1 class="bg-text">Pets</h1>
                <img src="./images/img10.png" alt="about" class="abt-img">
            </div>
            <div class="right-abt">
                <h3 class="sub-title">Un poco más acerca de Vuelve Peludo</h3>  
                <h2 class="main-title">El corazón detras de Vuelve Peludo</h2> 
                <p class="abt-content">
    Bienvenido a Vuelve Peludo, una iniciativa solidaria dedicada a ayudar a personas a reencontrarse con sus queridas mascotas. Nuestra misión principal es que cada animal extraviado regrese a casa, a los brazos de quienes lo aman, restaurando así ese vínculo especial que los convierte en parte de la familia. <br><br>
    
    En Vuelve Peludo creemos en el poder de la empatía, la comunidad y la seguridad animal. Nuestra plataforma brinda un espacio donde los dueños pueden reportar mascotas perdidas, compartir historias, recibir apoyo y colaborar para lograr encuentros felices. No es solo una página web: es un punto de esperanza, un refugio virtual donde el amor por los animales nos une. <br><br>
    
    Únete a nosotros en este viaje lleno de ladridos, maullidos y corazones contentos. Vuelve Peludo es mucho más que un proyecto: es un homenaje al amor incondicional entre humanos y mascotas, donde cada reencuentro es una fiesta de alegría y unión.
</p>

                <div class="btn-grp">
                    <a href="./lost-pet.php" class="btn-primary hero-btn-1">Reportar Peludo</a>
                    <a href="./found-pet.php" class="btn-primary hero-btn-2">Encontre un peludo</a>
            </div>

            </div>
        </div>
        <div id="about">  
            <div class="right-abt">
                <h3 class="sub-title">Descubre la esencia de Vuelve Peludo</h3>  
                <h2 class="main-title">Nuestra misión</h2> 
                <p class="abt-content">
    En Vuelve Peludo, nuestra misión constante es reunir a cada mascota perdida con su familia. Creemos que los animales no son solo mascotas, sino miembros amados del hogar, y su bienestar y seguridad nos importan profundamente. Nuestra plataforma es un refugio para los amantes de los animales, un espacio donde la empatía y la comunidad se unen con un propósito común. Estamos comprometidos a crear felicidad ayudando a que cada mascota vuelva al lugar al que pertenece: los brazos de quienes la aman.
    <br><br>
    Vuelve Peludo no es solo un proyecto; es un camino lleno de esperanza que fortalece los lazos de amor y compañía entre los animales y sus familias. Nuestro verdadero éxito se mide en cada reencuentro, en las colas que se mueven de alegría y en esos momentos únicos que reafirman la conexión especial entre humanos y mascotas. Únete a esta misión, y hagamos que más colas se muevan y más corazones sonrían juntos.
</p>

            </div>
            <div class="left-abt">
                <img src="./images/img12.png" alt="mission" style="margin-bottom:65px">
            </div>
        </div>

        <div id="testimonial">
            <div class="uper-testi">
                <h1 class="main-title">Testimonios</h1>
                <p class="sub-title">Historias reales de personas que recuperaron a sus mascotas gracias a Vuelve Peludo..</p>
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
                                <p class="text-justify">Encontré un perrito perdido cerca de mi casa y no sabía cómo ayudar. Gracias a Vuelve Peludo pude subir su información y su familia lo encontró en cuestión de horas."</p>
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
                                    <h3>Ecatepec, Estado de México.</h3>
                                <img src="./paw-40.svg" alt="paw-bg" class="testi-bg">

                                </div>
                            </div>
                        </div>
 
                </div>
            </div>
        </div> 


        <div id="faq-container">
            <div class="uper-faq">
                <h1 class="main-title">Preguntas frecuentes</h1>
                <p class="sub-title">Tus preguntas, nuestras respuestas.</p>
            </div>
            <div class="lowerfaq">
                <div class="lower-left-faq">
                    <div class="faq">
                        <button class="accordion">1. ¿Qué es Vuelve Peludo?</button>
                        <div class="panel">
                            <p>Vuelve Peludo es una plataforma creada con el corazón, pensada para ayudar a quienes han perdido una mascota o han encontrado una sin hogar. </p>
                        </div>
                    </div>
                    <div class="faq">
                        <button class="accordion">2. ¿Cómo funciona Vuelve Peludo?</button>
                        <div class="panel">
                            <p>Si has perdido a tu mascota, puedes crear una publicación en la sección de “Mascota Perdida” con todos los detalles sobre ella. Si por el contrario, has encontrado una mascota, puedes crear una publicación en la sección de “Mascota Encontrada”. La comunidad de Vuelve Peludo se encarga de ayudarte a conectar a las mascotas con sus dueños para lograr un reencuentro feliz.</p>
                        </div>
                    </div>
                    <div class="faq">
                        <button class="accordion">3. ¿Vuelve peludo es gratis para usar?</button>
                        <div class="panel">
                            <p>Vuelve Peludo es completamente gratuito. Nuestro principal objetivo es ayudar a que las mascotas regresen a casa, y creemos firmemente en el poder del apoyo comunitario y la compasión.</p>
                        </div>
                    </div>
                </div>
                <div class="lower-right-faq">
                    <div class="faq">
                        <button class="accordion">4. ¿Cómo puedo publicar un reporte de mascota perdida o encontrada?</button>
                        <div class="panel">
                            <p> Para publicar un reporte, simplemente haz clic en "Perdí una mascota" o "Encontré una mascota" en nuestro sitio web. Completa los datos necesarios, incluyendo una descripción y una foto si es posible. Tu reporte será visible para toda nuestra comunidad.</p>
                        </div>
                    </div>
                    <div class="faq">
                        <button class="accordion">5. ¿Cómo puedo apoyar la misión de Vuelve Peludo?</button>
                        <div class="panel">
                            <p><p>Puedes apoyarnos siendo un miembro activo de nuestra comunidad, compartiendo tus historias, ayudando a reunir mascotas perdidas con sus dueños y promoviendo la tenencia responsable. ¡Cada acción cuenta!</p></p>
                        </div>
                    </div>
                    <div class="faq">
                        <button class="accordion">6. ¿Mi información personal esta segura en Vuelve Peludo?</button>
                        <div class="panel">
                            <p>Nos tomamos muy en serio la privacidad del usuario. Su información personal se mantiene segura y solo se comparte con quienes la necesitan para facilitar el proceso de reencuentro.</p>
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