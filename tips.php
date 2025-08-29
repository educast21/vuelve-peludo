<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consejos para mascotas | Vuelve Peludo</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="./images/logos/logovp.png" type="image/png">
</head>
<body onload="myFunction()">
<div class="load" id="loader"><hr/><hr/><hr/><hr/></div>
<div id="main" style="display:none;" class="animate-bottom">
    <?php include 'header.php'; ?>

    <div id="bread">
        <h2 class="main-title">Consejos y cuidados</h2>
        <p>Inicio / Consejos</p>
    </div>

    <div id="about-page">
        <div class="left-abt">
            <h1 class="bg-text">Tips</h1>
            <img src="./images/tips-pet.png" alt="tips" class="abt-img">
        </div>
        <div class="right-abt">
            <h3 class="sub-title">Recomendaciones para cuidar y proteger a tu mascota</h3>
            <h2 class="main-title">Consejos útiles para dueños responsables</h2>
            <p class="abt-content">
                Aquí en Vuelve Peludo, no solo te ayudamos a reencontrarte con tu peludo, también queremos ayudarte a cuidarlo mejor. Estos consejos están pensados para prevenir pérdidas, mejorar la calidad de vida de tu mascota y fomentar una convivencia responsable. <br><br>
                Asegura siempre a tu mascota con una placa identificadora, actualiza su información constantemente y no olvides brindarle cariño, alimentación adecuada y revisiones veterinarias. Tu amor es su mejor escudo.
            </p>
        </div>
    </div>

    <div id="about">
        <div class="right-abt">
            <h3 class="sub-title">Protege a tu compañero</h3>
            <h2 class="main-title">Tips para evitar extravíos</h2>
            <ul class="abt-content">
                <li>Coloca una placa con nombre y teléfono en el collar.</li>
                <li>Utiliza correas resistentes y transportadoras seguras.</li>
                <li>Evita dejarlo sin supervisión en espacios abiertos.</li>
                <li>Actualiza los datos del microchip (si tiene uno).</li>
                <li>Educa a tu mascota para que reconozca su hogar y su nombre.</li>
            </ul>
        </div>
        <div class="left-abt">
            <img src="./images/avoid-lost.png" alt="prevention">
        </div>
    </div>

    <div id="about">
        <div class="left-abt">
            <img src="./images/first-aid.png" alt="first aid">
        </div>
        <div class="right-abt">
            <h3 class="sub-title">Primeros auxilios básicos</h3>
            <h2 class="main-title">Qué hacer si tu mascota está en peligro</h2>
            <p class="abt-content">
                Saber actuar ante una emergencia puede salvarle la vida. Siempre ten a la mano el teléfono de tu veterinario de confianza. Si tu mascota sufre un accidente:
            </p>
            <ul class="abt-content">
                <li>No entres en pánico: actúa con calma.</li>
                <li>Evita moverla bruscamente si parece tener fracturas.</li>
                <li>Si sangra, aplica presión con una tela limpia.</li>
                <li>Si no respira, realiza compresiones suaves y llama de inmediato al veterinario.</li>
            </ul>
        </div>
    </div>

    <div id="faq-container">
        <div class="uper-faq">
            <h1 class="main-title">Preguntas frecuentes sobre el cuidado</h1>
            <p class="sub-title">Respuestas útiles para dueños responsables</p>
        </div>
        <div class="lowerfaq">
            <div class="lower-left-faq">
                <div class="faq">
                    <button class="accordion">1. ¿Cada cuánto debo llevar a mi mascota al veterinario?</button>
                    <div class="panel">
                        <p>Se recomienda al menos una revisión general cada 6 meses, y vacunación anual según el tipo de mascota.</p>
                    </div>
                </div>
                <div class="faq">
                    <button class="accordion">2. ¿Qué hacer si mi mascota se extravía?</button>
                    <div class="panel">
                        <p>Publica de inmediato en Vuelve Peludo, notifica a refugios locales, y difunde fotos con sus datos en redes sociales.</p>
                    </div>
                </div>
            </div>
            <div class="lower-right-faq">
                <div class="faq">
                    <button class="accordion">3. ¿Qué tipo de alimento es mejor?</button>
                    <div class="panel">
                        <p>Consulta con tu veterinario según su edad, raza y salud. En general, opta por alimento balanceado de buena calidad.</p>
                    </div>
                </div>
                <div class="faq">
                    <button class="accordion">4. ¿Cómo identificar el estrés en mi mascota?</button>
                    <div class="panel">
                        <p>Busca señales como temblores, jadeo excesivo, aislamiento, o agresividad. Consulta a un experto si persisten.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</div>

<script src="./scripts/script.js"></script>
<script>
    var acc = document.getElementsByClassName("accordion");
    for (var i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
</script>
</body>
</html>
