<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>EJP Service</title>
      <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, maximum-scale=3, minimum-scale=1">

      <link rel="shortcut icon" href="img/icon/favicon.png">

      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
      <link rel="stylesheet" href="css/index.css">
      <link rel="stylesheet" href="fonts/sito-web/styles.css">

      <script src="js/jquery-3.1.1.js"></script>

   </head>
   <body>

      <?php include ("view/header.php"); ?>

      <section class="banner">
         <div class="imagen_fondo"></div>
         <div class="imagen_texto">
            <div class="mostrar_h1">
               <h1 data-aos="fade-up">HACIENDO</h1>
               <h1 data-aos="fade-up">MOMENTOS</h1>
               <h1 data-aos="fade-up">INNOLVIDABLES</h1>
            </div>
            <p>As tu sueño realidad, con el mejor servicio del mercado.</p>

            <div class="social_icon">
               <a target="_blank" href="https://web.facebook.com/ejpservice" class="social_icon__link" data-aos="fade-left" title="ejpservice"><span class="icon-facebook"></span></a>
               <a target="_blank" href="https://www.instagram.com/ejpservice/" class="social_icon__link" data-aos="fade-left" title="ejpservice"><span class="icon-instagram"></span></a>
               <a href="mailto:ejptheservice@gmail.com" class="social_icon__link" data-aos="fade-left" title="ejptheservice@gmail.com"><span class="icon-mail"></span></a>
            </div>
         </div>
      </section>

      <div class="experiencia">
         <?php
            include ("controller/conexion.php");
         ?>

         <div class="hide">
            <p class="p" data-aos="fade-right">Inauguramos nuestra empresa, al inicio de una crisis mundial, la cual nos afecto a todos, tanto en nuestros proyectos como en nuestra vida personal, pero esto no fue un obstáculo, duramos 2 año y 6 meses sin laborar, luego de abrir nuevamente nuestras puertas, con una nueva cara al público tenemos una aceptación la cual nos ha llevado hacer una de la empresa preferida por los clientes.</p>
         </div>

         <div class="elojios_principal">
            <div class="elojios">
               <div class="hide"><h1 data-aos="fade-up">0</h1></div>
               <p>Años de experiencia</p>
            </div>
            <!--
            <div class="elojios">
               <div class="hide">
                  <?php
                  /*
                     $sql = "SELECT MAX(id_customers) AS maximo FROM customers";
                     $reg = $conexion->prepare($sql);
                     $reg->execute();

                     while ($res = $reg->fetch(PDO::FETCH_ASSOC)) {
                        echo "<h1 data-aos='fade-up'>" . $res['maximo'] . "</h1>";
                     }
                     */
                  ?>
               </div>
               <p>Clientes satisfechos</p>
            </div>
            -->
            <div class="elojios">
               <div class="hide">
                  <?php
                     $sql = "SELECT count(id_team_member) AS maximo FROM team_member";
                     $reg = $conexion->prepare($sql);
                     $reg->execute();

                     while ($res = $reg->fetch(PDO::FETCH_ASSOC)) {
                        echo "<h1 data-aos='fade-up'>" . $res['maximo'] . "</h1>";
                     }
                  ?>
               </div>
               <p>Personal</p>
            </div>
            <div class="elojios">
               <div class="hide">
                  <?php
                     $sql = "SELECT COUNT(id_sales) AS maximo FROM sales";
                     $reg = $conexion->prepare($sql);
                     $reg->execute();

                     while ($res = $reg->fetch(PDO::FETCH_ASSOC)) {
                        echo "<h1 data-aos='fade-up'>" . $res['maximo'] . "</h1>";
                     }
                  ?>
               </div>
               <p>Eventos realizados</p>
            </div>
         </div>

         <div class="detalles">
            <div class="hide">
               <p class="detalle_p" data-aos="fade-up">TRABAJAMOS EN TODO TIPO DE UBICACIONES</p>
            </div>
         </div>
      </div>

      <div class="servicios">
         <a href="view/camareros.html">
            <div class="bloque">
               <img src="img/servicios/camarero.jpg" data-aos="fade-right">
               <div class="title">Camareros</div>
            </div>
         </a>
         <a href="view/bartender.php">
            <div class="bloque">
               <img src="img/servicios/bartender.jpg" data-aos="fade-down-right">
               <div class="title">Bartender</div>
            </div>
         </a>
         <a href="view/montadores.php">
            <div class="bloque">
               <img src="img/servicios/montaje.jpg" data-aos="fade-up-left">
               <div class="title">Montadores</div>
            </div>
         </a>
         <a href="view/steward.php">
            <div class="bloque">
               <img src="img/servicios/steward.jpg" data-aos="fade-left">
               <div class="title">Steward</div>
            </div>
         </a>
      </div>

      <div class="certificaciones">
         <div class="hide">
            <p class="detalle_p" data-aos="fade-up">CERTIFICACIONES</p>
         </div>
         <div class="grupo">
            <div class="columna">
               <div class="hide">
                  <svg data-aos="fade-up" preserveAspectRatio="xMidYMid meet" data-bbox="20.278 51.076 159.449 97.849" viewBox="20.278 51.076 159.449 97.849" height="200" width="100" xmlns="http://www.w3.org/2000/svg" data-type="shape" role="presentation" aria-hidden="true" aria-labelledby="svgcid--iktbakfqiz36">
                     <g>
                        <path d="M124.309 135.826c.342-.225.581-.594.581-1.034v-3.62a4.56 4.56 0 00-4.555-4.556h-17.971v-3.941a2.452 2.452 0 00-2.192-2.43v-49.25a5.034 5.034 0 00-5.028-5.027 5.032 5.032 0 00-5.026 5.027v49.25a2.45 2.45 0 00-2.192 2.43v3.941H69.955a4.562 4.562 0 00-4.557 4.556v3.62c0 .44.239.809.581 1.034l-3.814 11.439a1.262 1.262 0 001.196 1.658h63.564a1.262 1.262 0 001.196-1.658l-3.812-11.439zM95.144 68.49a2.509 2.509 0 012.507 2.506v49.224h-5.013V70.996a2.51 2.51 0 012.506-2.506zm-4.763 54.25l.965-.007c.011 0 .021.007.032.007.012 0 .022-.007.035-.007l7.222-.049c.092.021.178.056.276.056.105 0 .198-.036.295-.06l.637-.004v3.941H90.43l-.049-3.877zm-22.462 8.433a2.04 2.04 0 012.036-2.036h50.38c1.122 0 2.035.913 2.035 2.036v2.36H67.919v-2.36zm46.563 15.231l-2.684-10.351h4.017l3.068 10.351h-4.401zm-43.076 0l3.068-10.351h4.017l-2.684 10.351h-4.401zm9.688-10.351h3.619l-1.917 10.351H78.41l2.684-10.351zm6.182 0h3.698l-.766 10.351h-4.849l1.917-10.351zm6.225 0h3.287l.767 10.351h-4.819l.765-10.351zm5.814 0h3.698l1.917 10.351h-4.848l-.767-10.351zm6.261 0h3.619l2.684 10.351h-4.386l-1.917-10.351zm-37.013 0h3.284l-3.068 10.351h-3.667l3.451-10.351zm52.947 10.351l-3.068-10.351h3.284l3.451 10.351h-3.667zm-66.782 0H37.515v-16.428a1.26 1.26 0 10-2.52 0v16.428h-8.263a3.94 3.94 0 01-3.935-3.936v-5.938c0-13.925 6.009-20.969 20.711-24.199l8.928 6.202a1.256 1.256 0 001.437.001l8.93-6.202c8.811 1.936 14.379 5.235 17.502 10.357a1.261 1.261 0 002.153-1.311c-3.523-5.779-9.667-9.445-19.28-11.533-1.1-1.269-1.651-5.663-1.712-8.706 4.604-3.275 8.15-8.918 9.907-14.646a2.192 2.192 0 001.488-1.636c2.893-13.23 2.333-21.762-1.762-26.85-3.274-4.067-8.649-5.974-17.342-6.124-.218-.03-.435-.009-.65-.008-.215-.001-.432-.022-.65.008-8.657.15-14.006 2.045-17.26 6.086-4.076 5.06-4.631 13.572-1.748 26.791.175.794.73 1.385 1.459 1.628 1.748 5.777 5.305 11.469 9.939 14.76-.06 3.039-.61 7.421-1.709 8.694-16.009 3.477-22.86 11.473-22.86 26.689v5.938a6.463 6.463 0 006.455 6.456H54.73a1.26 1.26 0 10-.002-2.521zm-17.57-86.853c2.816-3.497 7.747-5.094 15.948-5.155 8.239.062 13.193 1.67 16.028 5.192 3.467 4.306 3.953 11.81 1.513 23.565-.886-3.584-1.936-9.109-2.067-9.806-.123-1.496-1.396-2.624-3.001-2.641-5.625-.062-12.034-3.68-12.098-3.717a1.263 1.263 0 00-.374-.14 2.522 2.522 0 00-2.323.695 2.315 2.315 0 00-.624 2.124c.013.057.03.115.049.17l1.352 3.628-8.247-4.361c-1.575-.825-3.556-.477-4.709.829a1.265 1.265 0 00-.289.569l-2.678 12.428c-2.405-11.668-1.915-19.115 1.52-23.38zm.171 26.146c.212-.257.391-.549.483-.906l2.883-13.37c.404-.284.98-.328 1.444-.086l11.168 5.905c.461.246 1.026.18 1.421-.167.392-.345.532-.897.35-1.387l-2.319-6.22c1.746.924 7.436 3.702 12.792 3.76.172.002.504.075.517.341a1.4 1.4 0 00.02.171c.057.306 1.418 7.549 2.427 11.236.086.314.248.578.439.814-2.4 7.757-8.586 15.703-15.8 15.703-7.254.001-13.442-7.991-15.825-15.794zm15.825 18.315c2.051 0 4.008-.518 5.842-1.402.126 2.336.525 5.919 1.744 8.086l-7.586 5.269-7.585-5.268c1.218-2.166 1.617-5.746 1.744-8.083 1.834.881 3.789 1.398 5.841 1.398zm125.711 11.872c-.646-.217-15.779-5.457-11.937-18.265 8.862-29.541-3.101-40.761-6.98-43.496-5.335-3.762-11.823-4.033-16.825-.852-5.005-3.181-11.493-2.91-16.824.852-3.879 2.735-15.843 13.955-6.982 43.496 1.254 4.175 1.083 7.633-.505 10.278-2.263 3.767-6.739 4.7-6.78 4.708a1.26 1.26 0 10.479 2.475c.228-.044 5.587-1.132 8.444-5.857 1.985-3.283 2.246-7.43.778-12.327-4.366-14.551-5.077-32.888 6.019-40.713 4.618-3.258 10.238-3.451 14.419-.549.254.265.592.393.943.381.357.018.704-.111.964-.381 4.18-2.9 9.798-2.711 14.419.548 11.096 7.825 10.383 26.161 6.017 40.713-3.331 11.11 5.41 17.389 10.383 19.973-4.11 1.058-11.494 2.204-17.042-1.135-4.148-2.496-6.626-7.136-7.366-13.792a1.26 1.26 0 00-.155-.482c6.138-4.467 10.232-13.924 10.669-21.36.616.066 1.242.111 1.888.111a1.26 1.26 0 100-2.52c-9.415 0-15.518-8.93-15.578-9.021a1.257 1.257 0 00-.945-.554c-.366-.04-.76.112-1.021.393-.087.092-8.779 9.182-22.101 9.182a1.26 1.26 0 100 2.52c.642 0 1.268-.027 1.888-.063.445 7.322 4.431 16.57 10.41 21.103-.071 3.037-.621 7.341-1.71 8.596-9.614 2.089-15.756 5.754-19.278 11.533a1.26 1.26 0 102.153 1.311c3.074-5.045 8.553-8.307 17.133-10.255.036.032.057.074.098.102l2.438 1.696c2 1.389 4.345 2.084 6.69 2.084 2.345 0 4.69-.695 6.69-2.084l1.778-1.235c1.335 2.029 3 3.682 5.03 4.901 3.249 1.953 6.944 2.589 10.382 2.589a30.89 30.89 0 003.689-.232c.028.216.092.428.236.612a18.052 18.052 0 012.276 3.804c1.429 3.208 2.123 7.068 2.123 11.802v5.969a3.966 3.966 0 01-3.963 3.962h-9.292v-16.428a1.26 1.26 0 10-2.52 0v16.428h-24.821a1.26 1.26 0 100 2.52h36.634a6.49 6.49 0 006.483-6.482v-5.969c0-5.094-.766-9.29-2.34-12.828a20.732 20.732 0 00-2.228-3.799c3.222-.63 5.488-1.509 5.708-1.597a1.26 1.26 0 00-.068-2.366zm-51.224-35.978c9.438-1.289 16.002-6.408 18.47-8.641 1.78 2.21 6.118 6.807 12.39 8.39-.393 9.856-7.478 21.837-15.436 21.837-7.889 0-14.922-11.779-15.424-21.586zm20.678 32.255a9.25 9.25 0 01-10.505.001l-1.707-1.186c1.319-2.081 1.756-5.765 1.897-8.208 1.591.778 3.28 1.244 5.062 1.244 1.761 0 3.43-.458 5.004-1.219.389 3.05 1.138 5.712 2.226 7.994l-1.977 1.374z"></path>
                     </g>
                  </svg>
               </div>
               <h2>Expertos proveedores</h2>
               <p>Somos una empresa dedicada a ofrecer servicios hoteleros, tales como Camareros, Bartender, Steward, Montadores, entre otros.</p>
            </div>
            <div class="columna">
               <div class="hide">
                  <svg data-aos="fade-up" preserveAspectRatio="xMidYMid meet" data-bbox="49.302 53.077 101.395 93.844" viewBox="49.302 53.077 101.395 93.844" height="200" width="100" xmlns="http://www.w3.org/2000/svg" data-type="shape" role="presentation" aria-hidden="true" aria-labelledby="svgcid-rp9ozws48idg">
                     <g>
                        <path d="M64.218 65.785c0-.985.199-1.953.593-2.881a1.26 1.26 0 012.32.984 4.829 4.829 0 00-.393 1.896c0 2.745 2.233 4.979 4.978 4.979s4.979-2.234 4.979-4.979c0-.644-.132-1.282-.393-1.894a1.26 1.26 0 112.318-.988c.395.927.595 1.897.595 2.882 0 4.135-3.365 7.5-7.5 7.5s-7.497-3.364-7.497-7.499zm64.065 7.5c4.135 0 7.5-3.365 7.5-7.5 0-.985-.2-1.955-.595-2.882a1.256 1.256 0 00-1.653-.665 1.258 1.258 0 00-.665 1.653c.261.613.393 1.25.393 1.894a4.985 4.985 0 01-4.979 4.979 4.985 4.985 0 01-4.979-4.979c0-.644.132-1.282.393-1.894a1.26 1.26 0 10-2.318-.988 7.317 7.317 0 00-.595 2.882c-.002 4.135 3.362 7.5 7.498 7.5zm-56.566-6.954a1.26 1.26 0 001.26-1.26V54.339a1.26 1.26 0 10-2.52 0V65.07a1.26 1.26 0 001.26 1.261zm56.566 0a1.26 1.26 0 001.26-1.26V54.339a1.26 1.26 0 10-2.52 0V65.07a1.26 1.26 0 001.26 1.261zm-48.141-7.758h39.716a1.26 1.26 0 100-2.52H80.142a1.26 1.26 0 100 2.52zm64.456-2.52h-7.89a1.26 1.26 0 100 2.52h7.89a3.584 3.584 0 013.58 3.58v78.668a3.584 3.584 0 01-3.58 3.58H55.402a3.584 3.584 0 01-3.58-3.58V62.153a3.584 3.584 0 013.58-3.58h7.89a1.26 1.26 0 100-2.52h-7.89a6.106 6.106 0 00-6.1 6.1v78.668c0 3.364 2.736 6.1 6.1 6.1h89.195c3.364 0 6.1-2.736 6.1-6.1V62.153a6.105 6.105 0 00-6.099-6.1zm-64.761 50.099V96.104a1.26 1.26 0 10-2.52 0v10.048a1.26 1.26 0 102.52 0zm14.283 0V96.104a1.26 1.26 0 10-2.52 0v10.048a1.26 1.26 0 102.52 0zm14.281 0V96.104a1.26 1.26 0 10-2.52 0v10.048a1.26 1.26 0 102.52 0zm14.281 0V96.104a1.26 1.26 0 10-2.52 0v10.048a1.26 1.26 0 102.52 0zm-45.365 14.55v10.048a1.26 1.26 0 102.52 0v-10.048a1.26 1.26 0 10-2.52 0zm14.282 0v10.048a1.26 1.26 0 102.52 0v-10.048a1.26 1.26 0 10-2.52 0zm14.281 0v10.048a1.26 1.26 0 102.52 0v-10.048a1.26 1.26 0 10-2.52 0zm14.282 0v10.048a1.26 1.26 0 102.52 0v-10.048a1.26 1.26 0 10-2.52 0zm10.573-7.191a1.26 1.26 0 00-1.26-1.26h-58.95a1.26 1.26 0 100 2.52h58.949c.696 0 1.261-.565 1.261-1.26zm12.927-33.488a1.26 1.26 0 00-1.26-1.26H57.599a1.26 1.26 0 100 2.52h84.803a1.26 1.26 0 001.26-1.26z"></path>
                     </g>
                  </svg>
               </div>
               <h2>Horarios personalizados</h2>
               <p>Nuestro equipo de trabajo cumple con una jornada de trabajo según la solicitud por el cliente.</p>
            </div>
            <div class="columna">
               <div class="hide">
                  <img data-aos="fade-up" src="img/icon/productos.png" height="150" style="padding:75px 0 0 0; width:100px;" alt="">
               </div>
               <h2>Productos avanzados</h2>
               <p>Todos los miembros de equipo tienen su material de trabajo en cada evento.</p>
            </div>
            <div class="columna">
               <div class="hide">
                  <svg data-aos="fade-up" preserveAspectRatio="xMidYMid meet" data-bbox="54.863 48.924 90.274 102.149" viewBox="54.863 48.924 90.274 102.149" height="200" width="100" xmlns="http://www.w3.org/2000/svg" data-type="shape" role="presentation" aria-hidden="true" aria-labelledby="svgcid-c6egywbvaodo">
                     <g>
                        <path d="M145.03 133.525c-4.883-8.721-9.704-22.489-4.942-38.551 5.981-20.173 2.968-35.391 1.395-40.997a1.27 1.27 0 00-1.474-.893c-6.436 1.365-19.748 2.908-36.655-2.105C83.945 45.228 67.8 52.852 59.9 57.908a1.259 1.259 0 00-.56 1.287c1.383 7.605 2.086 19.863-2.419 35.061-5.776 19.483 1.918 35.674 7.019 43.592a1.256 1.256 0 001.7.4 54.464 54.464 0 0113.03-4.798c1.214 3.168 2.572 6.1 4.109 8.21 4.488 6.158 10.836 9.413 18.364 9.413h.034c8.155-.01 16.76-3.73 19.65-13.579 11.809.846 20.305-1.199 23.468-2.144.34-.102.584-.417.738-.736.151-.316.128-.76-.003-1.089zm-43.859 15.03h-.032c-6.782 0-12.275-2.818-16.326-8.377-2.895-3.972-5.225-11.472-7.098-17.499a207.008 207.008 0 00-1.379-4.338l-.068-.204c-1.857-5.528-2.994-9.504-.706-10.313 2.386-.845 5.037 3.958 6.847 8.129.382.881.797 2.109 1.277 3.531l.357 1.055a1.26 1.26 0 002.453-.409l-.038-27.891c-.002-1.139.363-2.2 1.026-2.99.61-.726 1.404-1.127 2.235-1.128h.003c1.799 0 3.265 1.843 3.269 4.109 0 .017.009.031.01.049l.028 20.591a1.26 1.26 0 001.26 1.259h.002a1.261 1.261 0 001.259-1.262l-.038-27.892c-.002-1.139.363-2.2 1.026-2.989.61-.727 1.404-1.128 2.235-1.129h.003c1.799 0 3.265 1.843 3.269 4.108v5.662l.001.007.036 22.237a1.26 1.26 0 001.26 1.258h.002a1.26 1.26 0 001.258-1.263l-.038-23.049c-.002-1.139.363-2.2 1.026-2.989.61-.727 1.404-1.127 2.235-1.128h.003c1.799 0 3.265 1.843 3.269 4.107l-.001 11.232v.003l.035 12.277a1.26 1.26 0 001.26 1.257h.003a1.26 1.26 0 001.257-1.263l-.035-12.275c-.002-1.997 1.275-3.623 2.848-3.626h.002c1.571 0 2.851 1.623 2.853 3.616l.001 28.86c.001 17.299-13.89 18.661-18.149 18.667zm20.231-13.558c.28-1.571.439-3.264.439-5.108l-.001-28.861c-.004-3.384-2.415-6.135-5.375-6.135h-.005c-1.047.001-2.018.361-2.844.957v-6.043c-.005-3.655-2.601-6.626-5.788-6.626-1.184-.001-2.344.423-3.317 1.201-.267-3.379-2.723-6.044-5.737-6.044h-.007c-1.587.002-3.065.722-4.162 2.028-1.044 1.243-1.618 2.881-1.615 4.613l.002 1.793c-.932-.735-2.057-1.17-3.271-1.17h-.007c-1.587.002-3.065.722-4.162 2.027-1.044 1.243-1.618 2.882-1.615 4.614l.029 21.034c-2.114-4.487-5.193-9.267-9.245-7.829-4.803 1.698-2.699 7.963-.843 13.491l.069.204c.419 1.25.873 2.708 1.362 4.283.751 2.416 1.576 5.059 2.485 7.644a56.746 56.746 0 00-12.345 4.449c-4.837-7.856-11.379-22.784-6.112-40.544 4.485-15.13 3.959-27.466 2.629-35.388 7.768-4.809 22.787-11.494 40.671-6.19 16.48 4.885 29.691 3.724 36.719 2.389 1.544 6.134 3.744 20.161-1.684 38.472-4.785 16.136-.4 30.035 4.402 39.094-3.731.956-11.025 2.285-20.672 1.645zm-6.571-69.373a1.26 1.26 0 01-1.438 1.053 76.408 76.408 0 01-11.623-2.757c-7.806-2.497-15.847-2.577-23.898-.235a1.26 1.26 0 01-.704-2.42c8.541-2.485 17.077-2.399 25.37.255a73.942 73.942 0 0011.239 2.666 1.26 1.26 0 011.054 1.438zm-11.476 3.624a1.26 1.26 0 01-1.584.816c-5.453-1.745-11.069-2.314-16.689-1.685a1.263 1.263 0 01-1.392-1.113 1.261 1.261 0 011.113-1.392c5.977-.666 11.944-.064 17.736 1.79a1.26 1.26 0 01.816 1.584z"></path>
                     </g>
                  </svg>
               </div>
               <h2>Higiene integral</h2>
               <p>Antes de empezar el servicio el miembro de equipo se coloca su guante y mantiene todo el salón con estricta limpieza.</p>
            </div>
         </div>
      </div>

      <div class="prestigio">
         <div class="detalles">
            <div class="hide">
               <p class="detalle_p" data-aos="fade-up">NUESTRO PRESTIGIO ES IMPECABLE</p>
            </div>
         </div>

         <div class="grupo">
            <div class="columna">
               <div class="borde"></div>
               <div class="testimonio">
                  <h3>1- ¿Cómo fue que me conoció?</h3>
                  <p>Los conocí en un evento de una clienta, que
                  le estaba realizando la decoración, eso fue
                  por sabana perdida.</p><br>

                  <h3>2- ¿Qué era lo que pensaba al principio?</h3>
                  <p>Le vi potencial desde el principio, porque
                  ese mismo día que los conocí, vi como
                  innovaron, que no tenían bandeja y
                  buscaron unas bandejas que llevo la
                  clienta para otra cosa e improvisaron
                  no tenían herramientas e improvisaron,
                  eso me gusto bastante, porque de la nada
                  buscaron piezas para servir y que acoplaban
                  para el evento que se estaba realizando.</p><br>

                  <h3>3- ¿Qué fue lo que pensó después?</h3>
                  <p>No me arrepiento, desde el principio que los
                  conocí siempre dije que iban hacer buenos
                  camareros, siempre e estado con un
                  pensamiento positivo Asia ustedes,
                  son gente que trabajan y que resuelven.</p><br>

                  <h3>4- ¿Cuál fue el resultado que obtuvo?</h3>
                  <p> El resultado que siempre eh obtenido de parte
                  de ustedes, es el servicio, la calidad del servicio,
                  la disposición de trabajar y de que el cliente,
                  de mi cliente quede satisfecho con todo.</p>
               </div>

               <div class="hide">
                  <h2 data-aos="fade-down">Planning Studio</h2>
               </div>
            </div>
            <div class="columna">
               <div class="borde"></div>
               <div class="testimonio">
                  <h3>1- ¿Cómo fue que me conoció?</h3>
                  <p>Conocimos a tu empresa a través de observar
                  tu trabajo muy eficiente en el Embassy Suites.</p><br>

                  <h3>2- ¿Que era lo que pensaba al principio?</h3>
                  <p> Que era un grupo de camareros normales que llegaban
                  a cumplir órdenes, pero no fue así.
                  Ellos se organizaron desde antes y dias antes del
                  evento para organizarse.</p>

                  <h3>3- ¿Que fue lo que pensó después? </h3>
                  <p>Que son una compañía formal y organizada.</p><br>

                  <h3>4- ¿Cuál fue el resultado que obtuvo?</h3>
                  <p>Muy bien resultado pues el grupo de camareros se
                  guiaban de sus managers y de las directrices del gran evento.
                  Lograron atender de buena manera a casi 600 personas
                  sentados de forma Lounge.</p>
               </div>
               <div class="hide">
                  <h2 data-aos="fade-down">Events Planner</h2>
               </div>
            </div>
            <div class="columna">
               <div class="borde"></div>
               <div class="testimonio">
                  <h3>1- ¿Cómo fue que me conoció?</h3>
                  <p>Los conocí por recomendación de Jordana de Planny Studio.</p><br>

                  <h3>2- ¿Que era lo que pensaba al principio?</h3>
                  <p>Desde el principio ella me dijo que eran muy buenos y eficientes.</p>

                  <h3>3- ¿Que fue lo que pensó después? </h3>
                  <p>El primer trabajo fue de confirmación ya que hablé con la persona del evento y me dijo que todo fue excelente.</p><br>

                  <h3>4- ¿Cuál fue el resultado que obtuvo?</h3>
                  <p>Contuvimos buenos resultados, clientes complacidos con el buen servio y manejo adecuado.</p>
               </div>
               <div class="hide">
                  <h2 data-aos="fade-down">Nicol Fiesta</h2>
               </div>
            </div>
         </div>
         <div class="borde"></div>
      </div>

      <?php include ("view/footer.php"); ?>

      <script src="js/main.js"></script>
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <script>
         AOS.init({
            duration: 1000
         });
      </script>
   </body>
</html>
