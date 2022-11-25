<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title></title>
   <link rel="stylesheet" href="css/header.css">
</head>

<body>
   <!-- ABRE HEADER -->
   <header class="main-header">
      <div class=" heid">
         <div class="logo-container column column--50">
            <div class="logo"></div>
         </div>
         <div class="main-header__contactInfo">
            <p class="main-header__contacInfo__phone">
               <a href="https://api.whatsapp.com/send?phone=18493308701" target="_blank"><span class="icon-whatsapp">849-330-8701</span></a>
               <br>
            </p>
            <p class="main-header__contactInfo__address">
               <span class="icon-location">Av. 27 de Febrero #23, Edf. Master Suite 4-7, D.N., R.D.</span>
            </p>
         </div>
      </div>
   </header>
   <!-- CIERRA HEADER -->

   <nav class="main-nav">
      <div class=" container--flex">
         <input type="checkbox" id="btnMenu">
         <label for="btnMenu" class="icon-menu"></label>
         <!--<span class="icon-menu" id="btnMenu"></span>-->
         <ul class="menu" id="menu">
            <li class="menu__item"><a href="../index.php" class="menu__link menu__link--select">Inicio</a></li>
            <li class="menu__item sub-menu1"><a href="#" class="menu__link">Servicios <span class="icon-caret-down"></span></a>
               <ul class="sub-menu">
                  <li class="menu__item"><a href="view/waiters.html" class="menu__link">Camareros</a></li>
                  <li class="menu__item"><a href="view/mixologos.html" class="menu__link">Mixologos</a></li>
                  <li class="menu__item"><a href="view/buffett.html" class="menu__link">Buffet</a></li>
                  <li class="menu__item"><a href="view/decoraciones.html" class="menu__link">Decoraciones</a></li>
               </ul>
            </li>
            <li class="menu__item"><a href="view/us.html" class="menu__link">Nosotros</a></li>
            <li class="menu__item"><a href="view/contact.html" class="menu__link">Contacto</a></li>
         </ul>
      </div>
   </nav>
</body>

</html>
