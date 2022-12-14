<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Clientes</title>
   <link rel="shortcut icon" href="../img/icon/favicon.png">

   <link rel="stylesheet" href="../css/main.css">
   <link rel="stylesheet" href="../css/major.css">
   <link rel="stylesheet" href="../css/registration_forms.css">
   <link rel="stylesheet" href="../css/customers.css">
   <link rel="stylesheet" href="../css/buttons.css">
   <link rel="stylesheet" href="../css/inputs.css">

   <style>
      .btn_delete, .btn_update, .btn_view {
         width: 20px;
         padding: 10px;
      }
   </style>

   <script src="https://kit.fontawesome.com/bab436a7aa.js" crossorigin="anonymous"></script>
</head>

<body>
   <?php
      include 'conexion.php';

      // ------------- PAGINACION ----------------------
      $size_pagina = 10;

      if (isset($_GET["pagina"])) {
         if ($_GET["pagina"]==1) {
            header("Location:customers.php");
         } else {
            $pagina=$_GET["pagina"];
         }
      } else {
         $pagina = 1;
      }

      $empezar_desde = ($pagina-1)*$size_pagina;

      $sql_total = "SELECT * FROM customers";
      $resultado_paginacion = $conexion->prepare($sql_total);
      $resultado_paginacion->execute();
      $num_filas = $resultado_paginacion->rowCount();
      $total_paginas = ceil($num_filas/$size_pagina);

      // --------------------- CIERRE DE LA PAGINACION ----------------------

      $registrar = $conexion->query("SELECT * FROM customers LIMIT $empezar_desde,$size_pagina")->fetchAll(PDO::FETCH_OBJ);

      if (isset($_POST['insertar'])) {
         $name = $_POST['name'];
         $company = $_POST['company'];
         $email = $_POST['email'];
         $cell_phone = $_POST['cell_phone'];

         $consulta = "INSERT INTO customers (name, company, email, cell_phone) VALUES (:nam, :compa, :ema, :cel)";

         $resultado = $conexion->prepare($consulta);
         $resultado->execute(array(":nam"=>$name,":compa"=>$company, ":ema"=>$email, ":cel"=>$cell_phone));

         header("Location:customers.php");
      }
   ?>

   <div id="container">
      <?php include 'headerControlador.php';?>

      <!-- NUEVO CLIENTE -->
      <div class="new_customer_fund hide_font">
         <div class="customer">
            <p class="clouse_client" onclick="clouse_client()">X</p>

            <div class="center">
               <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                  <table>
                     <tr>
                        <td><input type="text" id="name" name="name" placeholder="Nombre Del Cliente"></td>
                     </tr>
                     <tr>
                        <td><input type="text" id="company" name="company" placeholder="Nombre De la Compa??ia"></td>

                     </tr>
                     <tr>
                        <td><input type="email" id="email" name="email" placeholder="Email"></td>
                     </tr>
                     <tr>
                        <td><input type="text" id="cell_phone" name="cell_phone" placeholder="Numero Celular"></td>
                     </tr>
                     <tr>
                        <td colspan="2" style="text-align: center" class="btn_registrar"><input type="submit" name="insertar" value="Registrar"></td>
                     </tr>
                  </table>
               </form>

            </div>
         </div>
      </div>

      <div class="container_major container_customer">
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

            <div class="botton">
               <button type="button" name="new_client" id="new_client" class="btn_register" onclick="new_client()">Nuevo Cliente</button>
               <button type="button" name="config_cliente" id="config_cliente" class="neutral">...</button>
            </div>
         </div>

         <div class="customer_list">
            <h2>Lista de Clientes</h2>

            <table>
               <tr class="cabezera">
                  <th>ID</th>
                  <th>NOMBRE</th>
                  <th>COMPA??IA</th>
                  <th>CORREO</th>
                  <th>TELEFONO</th>
               </tr>
               <?php foreach ($registrar as $miembro_equipo): ?>
                  <tr class="cuerpo">
                     <td><?php echo $miembro_equipo->id_customers ?></td>
                     <td><?php echo $miembro_equipo->name ?></td>
                     <td><?php echo $miembro_equipo->company ?></td>
                     <td><i class="fa-solid fa-envelope"></i><a href="mailto:<?php echo $miembro_equipo->email ?>"><?php echo $miembro_equipo->email ?></a> </td>
                     <td><i class="fa-solid fa-phone"></i><a href="https://api.whatsapp.com/send?phone=<?php echo $miembro_equipo->cell_phone ?>" target="_blank"><?php echo $miembro_equipo->cell_phone ?></td>
                     <td>
                        <!-- VER HISOTRIAL DE VENTAS -->
                        <i class="btn_view fa-solid fa-user-pen" id="historial_ventas" name="historial_ventas"></i>

                        <!-- boton de eliminar -->
                        <a href="delete_customer.php?id_cus=<?php echo $miembro_equipo->id_customers ?>"><i class="btn_delete fa-solid fa-user-minus" name="eliminar"></i></a>

                        <!-- BOTON DE ACTUALIZAR -->
                        <a href="update_customer.php?id_cus=<?php echo $miembro_equipo->id_customers ?> & nam=<?php echo $miembro_equipo->name ?> & compa=<?php echo $miembro_equipo->company ?> & ema=<?php echo $miembro_equipo->email ?> & cel=<?php echo $miembro_equipo->cell_phone ?>"><i class="btn_update fa-solid fa-user-gear" name="actualizar"></i></a>
                     </td>
                     <td class="separador">-----------------------------------------</td>
                  </tr>
               <?php endforeach; ?>
            </table>
         </div>
      </div>


   </div>

   <div class="fondo_ver_info hide_font">
      <div class="clientes">
         <p id="cerrar_info" onclick="cerrar_info()">X</p>

         <div class="center">
            <form class="acualizar_cliente" action="index.html" method="post">
               <table>
                  <tr>
                     <td>ID</td>
                     <td>01</td>
                  </tr>
                  <tr>
                     <td>NOMBRE</td>
                     <td>Jordana</td>

                  </tr>
                  <tr>
                     <td>COMPA??IA</td>
                     <td>Planning Studios</td>

                  </tr>
                  <tr>
                     <td>CORREO</td>
                     <td>planningstudiosjd@gmail.com</td>
                  </tr>
                  <tr>
                     <td>TELEFONO</td>
                     <td><i class="fa-solid fa-phone"></i><a href="https://api.whatsapp.com/send?phone=18296697552" target="_blank">(829) 669-7552</a></td>
                  </tr>
                  <tr>
                     <td colspan="2" style="text-align: center;"><input type="submit" id="actualizar_cliente" name="actualizar_cliente" value="Actualizar"></td>
                  </tr>
               </table>
            </form>
         </div>
      </div>
   </div>

   <script src="../js/registration_forms.js" charset="utf-8"></script>

   <script>
      window.onload = function () {
         const customers = document.getElementById("customers");
         customers.style.borderLeft = '5px solid #81b0be';
         customers.style.backgroundColor = '#192024';
      }

   </script>
</body>
</html>
