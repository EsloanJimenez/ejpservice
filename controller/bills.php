<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Gastos</title>
   <link rel="shortcut icon" href="../img/icon/favicon.png">

   <link rel="stylesheet" href="../css/main.css">
   <link rel="stylesheet" href="../css/major.css">
   <link rel="stylesheet" href="../css/registration_forms.css">
   <link rel="stylesheet" href="../css/customers.css">
   <link rel="stylesheet" href="../css/buttons.css">
   <link rel="stylesheet" href="../css/inputs.css">
   <link rel="stylesheet" href="../css/register_team_member.css">

   <style>
      .btn_delete, .btn_update {
         width: 20px;
      }
   </style>

   <script src="https://kit.fontawesome.com/bab436a7aa.js" crossorigin="anonymous"></script>
</head>

<body>
   <?php
      include 'conexion.php';

      // ------------- PAGINACION ----------------------
      $size_pagina = 10;
      $total = 0;

      if (isset($_GET["pagina"])) {
         if ($_GET["pagina"]==1) {
            header("Location:bills.php");
         } else {
            $pagina=$_GET["pagina"];
         }
      } else {
         $pagina = 1;
      }

      $empezar_desde = ($pagina-1)*$size_pagina;

      $sql_total = "SELECT * FROM bill";
      $resultado_paginacion = $conexion->prepare($sql_total);
      $resultado_paginacion->execute();
      $num_filas = $resultado_paginacion->rowCount();
      $total_paginas = ceil($num_filas/$size_pagina);

      // --------------------- CIERRE DE LA PAGINACION ----------------------

      $registrar = $conexion->query("SELECT id_bill, user_admin, description, date, amount, price, (amount*price) AS subTo FROM bill LIMIT $empezar_desde,$size_pagina")->fetchAll(PDO::FETCH_OBJ);

      if (isset($_POST['insertar'])) {
         $user_admin = $_POST['user_admin'];
         $description = $_POST['description'];
         $date = $_POST['date'];
         $amount = $_POST['amount'];
         $price = $_POST['price'];

         $consulta = "INSERT INTO bill (user_admin, description, date, amount, price) VALUES (:usId, :des, :dat, :amo, :pri)";

         $resultado = $conexion->prepare($consulta);
         $resultado->execute(array(":usId"=>$user_admin, ":des"=>$description, ":dat"=>$date, ":amo"=>$amount, ":pri"=>$price));

         header("Location:bills.php");
      }
   ?>

   <div id="container">
      <?php include 'headerControlador.php';?>

      <!-- NUEVO GASTO -->
      <div class="new_customer_fund hide_font">
         <div class="customer">
            <p class="clouse_client" onclick="clouse_client()">X</p>

            <div class="center">
               <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                  <table>
                     <tr>
                        <td>
                           <div class="select">
                              <select id="user_admin" name="user_admin">
                                 <?php
                                    $sql = "SELECT * FROM admin";
                                    $reg = $conexion->prepare($sql);
                                    $reg->execute();

                                    while ($res = $reg->fetch(PDO::FETCH_ASSOC)) {
                                       echo "<option value=" . $res['id_admin'] . ">" . $res['login'] . "</option>";
                                    }
                                 ?>
                              </select>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td><input type="text" id="description" name="description" placeholder="Descripcion del gasto"></td>
                     </tr>
                     <tr>
                        <td><input type="datetime-local" id="date" name="date"></td>
                     </tr>
                     <tr>
                        <td><input type="number" id="amount" name="amount" placeholder="Cantidad"></td>
                     </tr>
                     <tr>
                        <td><input type="number" id="price" name="price" placeholder="Precio"></td>
                     </tr>
                        <td colspan="2" style="text-align: center" class="btn_registrar"><input type="submit" name="insertar" value="Registrar"></td>
                     </tr>
                  </table>
               </form>

            </div>
         </div>
      </div>

      <div class="container_major">
         <div id="header">
            <h1>Panel / Gastos</h1>

            <div class="usuario">
               <img src="../img/icon/login.png" alt="">
               <h3>Nombre Usuario</h3>
            </div>
         </div>

         <div class="barra">
            <form class="buscar" action="buscar.html" method="get">
               <input type="text" name="buscar" id="buscar" placeholder="Buscar Gasto">
            </form>

            <div class="botton">
               <button type="button" name="new_client" id="new_client" class="btn_register" onclick="new_client()"><i class="fa-solid fa-user-plus"></i></button>
               <button type="button" name="config_cliente" id="config_cliente" class="neutral">...</button>
            </div>
         </div>

         <div class="customer_list">
            <h2>Lista De Gastos</h2>

            <table>
               <tr>
                  <td colspan="12" style="text-align: center;">
                     <?php
                        for ($i=1; $i <= $total_paginas; $i++) {
                           echo "<a href='?pagina=" . $i . "'>" . $i . "</a>";
                        }
                     ?>
                  </td>
               </tr>

               <tr class="cabezera">
                  <th>ID</th>
                  <th>DESCRIPCION</th>
                  <th>FECHA</th>
                  <th>CANTIDAD</th>
                  <th>PRECIO</th>
                  <th>SUB TOTAL</th>
               </tr>
               <?php foreach ($registrar as $gasto): ?>
                  <tr class="cuerpo">
                     <td><?php echo $gasto->id_bill ?></td>
                     <td><?php echo $gasto->description ?></td>
                     <td><?php echo $gasto->date ?></td>
                     <td><?php echo $gasto->amount?></td>
                     <td><?php echo $gasto->price ?></td>
                     <td><?php $subTo = $gasto->subTo; echo $gasto->subTo; $total += $subTo; ?></td>

                     <td>
                        <!-- boton de eliminar -->
                        <a href="delete_bill.php?usId=<?php echo $gasto->id_bill ?>"><i class="btn_delete fa-solid fa-user-minus" name="eliminar"></i></a>

                        <!-- BOTON DE ACTUALIZAR -->
                        <a href="update_bill.php?usId=<?php echo $gasto->id_bill ?> & des=<?php echo $gasto->description ?> & dat=<?php echo $gasto->date ?> & amo=<?php echo $gasto->amount ?> & pri=<?php echo $gasto->price ?>"><i class="btn_update fa-solid fa-user-gear" name="actualizar"></i></a>
                     </td>
                     <td class="separador">-----------------------------------------</td>
                  </tr>
               <?php endforeach; ?>
               <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><h3><?php echo $total; ?></h3></td>
                  <td><h3>TOTAL</h3></td>
               </tr>
                  <tr>
                     <td colspan="12" style="text-align: center;">
                        <?php
                           for ($i=1; $i <= $total_paginas; $i++) {
                              echo "<a href='?pagina=" . $i . "'>" . $i . "</a>";
                           }
                        ?>
                     </td>
                  </tr>
            </table>
         </div>
      </div>
   </div>

   <script src="../js/registration_forms.js" charset="utf-8"></script>

   <script>
      window.onload = function () {
         const bills = document.getElementById("bills");
         bills.style.borderLeft = '5px solid #81b0be';
         bills.style.backgroundColor = '#192024';
      }
   </script>
</body>
</html>
