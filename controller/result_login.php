<?php
   try {
      $conexion = new PDO('mysql:host=localhost; dbname=ejpservice', 'root', 'Enyher');

      //$conexion = new PDO('mysql:host=localhost; dbname=id19866232_ejpservice', 'id19866232_root', 'OTsL@nVFfmyqyDE8h#vj');


      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $conexion->exec("SET CHARACTER SET UTF8");

      $consulta = "SELECT * FROM admin WHERE login = :login AND password = :password";

      $resultado = $conexion->prepare($consulta);

      $login = htmlentities(addslashes($_POST['login']));
      $password = htmlentities(addslashes($_POST['password']));

      $resultado->bindValue(":login", $login);
      $resultado->bindValue(":password", $password);
      $resultado->execute();

      $row = $resultado->rowCount();

      if ($row != 0) {
         session_start();

         $_SESSION['usuario'] = $_POST['login'];

         header ('location:Panel.php');

      } else {
         header ("location:login.php");
      }

   } catch (Exception $e) {

      die ('Error ' . $e->GetMessage());

      echo "Conexion fallida.";
   }
?>
