<?php
// Подключаем файл с базой данных
include 'includes/db.php';

// Получаем первые 15 инструментов для Cards
$sql1 = "SELECT * FROM tools WHERE in_stock = 1 ORDER BY id DESC LIMIT 15";
$result1 = mysqli_query($conn, $sql1);

// Получаем следующие 15 инструментов для Cards2
$sql2 = "SELECT * FROM tools WHERE in_stock = 1 ORDER BY id DESC LIMIT 15 OFFSET 15";
$result2 = mysqli_query($conn, $sql2);
?>

<!DOCTYPE html>
<html lang="de">

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grassau GmbH</title>
    <link rel="stylesheet" href="./styles/style.css">

    <link rel="icon" type="image/png" href="./favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="./favicon/favicon.svg" />
    <link rel="shortcut icon" href="./favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-touch-icon.png" />
    <link rel="manifest" href="./favicon/site.webmanifest" />

</head>

<body>

    <div class="grid-container">


        <header>

            <p id="verx">Beste in Deutschland</p>

            <div class="header-content"><img src="./img/Grassau logo.png" alt="Logo-Grassau" width="220" height="90"
                    id="logo"></a>
                <input id="search" type="search" placeholder="Suchen..." width="">

                <div id="nummertel">
                    <a id="nummer" href="tel:+49017618812000">0176 1881 2000</a>

                    <img id="icontel" src="./img/telefon.png" alt="telefon-numer" width="20">
                </div>


                <div>
                    <img id="uhren" src="./img/Uhr.png" alt="uhren" width="15">

                    <div id="raspisanie">
                        <p class="rasp">Öffnungszeiten:</p>
                        <p class="rasp">Mo-Fr: 09:00–17:00</p>
                        <p class="rasp">Sa.: 9:00–16:00 Uhr</p>
                        <p class="rasp">So.: Geschlossen</p>
                    </div>
                </div>


                    <a href="Wagen.html" id="wagen">
                        <img id="cart1" src="./img/basket.jpg" alt="shopping-cart" width="60">
                    <p id="text1">Einkaufswagen</p>
                    </a>

            </div>


        </header>


        <nav>

            <ul class="horizontal-list">


                <li><a class="vibor" href="payment.html">Zahlung und Versand</a></li>|
                <li><a class="vibor" href="kontakt.html">Kontaktinformationen</a></li>|

                <li><a class="vibor" href="aboutus.html">Über uns</a></li>|
                <li><a class="vibor" href="login.php">Anmelden</a></li>


            </ul>

        </nav>


        <main>
            <section class="product-groups-title">
                <h2>Beliebte Werkzeuge</h2>
            </section>
    <div class="Cards2">
    <?php
    
    // Проверяем есть ли инструменты в базе
    if (mysqli_num_rows($result1) > 0) {
        // Выводим каждый инструмент
        while ($tool = mysqli_fetch_assoc($result1)) {
            ?>
            <article class="cards">
                <figure>
                    <a href="tovar.php?id=<?php echo $tool['id']; ?>">
                        <img src="<?php echo $tool['image']; ?>" alt="<?php echo $tool['name']; ?>" width="250">
                        <figcaption><?php echo $tool['name']; ?></figcaption>
                    </a>
                    <p class="prise"><?php echo $tool['price']; ?>€ pro stunde</p>
                </figure>
            </article>
            <?php
        }
    } else {
        echo "<p>Keine Werkzeuge verfügbar</p>";
    }
    ?>
</div>


            </div>
    </div>



    <div class="pictures">
        <div id="box-1">
            <div id="small-box">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="40px" height="40px"
                    viewBox="0 0 1280.000000 1112.000000" preserveAspectRatio="xMidYMid meet" id="SVG-1">

                    <g transform="translate(0.000000,1112.000000) scale(0.100000,-0.100000)">
                        <path
                            d="M6800 11114 c-377 -28 -726 -85 -1100 -182 -74 -19 -147 -37 -162 -40 -16 -2 -28 -8 -28 -12 0 -15 75 -17 125 -4 111 28 287 38 432 25 522 -48 1088 -272 1565 -621 149 -108 387 -349 471 -476 108 -163 158 -289 177 -449 17 -144 -5 -254 -84 -415 l-51 -105 0 -115 c0 -68 6 -136 14 -165 16 -57 65 -161 89 -188 15 -17 13 -20 -19 -51 -19 -19 -496 -457 -1060 -974 l-1027 -940 -778 675 c-429 371 -792 686 -807 699 l-28 24 45 182 c143 575 385 1555 388 1570 2 13 -68 59 -287 189 -1010 599 -1819 1082 -1970 1178 -66 41 -125 76 -132 77 -9 2 -360 -314 -635 -572 l-67 -63 527 -483 c668 -612 776 -711 834 -764 l46 -43 -60 -193 c-33 -106 -68 -220 -78 -253 -37 -121 -119 -381 -127 -404 -9 -23 -45 -33 -483 -147 -453 -118 -475 -123 -494 -106 -10 9 -328 299 -704 645 l-685 627 -26 -23 c-377 -343 -610 -560 -614 -571 -3 -8 146 -209 370 -497 386 -497 658 -851 1032 -1346 118 -156 220 -283 228 -283 13 0 79 11 328 55 50 9 141 25 203 36 61 10 163 28 225 39 61 10 164 28 227 39 63 11 167 29 230 40 63 11 167 29 230 40 63 11 169 30 235 41 66 12 143 25 170 30 l50 8 125 -122 c124 -122 951 -926 1023 -995 l37 -37 -437 -384 c-241 -212 -723 -636 -1073 -944 -349 -307 -833 -732 -1074 -945 -893 -785 -1227 -1078 -1452 -1277 -128 -112 -257 -231 -287 -264 -119 -129 -156 -274 -103 -413 29 -78 65 -135 138 -219 60 -69 902 -842 986 -905 70 -53 193 -114 292 -145 61 -19 97 -23 195 -23 139 0 196 14 294 72 63 38 150 121 1456 1383 226 218 489 472 585 565 170 164 292 281 1175 1135 629 609 863 832 870 831 5 0 815 -787 1415 -1376 124 -121 495 -484 825 -805 330 -322 787 -767 1015 -990 707 -689 743 -724 810 -772 135 -95 241 -147 390 -188 111 -31 343 -35 458 -7 255 61 473 205 633 417 53 69 132 234 153 320 71 280 -16 562 -241 781 -65 64 -3593 3128 -4362 3789 -132 113 -239 210 -239 215 0 6 276 262 612 570 336 308 806 738 1045 957 l433 397 78 -55 c91 -63 197 -115 290 -140 98 -27 313 -25 449 4 127 27 203 28 305 2 194 -49 340 -165 634 -503 l120 -138 -98 -95 c-79 -77 -103 -108 -131 -167 -32 -67 -34 -79 -34 -172 0 -85 4 -110 28 -170 53 -135 164 -252 302 -316 95 -45 158 -59 266 -59 111 0 192 22 273 74 51 33 892 795 973 882 132 141 149 356 43 535 -53 90 -161 189 -252 233 -104 49 -150 60 -263 60 -103 0 -164 -14 -249 -56 l-38 -19 -25 23 c-50 45 -196 225 -255 313 -33 50 -109 187 -168 305 -125 250 -150 295 -233 410 -100 140 -323 397 -428 495 -114 105 -508 474 -594 555 -131 124 -831 778 -890 831 -101 93 -231 192 -369 284 -420 279 -861 438 -1421 511 -116 15 -618 27 -745 18z m4361 -9815 c90 -25 181 -89 234 -161 59 -79 79 -143 79 -248 0 -77 -3 -92 -37 -161 -63 -132 -173 -213 -335 -247 -103 -21 -204 -7 -307 43 -87 42 -120 75 -146 150 -61 174 -17 416 100 547 50 57 105 84 191 96 80 11 135 6 221 -19z" />
                    </g>
                </svg>
            </div>
            <h2>Zuverlässige Technik</h2>
            <p>Wir überprüfen und warten jedes Werkzeug regelmäßig, damit es immer einsatzbereit ist</p>

        </div>
        <div id="box-2">
            <div id="small2-box">
                <svg width="40px" height="40px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" id="SVG2">
                    <path
                        d="M257.375 20.313c-13.418 0-26.07 7.685-35.938 21.75-9.868 14.064-16.343 34.268-16.343 56.75 0 22.48 6.475 42.654 16.344 56.718 9.868 14.066 22.52 21.75 35.937 21.75 13.418 0 26.038-7.684 35.906-21.75 9.87-14.063 16.376-34.236 16.376-56.718 0-22.48-6.506-42.685-16.375-56.75-9.867-14.064-22.487-21.75-35.905-21.75zm-150.25 43.062c-20.305.574-23.996 13.892-31.78 29.03-23.298 45.304-55.564 164.75-55.564 164.75l160.47-5.436 29.125 137.593-22.78 106.03h149.093l-22.282-106 24.25-137.5 157.53 5.313c.002 0-32.264-119.447-55.56-164.75-7.787-15.14-11.477-28.457-31.782-29.03-17.898 0-32.406 15.552-32.406 34.718 0 19.166 14.508 34.72 32.406 34.72 3.728 0 7.258-.884 10.594-2.126l7.937 74.406L309.437 165c-.285.42-.552.867-.843 1.28-12.436 17.724-30.604 29.69-51.22 29.69-20.614 0-38.782-11.966-51.218-29.69-.277-.395-.54-.816-.812-1.218l-116.75 40.032 7.937-74.406c3.337 1.242 6.867 2.125 10.595 2.125 17.898 0 32.406-15.553 32.406-34.72 0-19.165-14.507-34.718-32.405-34.718z" />
                </svg>



                </g>
                </svg>
            </div>
            <h2>Professionelle Qualität</h2>
            <p>Unsere Werkzeuge für Profis sind zuverlässig, leistungsstark und ideal für anspruchsvolle Aufgaben jeder Art</p>

        </div>
        <div id="box-3">
              <div id="small3-box">
                <svg width="40px" height="40px" id="SVG3" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path fill="#000" d="M104.53 28.72c-.676 0-1.356.012-2.03.03-16.186.435-31.577 6.108-44.375 15.25-34.13 24.378-50.547 75.233-18.563 118.72 25.234 34.303 14.237 79.597-11.874 104.905l13.03 13.406c32.24-31.247 45.253-86.76 13.907-129.374C28.415 116.022 42.253 78.324 69 59.22c13.374-9.554 29.767-14.01 46.28-10.75 15.853 3.126 32.335 13.31 46.907 35l-59.875 34.655 24.344 42.28c-49.898 63.943-58.988 154.445-16 229.126 56.487 98.133 181.517 131.802 279.281 75.19 97.765-56.614 131.237-182.057 74.75-280.19-42.912-74.55-125.41-111.868-205.437-100.686l-24.438-42.438-56.437 32.657c-16.916-25.592-38.054-39.714-59.47-43.938-4.813-.95-9.63-1.405-14.374-1.406zm170.126 81.124c79.9 0 144.813 64.347 144.813 144.25 0 79.9-64.913 144.844-144.814 144.844-79.9 0-144.25-64.945-144.25-144.844 0-79.9 64.35-144.25 144.25-144.25zm-9.094 25.187v88.19c-13.248 4.192-23.156 16.79-23.156 31.218 0 17.726 14.962 32.125 32.688 32.125 16.82 0 30.63-12.968 32-29.438l76.53-54.875-10.905-15.188-70.283 50.407c-4.103-6.774-10.542-11.993-18.187-14.345V135.03h-18.688zm-42.187 11.314l-16.188 9.344 14.344 24.843 16.19-9.374-14.345-24.812zm103.063 0l-14.344 24.812 16.187 9.375 14.345-24.843-16.188-9.343zm-150.125 40.22l-9.344 16.186 24.81 14.344 9.345-16.188-24.813-14.344zm98.78 53.874c7.628 0 13.438 6.375 13.438 14 0 7.626-5.81 13.437-13.436 13.437-7.627 0-14-5.81-14-13.438 0-7.626 6.372-14 14-14zm-119.437 4.5v18.687h28.656v-18.688h-28.656zm209.813 0v18.687h28.686v-18.688H365.47zM191.78 291.5l-24.81 14.313L176.312 322l24.812-14.344-9.344-16.156zm166.25 0l-9.342 16.156L373.5 322l9.344-16.188L358.03 291.5zm-136.5 36.563l-14.343 24.812 16.188 9.344 14.344-24.814-16.19-9.344zm106.75 0l-16.186 9.343 14.344 24.813 16.187-9.345-14.344-24.813zm-62.717 16.812v28.656h18.687v-28.655h-18.688z"/></svg>



                </g>
                </svg>
            </div>
            <h2>Sofortige Miete</h2>
            <p>Holen Sie das Werkzeug direkt nach der Bestellung ab - schnell, bequem und ohne Wartezeiten</p>

        </div>
        <div id="box-4">
             <div id="small4-box">
                <svg version="1.1"
	 id="SVG4" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" sodipodi:docname="fire.svg" inkscape:version="0.48.4 r9939"
	 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  width="40px" height="40px"
	 viewBox="0 0 1200 1200" enable-background="new 0 0 1200 1200" xml:space="preserve">
<sodipodi:namedview  inkscape:cy="580.6024" inkscape:cx="312.39671" inkscape:zoom="0.37249375" showgrid="false" id="namedview30" guidetolerance="10" gridtolerance="10" objecttolerance="10" borderopacity="1" bordercolor="#666666" pagecolor="#ffffff" inkscape:current-layer="svg2" inkscape:window-maximized="1" inkscape:window-y="24" inkscape:window-height="876" inkscape:window-width="1535" inkscape:pageshadow="2" inkscape:pageopacity="0" inkscape:window-x="65">
	</sodipodi:namedview>
<path id="path8046" inkscape:connector-curvature="0" d="M381.64,1200C135.779,1061.434,71.049,930.278,108.057,751.148
	c27.321-132.271,116.782-239.886,125.36-371.903c38.215,69.544,54.183,119.691,58.453,192.364
	C413.413,422.695,493.731,216.546,498.487,0c0,0,316.575,186.01,337.348,466.98c27.253-57.913,40.972-149.892,13.719-209.504
	c81.757,59.615,560.293,588.838-64.818,942.524c117.527-228.838,30.32-537.611-173.739-680.218
	c13.628,61.319-10.265,290.021-100.542,390.515c25.014-167.916-23.8-238.918-23.8-238.918s-16.754,94.054-81.758,189.065
	C345.537,947.206,304.407,1039.291,381.64,1200L381.64,1200z"/>
</svg>


                </g>
                </svg>
            </div>
            <h2>Profi-Unterstützung</h2>
            <p>Unsere Experten helfen Ihnen bei Auswahl und Einrichtung des Werkzeugs – schnell und unkompliziert</p>

        </div>
    </div>
<div class="Cards">


    <?php
    if (mysqli_num_rows($result2) > 0) {
        while ($tool = mysqli_fetch_assoc($result2)) {
            ?>
            <article class="cards">
                <figure>
                    <a href="tovar.php?id=<?php echo $tool['id']; ?>">
                        <img src="<?php echo $tool['image']; ?>" alt="<?php echo $tool['name']; ?>" width="250">
                        <figcaption><?php echo $tool['name']; ?></figcaption>
                    </a>
                    <p class="prise"><?php echo $tool['price']; ?>€ pro stunde</p>
                </figure>
            </article>
            <?php
        }
    } else {
        echo "<p>Keine Werkzeuge verfügbar</p>";
    }
    ?>


</div>


        </section>
    </div>
    </div>


    </main>
    <footer>
        <div id="footer-box">
            <div class="footer-lists">
                <ul class="column">
                    <p>🛠 Unterstützung</p>
                    <li><a href="#" style="text-decoration: none; color: black;">Über uns</a></li>
                    <li><a href="#" style="text-decoration: none; color: black;">Team</a></li>
                    <li><a href="#" style="text-decoration: none; color: black;">Karriere</a></li>
                </ul>
                <ul class="column">
                    <p>ℹ️ Informationen</p>
                    <li><a href="#" style="text-decoration: none; color: black;">Hilfe</a></li>
                    <li><a href="#" style="text-decoration: none; color: black;">FAQ</a></li>
                    <li><a href="#" style="text-decoration: none; color: black;">Support</a></li>
                </ul>
                <ul class="column">
                    <p>📞 Контакты</p>
                    <li><a href="#" style="text-decoration: none; color: black;">AGB</a></li>
                    <li><a href="#" style="text-decoration: none; color: black;">Datenschutz</a></li>
                    <li><a href="#" style="text-decoration: none; color: black;">Impressum</a></li>
                </ul>
                <ul class="column">
                    <p>🔗 Gateway-Link</p>
                    <li><a href="https://www.facebook.com/GrassauGmbH/"
                            style="text-decoration: none; color: black;">Facebook</a></li>
                    <li><a href="https://www.instagram.com/grassaugmbh/"
                            style="text-decoration: none; color: black;">Instagram</a></li>
                    <li><a href="https://www.youtube.com/@GrassauGmbH"
                            style="text-decoration: none; color: black;">Youtube<a></li>
                </ul>
            </div>
        </div>


        <div id="niz">
            <h2 id="nizniz">© 2025 Grassau GmbH</h2>
        </div>
    </footer>
    </div>
</body>

</html>