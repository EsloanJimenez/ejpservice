<?php
   session_start();
   if (!isset($_SESSION['usuario'])) {
      header ("location:login.php");
   }
?>
<?php
   include 'conexion.php';

   $id = $_GET['id_sa'];

   $conexion->query("DELETE FROM sales WHERE id_sales = '$id'");

   header("Location:sales.php");
?>
