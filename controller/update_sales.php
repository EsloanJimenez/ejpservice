<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Actualizar Venta</title>
   <link rel="shortcut icon" href="../img/icon/favicon.png">

   <link rel="stylesheet" href="../css/main.css">
   <link rel="stylesheet" href="../css/major.css">
   <link rel="stylesheet" href="../css/registration_forms.css">
   <link rel="stylesheet" href="../css/customers.css">
   <link rel="stylesheet" href="../css/buttons.css">
   <link rel="stylesheet" href="../css/inputs.css">

   <script src="https://kit.fontawesome.com/bab436a7aa.js" crossorigin="anonymous"></script>
</head>

<body>
   <?php
      include 'conexion.php';

      if (!isset($_POST['actualizar'])) {
         $id = $_GET['id_sa'];
         $des = $_GET['des'];
         $cus = $_GET['cus'];
         $dat = $_GET['dat'];
         $amo = $_GET['amo'];
         $pri = $_GET['pri'];
      } else {
         $id = $_POST['id_sa'];
         $des = $_POST['des'];
         $cus = $_POST['cus'];
         $dat = $_POST['dat'];
         $amo = $_POST['amo'];
         $pri = $_POST['pri'];

         $consulta = "UPDATE sales SET description = :miDes, customer = :miCus, date = :miDat, amount = :miAmo, price = :miPri WHERE id_sales = :miId";

         $resultado = $conexion->prepare($consulta);
         $resultado->execute(array(":miId"=>$id, ":miDes"=>$des, ":miCus"=>$cus, ":miDat"=>$dat, ":miAmo"=>$amo, ":miPri"=>$pri));

         header ("Location:sales.php");
      }
   ?>

   <div id="container">
      <?php include 'headerControlador.php';?>

      <div class="container_major">
         <div id="header">
            <h1>Panel / Clientes</h1>

            <div class="usuario">
               <img src="../img/icon/login.png" alt="">
               <h3>Nombre Usuario</h3>
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
                     <th>CANTIDAD</th>
                     <th>PRECIO</th>
                  </thead>
                  <tbody>
                     <tr>
                        <td><label for="id_sa"></label><input type="hidden" name="id_sa" id="id_sa" value="<?php echo $id ?>"></td>
                        <td><label for="des"></label><input type="text" name="des" id="des" value="<?php echo $des ?>"></td>
                        <td><label for="cus"></label><input type="text" name="cus" id="cus" value="<?php echo $cus ?>"></td>
                        <td><label for="dat"></label><input type="text" name="dat" id="dat" value="<?php echo $dat ?>"></td>
                        <td><label for="amo"></label><input type="text" name="amo" id="amo" value="<?php echo $amo ?>"></td>
                        <td><label for="pri"></label><input type="text" name="pri" id="pri" value="<?php echo $pri ?>"></td>
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
