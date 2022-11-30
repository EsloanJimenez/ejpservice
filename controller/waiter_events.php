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
   <link rel="stylesheet" href="../css/purchased_events.css">

   <style>
      .customer_list {
         height: 300px;
      }
   </style>

   <script src="https://kit.fontawesome.com/bab436a7aa.js" crossorigin="anonymous"></script>
</head>

<body>
   <?php
      include 'conexion.php';

      $idr = $_REQUEST['id'];

      $view_waiter = $conexion->query(
         "SELECT id_purchased_events, team_member, date, hotel, hotel_charge, (hotel_charge - waiter_payment) AS ganancia, waiter_payment, status FROM purchased_events WHERE team_member = $idr")->fetchAll(PDO::FETCH_OBJ);

         if (!isset($_POST['actualizar'])) {
            $id = $_GET['id'];
            $photo = $_GET['photo'];
            $name = $_GET['name'];
            $cell_phone = $_GET['cell_phone'];
            $cluster = $_GET['cluster'];
            $bank_name = $_GET['bank_name'];
            $bank_account_type = $_GET['bank_account_type'];
            $account_number = $_GET['account_number'];
            $date = $_GET['date'];
            $hotel = $_GET['hotel'];
            $hotel_charge = $_GET['hotel_charge'];
            $waiter_payment = $_GET['waiter_payment'];
            $status = $_GET['status'];
         }
   ?>

   <div id="container">
      <?php include 'headerControlador.php';?>

      <div class="container_major">
         <div id="header">
            <h1>Panel / Evento Comprado</h1>

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
            <h2>Ver Informacion De <?php echo $name ?></h2>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/multipart/form-data">
               <table id="actualizar_cliente">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>FOTO</th>
                        <th>NOMBRE</th>
                        <th># CELULAR</th>
                        <th>GRUPO</th>
                        <th>NOMBRE BANCO</th>
                        <th>TIPO DE CUENTA</th>
                        <th>NUMERO DE CUENTA</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td><?php echo $id ?></td>
                        <td><img src="/ejpservice/img/team_member/<?php echo $photo?>" width="150" height="150"></td>
                        <td><?php echo $name ?></td>
                        <td><?php echo $cell_phone ?></td>
                        <td><?php echo $cluster ?></td>
                        <td><?php echo $bank_name ?></td>
                        <td><?php echo $bank_account_type ?></td>
                        <td><?php echo $account_number ?></td>
                     </tr>
                  </tbody>
               </table>
            </form>
         </div>

         <div class="customer_list">
            <h2>Ver Eventos De <?php echo $name ?></h2>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/multipart/form-data">
               <table id="actualizar_cliente">
                  <thead>
                     <tr>
                        <th>FECHA</th>
                        <th>HOTEL</th>
                        <th>COBRAR AL HOTEL</th>
                        <th>PAGAR AL CAMARERO</th>
                        <th>GANANCIA</th>
                        <th>STATUS</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach($view_waiter as $muestrame): ?>
                        <?php if ($muestrame->status == "Por Pagar"): ?>
                           <tr class="to_pay">
                              <td><?php echo $muestrame->date ?></td>
                              <td><?php echo $muestrame->hotel ?></td>
                              <td><?php echo $muestrame->hotel_charge ?></td>
                              <td><?php echo $muestrame->waiter_payment ?></td>
                              <td><?php echo $muestrame->ganancia ?></td>
                              <td><?php echo $muestrame->status ?></td>
                           </tr>
                        <?php endif; ?>

                        <?php if ($muestrame->status == "Pagado"): ?>
                           <tr class="paid_out">
                              <td><?php echo $muestrame->date ?></td>
                              <td><?php echo $muestrame->hotel ?></td>
                              <td><?php echo $muestrame->hotel_charge ?></td>
                              <td><?php echo $muestrame->waiter_payment ?></td>
                              <td><?php echo $muestrame->ganancia ?></td>
                              <td><?php echo $muestrame->status ?></td>
                           </tr>
                        <?php endif; ?>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </form>
         </div>
      </div>
   </div>

   <script>
      window.onload = function () {
         const purchased_events = document.getElementById("purchased_events");
         purchased_events.style.borderLeft = '5px solid #81b0be';
         purchased_events.style.backgroundColor = '#192024';
      }
   </script>

   <script src="../js/nuevo_cliente.js" charset="utf-8"></script>
</body>

</html>
