<?php
   session_start();
   if (!isset($_SESSION['usuario'])) {
      header ("location:login.php");
   }
?>
<?php
   include 'conexion.php';

   $id = $_GET['id_pe'];

   $conexion->query("DELETE FROM payment_waiter WHERE id_payment_waiter = '$id'");

   header("Location:sales.php");
?>
