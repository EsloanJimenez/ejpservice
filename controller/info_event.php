<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Informacion Evento</title>
   <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, maximum-scale=3, minimum-scale=1">
   <link rel="shortcut icon" href="../img/icon/favicon.png">

   <link rel="stylesheet" href="../css/main.css">
   <link rel="stylesheet" href="../css/major.css">
   <link rel="stylesheet" href="../css/sales.css">
   <link rel="stylesheet" href="../css/buttons.css">
   <link rel="stylesheet" href="../css/inputs.css">

   <style media="screen">
      .btn_delete, .btn_update, .btn_view {
         width: 20px;
         padding: 10px;
      }
   </style>

   <script src="https://kit.fontawesome.com/bab436a7aa.js" crossorigin="anonymous"></script>
</head>

<body>
   <?php
      session_start();
      if (!isset($_SESSION['usuario'])) {
         header ("location:login.php");
      }

      include 'conexion.php';

      $idr = $_REQUEST['id'];

      $pay_wai = 0;
      $contador = 0;

      $view_event = $conexion->query("SELECT * FROM payment_waiter WHERE event = $idr")->fetchAll(PDO::FETCH_OBJ);

      if (!isset($_POST['actualizar'])) {
         $id = $_GET['id'];
         $des = $_GET['des'];
         $cus = $_GET['cus'];
         $dat = $_GET['dat'];
         $amo = $_GET['amo'];
         $pri = $_GET['pri'];
         $tot = $_GET['tot'];
      }
   ?>

   <div id="container">
      <?php include 'headerControlador.php';?>

      <div class="container_major">
         <div id="header">
            <h1>Panel / Informacion Venta</h1>

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

         <div class="flexible">
            <div class="sales_list ">
               <h2>Informacion Evento</h2>

               <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/multipart/form-data">
                  <table id="info_event">
                     <thead>
                        <tr id="cabezera">
                           <th>DESCRIPCION</th>
                           <th>CLIENTE</th>
                           <th>FECHA</th>
                           <th>CANTIDAD</th>
                           <th>PRECIO</th>
                           <th>TOTAL</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td title="Descripcion"><?php echo $des ?></td>
                           <td title="Nombre Cliente"><?php echo $cus ?></td>
                           <td title="Fecha"><?php echo $dat ?></td>
                           <td title="Cantidad Camareros"><?php echo $amo ?></td>
                           <td title="Precio"><?php echo $pri ?></td>
                           <td title="Total"><?php echo $tot ?></td>
                        </tr>
                     </tbody>
                  </table>
               </form>
            </div>

            <div class="sales_list">
               <h2>Miembro De Equipo Que Asistieron</h2>

               <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/multipart/form-data">
                  <table id="attended">
                     <thead>
                        <tr id="cabezera">
                           <th>ID</th>
                           <th>NOMBRE</th>
                           <th>STATUS</th>
                           <th>PAGO</th>
                           <th>SUB TOTAL</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($view_event as $view): ?>
                           <tr class="cuerpo">
                              <td><?php $contador++; echo $contador; ?></td>
                              <td><?php echo $view->name ?></td>
                              <?php
                                 if ($view->status == "Por Pagar") {
                                    echo "<td class='to_pay'>" . $view->status . "</td>";
                                 } else {
                                    echo "<td class='paid_out'>" . $view->status . "</td>";
                                 }
                              ?>
                              <td><?php $pay = $view->payment; echo $view->payment; $pay_wai += $pay;?></td>
                              <td></td>
                              <td>
                                 <!-- boton de eliminar -->
                                 <a href="delete_payable_events.php?id_pe=<?php echo $view->id_payment_waiter ?>"><i class="btn_delete fa-solid fa-user-minus" name="eliminar"></i></a>

                                 <!-- BOTON DE ACTUALIZAR -->
                                 <a href="update_payable_events.php?id_pe=<?php echo $view->id_payment_waiter ?> & nam=<?php echo $view->name ?> & dat=<?php echo $view->date ?> & pay=<?php echo $view->payment ?> & sta=<?php echo $view->status ?>"><i class="btn_update fa-solid fa-user-gear" name="actualizar"></i></a>
                              </td>
                              <td class="separador">-----------------------------------------</td>
                           </tr>
                        <?php endforeach; ?>
                        <tr>
                           <td></td>
                           <td><br></td>
                           <td></td>
                           <td class="totals">PAGO DEL CLIENTE</td>
                           <td class="totals"><?php echo $tot ?></td>
                        </tr>
                        <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td class="totals">PAGO DEL CAMARERO</td>
                           <td class="totals"><?php echo $pay_wai ?></td>
                           <td></td>
                        </tr>
                        <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td class="totals">GANANCIA DEL EVENTO</td>
                           <td class="totals"><?php $total = $tot - $pay_wai; echo $total ?></td>
                           <td class="totals">TOTAL</td>
                        </tr>
                     </tbody>
                  </table>
               </form>
            </div>
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
