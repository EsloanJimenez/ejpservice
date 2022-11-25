<?php
   session_start();
   if (!isset($_SESSION['usuario'])) {
      header ("location:login.php");
   }
?>
<?php
   include 'conexion.php';

   $id = $_GET['id'];

   $conexion->query("DELETE FROM team_member WHERE id_team_member = '$id'");

   header("Location:team_member.php");
?>
