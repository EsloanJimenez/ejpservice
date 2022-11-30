<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Inventario</title>
   <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, maximum-scale=3, minimum-scale=1">
   <link rel="shortcut icon" href="../img/icon/favicon.png">

   <link rel="stylesheet" href="../css/main.css">
   <link rel="stylesheet" href="../css/major.css">
   <link rel="stylesheet" href="../css/sales.css">
   <link rel="stylesheet" href="../css/buttons.css">
   <link rel="stylesheet" href="../css/inputs.css">

   <style media="screen">
      @media screen and (max-width: 768px) {
         table {
            display: flex;
            flex-grow: wrap;
            flex-direction: column;
         }
         table thead {background-color: rgb(98, 205, 59)}
         table tbody {background-color: rgb(59, 25, 170)}
      }
   </style>

   <script src="https://kit.fontawesome.com/bab436a7aa.js" crossorigin="anonymous"></script>
</head>

<body>
   <?php
      include 'conexion.php';

      $pay_wai = 0;
      $contador = 0;

      $total_sales = $conexion->query("SELECT SUM(amount * price) AS total_sales FROM sales")->fetchAll(PDO::FETCH_OBJ);

      $total_payment_waiter = $conexion->query("SELECT SUM(payment) AS total_pay_waiter FROM payment_waiter")->fetchAll(PDO::FETCH_OBJ);

      $total_bill = $conexion->query("SELECT SUM(amount*price) AS total_bill FROM bill")->fetchAll(PDO::FETCH_OBJ);
   ?>

   <div id="container">
      <?php include 'headerControlador.php';?>

      <div class="container_major">
         <div id="header">
            <h1>Panel / Inventario</h1>

            <div class="usuario">
               <img src="../img/icon/login.png" alt="">
               <h3>Nombre Usuario</h3>
            </div>
         </div>

         <div class="barra">
            <form class="buscar" action="buscar.html" method="get">
               <input type="text" name="buscar" id="buscar" placeholder="Buscar Inventario">
            </form>
         </div>

         <div class="sales_list">
            <h2>Total Ventas</h2>

            <table id="info_event">
               <thead>
                  <tr id="cabezera">
                     <th>TOTAL VENTAS</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($total_sales as $view_total_sales):?>
                     <tr>
                        <td>
                           <b>
                              <?php
                                 $tot_ven = $view_total_sales->total_sales;
                                 echo $view_total_sales->total_sales;
                              ?>
                           </b>
                        </td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>

         <div class="sales_list">
            <h2>Total Pago Camareros</h2>

            <table id="attended">
               <thead>
                  <tr id="cabezera">
                     <th>TOTAL PAGO CAMAREROS</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach($total_payment_waiter as $view_total_payment_waiter): ?>
                     <tr>
                        <td>
                           <b>
                              <?php
                                 $pay_waiter = $view_total_payment_waiter->total_pay_waiter;
                                 echo $view_total_payment_waiter->total_pay_waiter;
                                 //$pay_wai += $pay_waiter;
                              ?>
                           </b>
                        </td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>

         <div class="sales_list">
            <h2>Total Gasto</h2>

            <table id="info_event">
               <thead>
                  <tr id="cabezera">
                     <th>TOTAL GASTOS</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($total_bill as $view_total_bill):?>
                     <tr>
                        <td>
                           <b>
                              <?php
                                 $tot_bill = $view_total_bill->total_bill;
                                 echo $view_total_bill->total_bill;
                              ?>
                           </b>
                        </td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>

         <div class="sales_list">
            <h2>Total Ganancia</h2>

            <table id="info_event">
               <thead>
                  <tr id="cabezera">
                     <th>ACTIVOS</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>
                        <b>
                           <?php
                              $total_gain = $tot_ven - $pay_waiter - $tot_bill;
                              echo $total_gain;
                           ?>
                        </b>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>

   <script>
      window.onload = function () {
         const inventary = document.getElementById("inventary");
         inventary.style.borderLeft = '5px solid #81b0be';
         inventary.style.backgroundColor = '#192024';
      }
   </script>
</body>

</html>
