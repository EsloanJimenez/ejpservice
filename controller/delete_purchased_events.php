<?php
   session_start();
   if (!isset($_SESSION['usuario'])) {
      header ("location:login.php");
   }
?>
<?php
   include 'conexion.php';

   $id = $_GET['id'];

   $conexion->query("DELETE FROM purchased_events WHERE id_purchased_events = '$id'");

   header("Location:purchased_events.php");
?>
