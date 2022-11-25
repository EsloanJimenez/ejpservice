<?php
   try {
      $conexion = new PDO('mysql:host=localhost; dbname=ejpservice', 'root', 'Enyher');

      //$conexion = new PDO('mysql:host=localhost; dbname=id19866232_ejpservice', 'id19866232_root', 'OTsL@nVFfmyqyDE8h#vj');

      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $conexion->exec("SET CHARACTER SET UTF8");

   } catch (Exception $e) {

      die ('Error ' . $e->GetMessage());

      echo "Conexion fallida.";
   }
?>
