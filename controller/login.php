<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Login</title>
   <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, maximum-scale=3, minimum-scale=1">

   <link rel="shortcut icon" href="../img/iconos/logo-fav.ico">
   <link rel="stylesheet" href="../css/login.css">
</head>
<body>
   <div class="container_login">
      <div class="login">
         <div class="head">
            <img src="../img/icon/logo_nuevo_blanco.png">
            <h1>Inicio de Seccion</h1>
         </div>

         <form action="result_login.php" method="post">
            <input type="text" name="login" id="login" placeholder="Login" required autofocus><br>
            <input type="password" name="password" id="password" placeholder="Password" required><br>
            <input type="submit" id="enviar" name="enviar" value="Iniciar Seccion">
         </form>

         <p>Olvidaste la contraseña? <a href="#">Click aqui</a></p>
      </div>
   </div>
</body>
</html>
