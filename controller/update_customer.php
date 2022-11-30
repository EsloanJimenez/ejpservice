<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Clientes</title>
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
      include 'conexion.php';

      if (!isset($_POST['actualizar'])) {
         $id = $_GET['id_cus'];
         $nam = $_GET['nam'];
         $compa = $_GET['compa'];
         $ema = $_GET['ema'];
         $cel = $_GET['cel'];
      } else {
         $id = $_POST['id_cus'];
         $nam = $_POST['nam'];
         $compa = $_POST['compa'];
         $ema = $_POST['ema'];
         $cel = $_POST['cel'];

         $consulta = "UPDATE customers SET name = :miNam, company = :miCompa, email = :miEma, cell_phone = :miCel WHERE id_customers = :miId";

         $resultado = $conexion->prepare($consulta);
         $resultado->execute(array(":miId"=>$id, ":miNam"=>$nam, ":miCompa"=>$compa, ":miEma"=>$ema, ":miCel"=>$cel));

         header ("Location:customers.php");
      }
   ?>

   <div id="container">
      <?php include 'headerControlador.php';?>

      <div class="container_major">
         <div id="header">
            <h1>Panel / Clientes</h1>

            <div class="usuario">
               <img src="../img/icon/user.png" alt="">
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
                     <th>NOMBRE</th>
                     <th>COMPAÑIA</th>
                     <th>CORREO</th>
                     <th>TELEFONO</th>
                  </thead>
                  <tbody>
                     <tr>
                        <td><label for="id_cus"></label><input name="id_cus" id="id_cus" value="<?php echo $id?>"></td>
                        <td><label for="nam"></label><input type="text" name="nam" id="nam" value="<?php echo $nam ?>"></td>
                        <td><label for="compa"></label><input type="text" name="compa" id="compa" value="<?php echo $compa ?>"></td>
                        <td><label for="ema"></label><input type="text" name="ema" id="ema" value="<?php echo $ema ?>"></td>
                        <td><label for="cel"></label><input type="text" name="cel" id="cel" value="<?php echo $cel ?>"></td>
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
         const customers = document.getElementById("customers");
         customers.style.borderLeft = '5px solid #81b0be';
         customers.style.backgroundColor = '#192024';
      }
   </script>

   <script src="../js/nuevo_cliente.js" charset="utf-8"></script>
</body>

</html>
