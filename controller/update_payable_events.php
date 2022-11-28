<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Actualizar Eventos Por Pagar</title>
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
         $id = $_GET['id_pe'];
         $nam = $_GET['nam'];
         $dat = $_GET['dat'];
         $pay = $_GET['pay'];
         $sta = $_GET['sta'];
      } else {
         $id = $_POST['id_pe'];
         $nam = $_POST['nam'];
         $dat = $_POST['dat'];
         $pay = $_POST['pay'];
         $sta = $_POST['sta'];

         $consulta = "UPDATE payment_waiter SET name = :miNam, date = :miDat, payment = :miPay, status = :miSta WHERE id_payment_waiter = :miId";

         $resultado = $conexion->prepare($consulta);
         $resultado->execute(array(":miId"=>$id, ":miNam"=>$nam, ":miDat"=>$dat, ":miPay"=>$pay, ":miSta"=>$sta));

         header ("Location:sales.php");
      }
   ?>

   <div id="container">
      <?php include 'headerControlador.php';?>

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
               <input type="text" name="buscar" id="buscar" placeholder="Buscar Cliente">
            </form>
         </div>

         <div class="customer_list">
            <h2>Actualizar Eventos Por Pagar</h2>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/multipart/form-data">
               <table>
                  <thead>
                     <th>ID</th>
                     <th>NOMBRE</th>
                     <th>FECHA</th>
                     <th>PAGAR AL CAMARERO</th>
                     <th>STATUS</th>
                  </thead>
                  <tbody>
                     <tr>
                        <td><label for="id_pe"></label><input type="hidden" name="id_pe" id="id_pe" value="<?php echo $id ?>"></td>
                        <td>
                           <div class="select">
                              <select id="nam" name="nam">
                                 <option><?php echo $nam ?></option>
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
                        <td><label for="dat"></label><input type="text" name="dat" id="dat" value="<?php echo $dat ?>"></td>
                        <td><label for="pay"></label><input type="text" name="pay" id="pay" value="<?php echo $pay ?>"></td>
                        <td>
                           <div class="select">
                              <select id="sta" name="sta">
                                 <option value="<?php echo $sta?>"><?php echo $sta?></option>
                                 <option>Por Pagar</option>
                                 <option>Pagado</option>
                              </select>
                           </div>
                        </td>
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
