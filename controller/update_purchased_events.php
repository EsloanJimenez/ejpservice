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
      .contenedor_principal {
         padding-top: 70px;
      }
   </style>

   <script src="https://kit.fontawesome.com/bab436a7aa.js" crossorigin="anonymous"></script>
</head>

<body>
   <?php
      include 'conexion.php';

      if (!isset($_POST['actualizar'])) {
         $id = $_GET['id_pur_eve'];
         $te_mem = $_GET['te_mem'];
         $dat = $_GET['dat'];
         $tim = $_GET['tim'];
         $sta = $_GET['sta'];
      } else {
         $id = $_POST['id_pur_eve'];
         $te_mem = $_POST['te_mem'];
         $dat = $_POST['dat'];
         $tim = $_POST['tim'];
         $sta = $_POST['sta'];

         $consulta = "UPDATE purchased_events SET team_member = :miTeamMem, date = :miDate, time = :miTime, status = :miStatus WHERE id_purchased_events = :miId";

         $resultado = $conexion->prepare($consulta);
         $resultado->execute(array(":miId"=>$id, ":miTeamMem"=>$te_mem, ":miDate"=>$dat, ":miTime"=>$tim, ":miStatus"=>$sta));

         header ("Location:purchased_events.php");
      }
   ?>

   <div id="container">
      <?php include 'headerControlador.php';?>

      <div class="container_major">
         <div id="header">
            <h1>Panel / Evento Comprado</h1>

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
            <h2>Actualizar Evento Comprado</h2>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/multipart/form-data">
               <table id="actualizar_cliente">
                  <thead>
                     <tr id="cabezera">
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>FECHA</th>
                        <th>TIME</th>
                        <th>STATUS</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td><label for="id_pur_eve"></label><input name="id_pur_eve" id="id_pur_eve" value="<?php echo $id?>"></td>
                        <td><label for="te_mem"></label><input type="text" name="te_mem" id="te_mem" value="<?php echo $te_mem?>"></td>
                        <td><label for="dat"></label><input type="text" name="dat" id="dat" value="<?php echo $dat?>"></td>
                        <td><label for="tim"></label><input type="text" name="tim" id="tim" value="<?php echo $tim?>"></td>
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
         const purchased_events = document.getElementById("purchased_events");
         purchased_events.style.borderLeft = '5px solid #81b0be';
         purchased_events.style.backgroundColor = '#192024';
      }
   </script>
</body>

</html>
