<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Ventas</title>
   <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, maximum-scale=3, minimum-scale=1">
   <link rel="shortcut icon" href="../img/icon/favicon.png">

   <link rel="stylesheet" href="../css/main.css">
   <link rel="stylesheet" href="../css/major.css">
   <link rel="stylesheet" href="../css/window.css">
   <link rel="stylesheet" href="../css/customers.css">
   <link rel="stylesheet" href="../css/sales.css">
   <link rel="stylesheet" href="../css/buttons.css">
   <link rel="stylesheet" href="../css/inputs.css">

   <style>
      .btn_delete, .btn_update, .btn_view {
         width: 20px;
         padding: 10px;
      }
      .customer_list {
         height: 42vh;
      }
      .sales_list {
         height: 42vh;
      }
      .hide_font{
         display: none;
      }
   </style>

   <script src="https://kit.fontawesome.com/bab436a7aa.js" crossorigin="anonymous"></script>
</head>

<body>
   <?php
      include 'conexion.php';

      $toPrice = 0;
      $toPayWainter = 0;
      $toGain = 0;
      $contador = 0;

      //$registrar = $conexion->query("SELECT * FROM sales")->fetchAll(PDO::FETCH_OBJ);
      $registrar = $conexion->query(
         "SELECT c.name,
         s.id_sales, s.description, s.customer, s.date, DATE_FORMAT(s.date, '%d/%m/%Y') AS new_date, s.time, s.amount, s.price, (s.amount * s.price) total, s.comment
         FROM customers c RIGHT JOIN sales s ON s.customer = c.id_customers
         ORDER BY s.id_sales DESC"
      )->fetchAll(PDO::FETCH_OBJ);

      $view_waiter = $conexion->query(
         "SELECT p.id_payment_waiter, p.name, p.date, p.payment, p.status,
         s.description, s.price
         FROM sales s RIGHT JOIN payment_waiter p ON s.id_sales = p.event
         WHERE p.status = 'Por Pagar'"
      )->fetchAll(PDO::FETCH_OBJ);

      if (isset($_POST['insertar_venta'])) {
         $description = $_POST['description'];
         $customer = $_POST['customer'];
         $date = $_POST['date'];
         $time = $_POST['time'];
         $amount = $_POST['amount'];
         $price = $_POST['price'];
         $comment = $_POST['comment'];

         $consulta = "INSERT INTO sales (description, customer, date, time, amount, price, comment) VALUES (:des, :cus, :dat, :tim, :amo, :pri, :com)";

         $resultado = $conexion->prepare($consulta);
         $resultado->execute(array(":des"=>$description,":cus"=>$customer, ":dat"=>$date, ":tim"=>$time, ":amo"=>$amount, ":pri"=>$price, ":com"=>$comment));

         header("Location:sales.php");
      }

      if (isset($_POST['insertar_waiter'])) {
         $name = $_POST['name'];
         $date = $_POST['date'];
         $event = $_POST['event'];
         $payment = $_POST['payment'];
         $status = $_POST['status'];

         $consulta = "INSERT INTO payment_waiter (name, date, event, payment, status) VALUES (:nam, :dat, :eve, :pay, :sta)";

         $resultado = $conexion->prepare($consulta);
         $resultado->execute(array(":nam"=>$name,":dat"=>$date, ":eve"=>$event, ":pay"=>$payment, ":sta"=>$status));

         header("Location:sales.php");
      }
   ?>

   <div id="container">
      <?php include 'headerControlador.php';?>

      <!-- NUEVA VENTA -->
      <div class="new_customer_fund hide_font">
         <div class="customer">
            <p class="clouse_client">X</p>

            <div class="center">
               <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                  <table>
                     <tr>
                        <td><input type="text" id="description" name="description" placeholder="Descripcion Del Evento"></td>
                     </tr>
                     <tr>
                        <td>
                           <div class="select">
                              <select id="customer" name="customer">
                                 <?php
                                    $sql = "SELECT * FROM customers";
                                    $reg = $conexion->prepare($sql);
                                    $reg->execute();

                                    while ($res = $reg->fetch(PDO::FETCH_ASSOC)) {
                                       echo "<option value=" . $res['id_customers'] . ">" . $res['name'] . "</option>";
                                    }
                                 ?>
                              </select>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td><input type="date" id="date" name="date"></td>
                     </tr>
                     <tr>
                        <td><input type="time" id="time" name="time"></td>
                     </tr>
                     <tr>
                        <td><input type="number" id="amount" name="amount" placeholder="Cantidad"></td>
                     </tr>
                     <tr>
                        <td><input type="number" id="price" name="price" placeholder="Precio"></td>
                     </tr>
                     <tr>
                        <td> <textarea id="comment" name="comment" rows="4" cols="30" placeholder="Comentario" maxlength="100"></textarea> </td>
                     </tr>
                     <tr>
                        <td colspan="2" style="text-align: center" class="btn_registrar"><input type="submit" name="insertar_venta" value="Registrar"></td>
                     </tr>
                  </table>
               </form>

            </div>
         </div>
      </div>

      <!-- AGREGAR CAMARERO AL EVENTO -->
      <div class="new_waiter_background hide_font">
         <div class="customer">
            <p class="clouse_client_wait">X</p>

            <div class="center">
               <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                  <table>
                     <tr>
                        <td>
                           <div class="select">
                              <select id="name" name="name">
                                 <?php
                                    $sql = "SELECT * FROM team_member";
                                    $reg = $conexion->prepare($sql);
                                    $reg->execute();

                                    while ($res = $reg->fetch(PDO::FETCH_ASSOC)) {
                                       echo "<option>" . $res['name'] . "</option>";
                                    }
                                 ?>
                              </select>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td><input type="datetime-local" id="date" name="date"></td>
                     </tr>
                     <tr>
                        <td>
                           <div class="select">
                              <select id="event" name="event">
                                 <?php
                                    $sql = "SELECT * FROM sales ORDER BY id_sales DESC";
                                    $reg = $conexion->prepare($sql);
                                    $reg->execute();

                                    while ($res = $reg->fetch(PDO::FETCH_ASSOC)) {
                                       echo "<option value=" . $res['id_sales'] . ">" . $res['description'] . "</option>";
                                    }
                                 ?>
                              </select>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td><input type="number" id="payment" name="payment" placeholder="Pago"></td>
                     </tr>
                     <tr>
                        <td>
                           <div class="select">
                              <select id="status" name="status">
                                 <option>Por Pagar</option>
                                 <option>Pagado</option>
                              </select>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td colspan="2" style="text-align: center" class="btn_registrar"><input type="submit" name="insertar_waiter" value="Registrar"></td>
                     </tr>
                  </table>
               </form>

            </div>
         </div>
      </div>

      <div class="container_major">

         <div id="header">
            <h1>Panel / Ventas</h1>

            <div class="usuario">
               <img src="../img/icon/login.png" alt="">
               <h3>Nombre Usuario</h3>
            </div>
         </div>

         <div class="barra">
            <form class="buscar" action="buscar.html" method="get">
               <input type="text" name="buscar" id="buscar" placeholder="Buscar Venta">
            </form>

            <div class="botton">
               <button type="button" class="btn_register add_waiter_to_event">Agregar Camarero Al Evento</button>
            </div>

            <div class="botton">
               <button type="button" class="btn_register" id="new_client">Nueva Venta</button>
            </div>
         </div>

         <div class="customer_list">
            <h2>Lista De Ventas</h2>

            <table>
                  <tr class="cabezera">
                     <th>ID</th>
                     <th>DESCRIPCION</th>
                     <th>CLIENTE</th>
                     <th>FECHA</th>
                     <th>HORA</th>
                     <th>CANTIDAD</th>
                     <th>PRECIO</th>
                     <th>TOTAL</th>
                  </tr>
                  <?php foreach ($registrar as $miembro_equipo): ?>
                     <tr class="cuerpo" title="<?php echo $miembro_equipo->comment ?>">
                        <td class="registros"><?php echo $miembro_equipo->id_sales ?></td>
                        <td class="registros"><?php echo $miembro_equipo->description ?></td>
                        <td class="registros"><?php echo $miembro_equipo->name ?></td>
                        <td class="registros"><?php echo $miembro_equipo->new_date ?></td>
                        <td class="registros"><?php echo $miembro_equipo->time ?></td>
                        <td class="registros"><?php echo $miembro_equipo->amount ?></td>
                        <td class="registros"><?php echo $miembro_equipo->price ?></td>
                        <td class="registros"><?php echo $miembro_equipo->total ?></td>
                        <td>
                           <!-- VER HISOTRIAL DE VENTAS -->
                           <a href="info_event.php?id=<?php echo $miembro_equipo->id_sales?>& des=<?php echo $miembro_equipo->description?>& cus=<?php echo $miembro_equipo->name?>& dat=<?php echo $miembro_equipo->date?>& tim=<?php echo $miembro_equipo->time?>& amo=<?php echo $miembro_equipo->amount?>& pri=<?php echo $miembro_equipo->price?>& com=<?php echo $miembro_equipo->comment?>& tot=<?php echo $miembro_equipo->total?>">
                              <i class="btn_view fa-solid fa-user-pen" id="historial_ventas" name="historial_ventas"></i>
                           </a>

                           <!-- boton de eliminar -->
                           <a href="delete_sales.php?id_sa=<?php echo $miembro_equipo->id_sales ?>"><i class="btn_delete fa-solid fa-user-minus" name="eliminar"></i></a>

                           <!-- BOTON DE ACTUALIZAR -->
                           <a href="update_sales.php?id_sa=<?php echo $miembro_equipo->id_sales ?> & des=<?php echo $miembro_equipo->description ?> & cus=<?php echo $miembro_equipo->customer ?> & dat=<?php echo $miembro_equipo->date ?> & tim=<?php echo $miembro_equipo->time ?> & amo=<?php echo $miembro_equipo->amount ?> & pri=<?php echo $miembro_equipo->price ?> & com=<?php echo $miembro_equipo->comment ?>"><i class="btn_update fa-solid fa-user-gear" name="actualizar"></i></a>
                        </td>
                        <td class="separador">-----------------------------------------</td>
                     </tr>
                  <?php endforeach; ?>
            </table>
         </div>

         <div class="sales_list">
            <h2>Lista De Eventos Por Pagar</h2>

            <table>
               <thead>
                  <tr class="cabezera">
                     <th>ID</th>
                     <th>NOMBRE</th>
                     <th>FECHA</th>
                     <th>EVENTO</th>
                     <th>COBRAR AL EVENTO</th>
                     <th>PAGAR AL CAMARERO</th>
                     <th>GANANCIA</th>
                     <th>STATUS</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($view_waiter as $pay_wai): ?>
                     <tr class="cuerpo">
                        <td><?php $contador++; echo $contador ?></td>
                        <td><?php echo $pay_wai->name ?></td>
                        <td><?php echo $pay_wai->date ?></td>
                        <td><?php echo $pay_wai->description ?></td>
                        <td><?php $priceEvent = $pay_wai->price; echo $pay_wai->price; $toPrice += $priceEvent ?></td>
                        <td><?php $payWainter = $pay_wai->payment; echo $pay_wai->payment; $toPayWainter += $payWainter ?></td>
                        <td><?php $gain = $priceEvent - $payWainter; echo $gain; $toGain += $gain ?></td>
                        <td class="to_pay"><?php echo $pay_wai->status ?></td>
                        <td>
                           <!-- boton de eliminar -->
                           <a href="delete_payable_events.php?id_pe=<?php echo $pay_wai->id_payment_waiter ?>"><i class="btn_delete fa-solid fa-user-minus" name="eliminar"></i></a>

                           <!-- BOTON DE ACTUALIZAR -->
                           <a href="update_payable_events.php?id_pe=<?php echo $pay_wai->id_payment_waiter ?> & nam=<?php echo $pay_wai->name ?> & dat=<?php echo $pay_wai->date ?> & pay=<?php echo $pay_wai->payment ?> & sta=<?php echo $pay_wai->status ?>"><i class="btn_update fa-solid fa-user-gear" name="actualizar"></i></a>
                        </td>
                        <td class="separador">-----------------------------------------</td>
                     </tr>
                  <?php endforeach; ?>
                  <tr>
                     <td><br></td>
                  </tr>
                  <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td class="totals"><?php echo $toPrice; ?></td>
                     <td class="totals"><?php echo $toPayWainter; ?></td>
                     <td class="totals"><?php echo $toGain; ?></td>
                     <td class="totals">TOTAL</td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>

   <script src="../js/registration_forms.js" charset="utf-8"></script>

   <script>
      window.onload = function () {
         const sales = document.getElementById("sales");
         sales.style.borderLeft = '5px solid #81b0be';
         sales.style.backgroundColor = '#192024';
      }
   </script>
</body>
</html>
