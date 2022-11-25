<?php
   session_start();
   if (!isset($_SESSION['usuario'])) {
      header ("location:login.php");
   }
?>
<?php
   include 'conexion.php';

   $id = $_GET['usId'];

   $conexion->query("DELETE FROM bill WHERE id_bill = '$id'");

   header("Location:bills.php");
?>
