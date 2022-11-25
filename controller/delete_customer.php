<?php
   session_start();
   if (!isset($_SESSION['usuario'])) {
      header ("location:login.php");
   }
?>
<?php
   include 'conexion.php';

   $id = $_GET['id'];

   $conexion->query("DELETE FROM customers WHERE id_customers = '$id'");

   header("Location:customers.php");
?>
