<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Actualizar Venta</title>
   <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, maximum-scale=3, minimum-scale=1">
   <link rel="shortcut icon" href="../img/icon/favicon.png">

   <link rel="stylesheet" href="../css/main.css">
   <link rel="stylesheet" href="../css/major.css">
   <link rel="stylesheet" href="../css/window.css">
   <link rel="stylesheet" href="../css/customers.css">
   <link rel="stylesheet" href="../css/buttons.css">
   <link rel="stylesheet" href="../css/inputs.css">

   <script src="https://kit.fontawesome.com/bab436a7aa.js" crossorigin="anonymous"></script>
</head>

<body>
   <?php
      session_start();
      if (!isset($_SESSION['usuario'])) {
         header ("location:login.php");
      }

      include 'conexion.php';

      if (!isset($_POST['actualizar'])) {
         $id = $_GET['id_sa'];
         $des = $_GET['des'];
         $cus = $_GET['cus'];
         $dat = $_GET['dat'];
         $tim = $_GET['tim'];
         $amo = $_GET['amo'];
         $pri = $_GET['pri'];
         $com = $_GET['com'];
      } else {
         $id = $_POST['id_sa'];
         $des = $_POST['des'];
         $cus = $_POST['cus'];
         $dat = $_POST['dat'];
         $tim = $_POST['tim'];
         $amo = $_POST['amo'];
         $pri = $_POST['pri'];
         $com = $_POST['com'];

         $consulta = "UPDATE sales SET description = :miDes, customer = :miCus, date = :miDat, time = :miTim, amount = :miAmo, price = :miPri, comment = :miCom WHERE id_sales = :miId";

         $resultado = $conexion->prepare($consulta);
         $resultado->execute(array(":miId"=>$id, ":miDes"=>$des, ":miTim"=>$tim, ":miCus"=>$cus, ":miDat"=>$dat, ":miAmo"=>$amo, ":miPri"=>$pri, ":miCom"=>$com));

         header ("Location:sales.php");
      }
   ?>

   <div id="container">
      <?php include 'headerControlador.php';?>

      <div class="container_major">
         <div id="header">
            <h1>Panel / Clientes</h1>

            <div class="usuario">
               <?php
                  //echo "<h3>" . $_SESSION['usuario'] . "</h3>";
                  if($_SESSION['usuario'] == "Enrique") {
                     $view_phit = $conexion->query("SELECT photo, name FROM team_member WHERE id_team_member = 1")->fetchAll(PDO::FETCH_OBJ);

                     foreach($view_phit as $phit) {
                        echo '<img class="profile" src="/ejpservice/img/team_member/' . $phit->photo . '">';
                        echo "<h3>" . $phit->name . "</h3>";
                     }

                  } else if($_SESSION['usuario'] == "Tomas") {
                     $view_phit = $conexion->query("SELECT photo, name FROM team_member WHERE id_team_member = 2")->fetchAll(PDO::FETCH_OBJ);

                     foreach($view_phit as $phit) {
                        echo '<img class="profile" src="/ejpservice/img/team_member/' . $phit->photo . '">';
                        echo "<h3>" . $phit->name . "</h3>";
                     }
                  }
               ?>
            </div>
         </div>

         <div class="barra">
            <form class="buscar" action="buscar.html" method="get">
               <input type="text" name="buscar" id="buscar" placeholder="Buscar Cliente">
            </form>
         </div>

         <div class="customer_list">
            <h2>Actualizar Clientes</h2>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/multipart/form-data">
               <table>
                  <thead>
                     <th>ID</th>
                     <th>DESCRIPCION</th>
                     <th>CLIENTE</th>
                     <th>FECHA</th>
                     <th>HORA</th>
                     <th>CANTIDAD</th>
                     <th>PRECIO</th>
                     <th>COMENTARIO</th>
                  </thead>
                  <tbody>
                     <tr>
                        <td><label for="id_sa"></label><input type="hidden" name="id_sa" id="id_sa" value="<?php echo $id ?>"></td>
                        <td><label for="des"></label><input type="text" name="des" id="des" value="<?php echo $des ?>"></td>
                        <td><label for="cus"></label><input type="text" name="cus" id="cus" value="<?php echo $cus ?>"></td>
                        <td><label for="dat"></label><input type="text" name="dat" id="dat" value="<?php echo $dat ?>"></td>
                        <td><label for="tim"></label><input type="text" name="tim" id="tim" value="<?php echo $tim ?>"></td>
                        <td><label for="amo"></label><input type="text" name="amo" id="amo" value="<?php echo $amo ?>"></td>
                        <td><label for="pri"></label><input type="text" name="pri" id="pri" value="<?php echo $pri ?>"></td>
                        <td><label for="com"><textarea name="com" id="com" cols="30" rows="5" placeholder="<?php echo $com ?>"></textarea></td>
                        <td colspan="2"><input type="submit" name="actualizar" class="btn_update" value="Actualizar"></td>
                     </tr>
                  </tbody>
               </table>
            </form>
         </div>
      </div>
   </div>

   <script>
      window.onload = function () {
         const sales = document.getElementById("sales");
         sales.style.borderLeft = '5px solid #81b0be';
         sales.style.backgroundColor = '#192024';
      }
   </script>
</body>

</html>
