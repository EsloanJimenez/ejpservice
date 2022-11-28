<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Eventos Comprados</title>
   <link rel="shortcut icon" href="../img/icon/favicon.png">

   <link rel="stylesheet" href="../css/main.css">
   <link rel="stylesheet" href="../css/major.css">
   <link rel="stylesheet" href="../css/window.css">
   <link rel="stylesheet" href="../css/customers.css">
   <link rel="stylesheet" href="../css/buttons.css">
   <link rel="stylesheet" href="../css/inputs.css">
   <link rel="stylesheet" href="../css/purchased_events.css">

   <style>
      .hide_font {
         display: none;
      }
      #cabezera {
         position: relative;
         top: 5px;
      }
      #cabezera th {
         font-size: 16px;
      }
   </style>

   <script src="https://kit.fontawesome.com/bab436a7aa.js" crossorigin="anonymous"></script>
</head>

<body>
   <?php
      include 'conexion.php';

      $full_collect = 0;
      $full_pay = 0;
      $full_gain = 0;

      $payable_events_full_collect = 0;
      $payable_events_full_pay = 0;
      $payable_events_full_gain = 0;

      $registrar = $conexion->query(
         "SELECT t.id_team_member, t.name, t.photo, t.cell_phone, t.cluster, t.bank_name, t.bank_account_type, t.account_number,
         p.id_purchased_events, p.team_member, p.date, DATE_FORMAT(p.date, '%d/%m/%Y') AS new_date, p.time, p.hotel, p.hotel_charge, (p.hotel_charge - p.waiter_payment) AS ganancia, p.waiter_payment, p.status
         FROM team_member t RIGHT JOIN purchased_events p ON t.id_team_member = p.team_member
         ORDER BY p.id_purchased_events DESC"
      )->fetchAll(PDO::FETCH_OBJ);

      $payable_events = $conexion->query(
         "SELECT t.name,
         p.id_purchased_events, p.team_member, p.date, DATE_FORMAT(p.date, '%d/%m/%Y') AS new_date_pay, p.time, p.hotel, p.hotel_charge, SUM(p.hotel_charge) hot_charge, p.waiter_payment, SUM(p.waiter_payment) wai_payment, p.status
         FROM team_member t RIGHT JOIN purchased_events p ON t.id_team_member = p.team_member
         WHERE p.status = 'Por Pagar'
         GROUP BY t.name "
      )->fetchAll(PDO::FETCH_OBJ);

      $view_waiter = $conexion->query(
         "SELECT t.id_team_member, t.name, t.photo, t.cell_phone, t.cluster, t.bank_name, t.bank_account_type, t.account_number,
         p.id_purchased_events, p.team_member, p.date, p.time, p.hotel, p.hotel_charge, SUM(p.hotel_charge) hot_charge, (p.hotel_charge - p.waiter_payment) AS ganancia, p.waiter_payment, SUM(p.waiter_payment) wai_payment, p.status
         FROM team_member t RIGHT JOIN purchased_events p ON t.id_team_member = p.team_member
         GROUP BY t.name "
      )->fetchAll(PDO::FETCH_OBJ);

      if (isset($_POST['insertar'])) {
         $team_member = $_POST['team_member'];
         $date = $_POST['date'];
         $time = $_POST['time'];
         $hotel = $_POST['hotel'];
         $hotel_charge = $_POST['hotel_charge'];
         $waiter_payment = $_POST['waiter_payment'];
         $status = $_POST['status'];

         $consulta = "INSERT INTO purchased_events (team_member, date, time, hotel, hotel_charge, waiter_payment, status) VALUES (:tea_mem, :dat, :tim, :hot, :hot_cha, :wai_pay, :sta)";

         $resultado = $conexion->prepare($consulta);
         $resultado->execute(array(":tea_mem"=>$team_member,":dat"=>$date, ":tim"=>$time, ":hot"=>$hotel, ":hot_cha"=>$hotel_charge, ":wai_pay"=>$waiter_payment, ":sta"=>$status));

         header("Location:purchased_events.php");
      }
   ?>

   <div id="container">
      <?php include 'headerControlador.php';?>

      <!-- NUEVO EVENTO COMPRADO -->
      <div class="new_customer_fund hide_font">
         <div class="customer">
            <p class="clouse_client">X</p>

            <div class="center">
               <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                  <table>
                     <tr>
                        <div class="select">
                           <select id="team_member" name="team_member">
                              <?php
                                 $sql = "SELECT * FROM team_member";
                                 $reg = $conexion->prepare($sql);
                                 $reg->execute();

                                 while ($res = $reg->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option value=". $res['id_team_member'] . ">" . $res['name'] . "</option>";
                                 }
                              ?>
                           </select>
                        </div>
                     </tr>
                     <tr>
                        <td><input type="date" id="date" name="date"></td>
                     </tr>
                     <tr>
                        <td><input type="time" id="time" name="time"></td>
                     </tr>
                     <tr>
                        <div class="select">
                           <select id="hotel" name="hotel">
                              <option>Embassy Suite</option>
                              <option>JW Marriot</option>
                           </select>
                        </div>
                     </tr>
                     <tr>
                        <td><input type="text" id="hotel_charge" name="hotel_charge" placeholder="Cobrar Al Hotel"></td>
                     </tr>
                     <tr>
                        <td><input type="text" id="waiter_payment" name="waiter_payment" placeholder="Pagarle Al Camarero"></td>
                     </tr>
                     <tr>
                        <div class="select">
                           <select id="status" name="status">
                              <option>Por Pagar</option>
                              <option>Pagado</option>
                           </select>
                        </div>
                     </tr>
                     <tr>
                        <td colspan="2" style="text-align: center" class="btn_registrar"><input type="submit" name="insertar" value="Registrar"></td>
                     </tr>
                  </table>
               </form>

            </div>
         </div>
      </div>

      <div class="container_major">
         <div id="header">
            <h1>Panel / Eventos Comprados</h1>

            <div class="usuario">
               <img src="../img/icon/login.png" alt="">
               <h3>Nombre Usuario</h3>
            </div>
         </div>

         <div class="barra">
            <form class="buscar" action="buscar.html" method="get">
               <input type="text" name="buscar" id="buscar" placeholder="Buscar Camarero">
            </form>

            <div class="botton">
               <button type="button" name="print" class="btn_print" onclick="print()"><i class="fa-solid fa-print"></i>Imprimir</button>
            </div>

            <div class="botton">
               <button type="button" name="new_client" id="new_client" class="btn_register">Nueva Compra De Evento</button>
            </div>
         </div>

         <div class="customer_list">
            <h2>Lista De Eventos Comprados</h2>

            <table>
                  <tr id="cabezera">
                     <th>ID</th>
                     <th>NOMBRE CAMARERO</th>
                     <th>FECHA</th>
                     <th>HORA</th>
                     <th>HOTEL</th>
                     <th>COBRAR AL HOTEL</th>
                     <th>PAGAR AL CAMARERO</th>
                     <th>GANANCIA</th>
                     <th>STATUS</th>
                  </tr>
                  <?php foreach ($registrar as $miembro_equipo): ?>
                     <?php if ($miembro_equipo->status == "Por Pagar"): ?>
                        <tr class="to_pay cuerpo">
                              <td><?php echo $miembro_equipo->id_purchased_events ?></td>
                              <td>
                                 <a href="waiter_events.php?id=<?php echo $miembro_equipo->id_team_member?> & photo=<?php echo $miembro_equipo->photo?> & name=<?php echo $miembro_equipo->name?> & cell_phone=<?php echo $miembro_equipo->cell_phone?>  & cluster=<?php echo $miembro_equipo->cluster?> & bank_name=<?php echo $miembro_equipo->bank_name?> & bank_account_type=<?php echo $miembro_equipo->bank_account_type?> & account_number=<?php echo $miembro_equipo->account_number?> & date=<?php echo $miembro_equipo->date?> & hotel=<?php echo $miembro_equipo->hotel?> & hotel_charge=<?php echo $miembro_equipo->hotel_charge?> & waiter_payment=<?php echo $miembro_equipo->waiter_payment?> & status=<?php echo $miembro_equipo->status?>">
                                    <?php echo $miembro_equipo->name ?>
                                 </a>
                              </td>
                              <td><?php echo $miembro_equipo->new_date ?></td>
                              <td><?php echo $miembro_equipo->time ?></td>
                              <td><?php echo $miembro_equipo->hotel ?></td>
                              <td><?php $full_collect += $miembro_equipo->hotel_charge; echo $miembro_equipo->hotel_charge ?></td>
                              <td><?php $full_pay += $miembro_equipo->waiter_payment; echo $miembro_equipo->waiter_payment ?></td>
                              <td><?php $full_gain += $miembro_equipo->ganancia; echo $miembro_equipo->ganancia; ?></td>
                              <td><?php echo $miembro_equipo->status; ?></td>
                           <td>
                              <!-- boton de eliminar -->
                              <a href="delete_purchased_events.php?id=<?php echo $miembro_equipo->id_purchased_events ?>"><i class="btn_delete fa-solid fa-user-minus" name="eliminar"></i></a>

                              <!-- BOTON DE ACTUALIZAR -->
                              <a href="update_purchased_events.php?id_pur_eve=<?php echo $miembro_equipo->id_purchased_events ?> & te_mem=<?php echo $miembro_equipo->team_member ?> & dat=<?php echo $miembro_equipo->date ?> & sta=<?php echo $miembro_equipo->status ?> "><i class="btn_update fa-solid fa-user-gear" name="actualizar"></i></a>
                           </td>
                           <td class="separador">-----------------------------------------</td>
                        </tr>
                     <?php endif; ?>
                     <?php if ($miembro_equipo->status == "Pagado"): ?>
                        <tr class="paid_out cuerpo">
                           <td><?php echo $miembro_equipo->id_purchased_events ?></td>
                           <td>
                              <a href="waiter_events.php?id=<?php echo $miembro_equipo->id_team_member?> & photo=<?php echo $miembro_equipo->photo?> & name=<?php echo $miembro_equipo->name?> & cell_phone=<?php echo $miembro_equipo->cell_phone?>  & cluster=<?php echo $miembro_equipo->cluster?> & bank_name=<?php echo $miembro_equipo->bank_name?> & bank_account_type=<?php echo $miembro_equipo->bank_account_type?> & account_number=<?php echo $miembro_equipo->account_number?> & date=<?php echo $miembro_equipo->date?> & hotel=<?php echo $miembro_equipo->hotel?> & hotel_charge=<?php echo $miembro_equipo->hotel_charge?> & waiter_payment=<?php echo $miembro_equipo->waiter_payment?> & status=<?php echo $miembro_equipo->status?>">
                                 <?php echo $miembro_equipo->name ?>
                              </a>
                           </td>
                           <td><?php echo $miembro_equipo->new_date ?></td>
                           <td><?php echo $miembro_equipo->time ?></td>
                           <td><?php echo $miembro_equipo->hotel ?></td>
                           <td><?php $full_collect += $miembro_equipo->hotel_charge; echo $miembro_equipo->hotel_charge ?></td>
                           <td><?php $full_pay += $miembro_equipo->waiter_payment; echo $miembro_equipo->waiter_payment ?></td>
                           <td><?php $full_gain += $miembro_equipo->ganancia; echo $miembro_equipo->ganancia; ?></td>
                           <td><?php echo $miembro_equipo->status; ?></td>

                           <td>
                              <!-- boton de eliminar -->
                              <a href="delete_purchased_events.php?id=<?php echo $miembro_equipo->id_purchased_events ?>"><i class="btn_delete fa-solid fa-user-minus" name="eliminar"></i></a>

                              <!-- BOTON DE ACTUALIZAR -->
                              <a href="update_purchased_events.php?id_pur_eve=<?php echo $miembro_equipo->id_purchased_events ?> & te_mem=<?php echo $miembro_equipo->team_member ?> & dat=<?php echo $miembro_equipo->date ?> & sta=<?php echo $miembro_equipo->status ?> "><i class="btn_update fa-solid fa-user-gear" name="actualizar"></i></a>
                           </td>
                           <td class="separador">-----------------------------------------</td>
                     <?php endif; ?>
                  <?php endforeach; ?>
                  <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td class="totals"><?php echo $full_collect; ?></td>
                     <td class="totals"><?php echo $full_pay; ?></td>
                     <td class="totals"><?php echo $full_gain; ?></td>
                     <td class="totals">TOTALES</td>
                  </tr>
            </table>
         </div>

         <div class="customer_list">
            <h2>Lista De Eventos Por Pagar</h2>

            <table>
                  <tr id="cabezera">
                     <th>ID</th>
                     <th>NOMBRE CAMARERO</th>
                     <th>FECHA</th>
                     <th>HORA</th>
                     <th>HOTEL</th>
                     <th>COBRAR AL HOTEL</th>
                     <th>PAGAR AL CAMARERO</th>
                     <th>GANANCIA</th>
                     <th>STATUS</th>
                  </tr>
                  <?php foreach ($payable_events as $event): ?>
                     <tr class="cuerpo">
                        <td><?php echo $event->id_purchased_events ?></td>
                        <td><?php echo $event->name ?></td>
                        <td><?php echo $event->new_date_pay ?></td>
                        <td><?php echo $event->time ?></td>
                        <td><?php echo $event->hotel ?></td>
                        <td><?php $view_charge = $event->hot_charge; $payable_events_full_collect += $event->hot_charge; echo $event->hot_charge ?></td>
                        <td><?php $view_pay = $event->wai_payment; $payable_events_full_pay += $event->wai_payment; echo $event->wai_payment ?></td>
                        <td>
                           <?php
                              $view_gain = $view_charge - $view_pay;

                              echo $view_gain;

                              $payable_events_full_gain += $view_gain;
                           ?>
                        </td>

                        <?php
                           if ($event->status == "Por Pagar") {
                              echo "<td class='to_pay'>" . $event->status . "</td>";
                           } else {
                              echo "<td class='paid_out'>" . $event->status . "</td>";
                           }
                        ?>
                        <td class="separador">-----------------------------------------</td>
                     </tr>

                  <?php endforeach; ?>
                  <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td class="totals"><?php echo $payable_events_full_collect; ?></td>
                     <td class="totals"><?php echo $payable_events_full_pay; ?></td>
                     <td class="totals"><?php echo $payable_events_full_gain; ?></td>
                     <td class="totals">TOTALES</td>
                  </tr>
            </table>
         </div>
      </div>
   </div>

   <script src="../js/registration_forms.js" charset="utf-8"></script>

   <script>
      window.onload = function () {
         const purchased_events = document.getElementById("purchased_events");
         purchased_events.style.borderLeft = '5px solid #81b0be';
         purchased_events.style.backgroundColor = '#192024';
      }
   </script>
</body>
</html>
