<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Registrar Miembro Equipo</title>
   <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, maximum-scale=3, minimum-scale=1">
   <link rel="shortcut icon" href="../img/icon/favicon.png">

   <link rel="stylesheet" href="../css/main.css">
   <link rel="stylesheet" href="../css/major.css">
   <link rel="stylesheet" href="../css/window.css">
   <link rel="stylesheet" href="../css/customers.css">
   <link rel="stylesheet" href="../css/buttons.css">
   <link rel="stylesheet" href="../css/inputs.css">
   <link rel="stylesheet" href="../css/register_team_member.css">

   <style>
      .btn_delete, .btn_update {
         width: 10px;
      }
      .hide_font {
         display: none;
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
            header("Location:register_team_member.php");
         } else {
            $pagina=$_GET["pagina"];
         }
      } else {
         $pagina = 1;
      }

      $empezar_desde = ($pagina-1)*$size_pagina;

      $sql_total = "SELECT * FROM team_member";
      $resultado_paginacion = $conexion->prepare($sql_total);
      $resultado_paginacion->execute();
      $num_filas = $resultado_paginacion->rowCount();
      $total_paginas = ceil($num_filas/$size_pagina);

      // --------------------- CIERRE DE LA PAGINACION ----------------------

      $registrar = $conexion->query("SELECT * FROM team_member LIMIT $empezar_desde,$size_pagina")->fetchAll(PDO::FETCH_OBJ);

      if (isset($_POST['insertar'])) {
         $name = $_POST['name'];
         $identification_card = $_POST['identification_card'];
         $cell_phone = $_POST['cell_phone'];
         $sex = $_POST['sex'];
         $cluster = $_POST['cluster'];
         $bank_name = $_POST['bank_name'];
         $bank_account_type = $_POST['bank_account_type'];
         $account_number = $_POST['account_number'];

         //CODIGO PARA MOSTRAR LA FOTO (POR SI MAS ADELANTE QUIERO AGREGARLA)

         $nam_photo = $_FILES['photo'] ['name'];
         $tipo_foto = $_FILES['photo']['type'];
         $size_foto = $_FILES['photo']['size'];

         if ($_FILES['photo']['size']<=5188608) {

            if ($tipo_foto == 'image/jpeg' || $tipo_foto == 'image/jpg' || $tipo_foto == 'image/png' || $tipo_foto == 'image/gif') {

               $ruta = $_SERVER['DOCUMENT_ROOT'] . '/ejpservice/img/team_member/';

               $destino = move_uploaded_file($_FILES['photo']['tmp_name'], $ruta . $nam_photo);

            } else {
               echo "Solo se pueden incluir imagenes JPEG, JPG, PNG, GIF.";
            }
         } else {
            echo "</p>El tamaño maximo de la imagen es: 5mb, escoja una imagen mas pequeña</p>";
         }

         $consulta = "INSERT INTO team_member (name, photo, identification_card, cell_phone, sex, cluster, bank_name, bank_account_type, account_number) VALUES (:nam, :photo, :ide, :cel, :sex, :clu, :nam_ban, :ti_ban, :acc_num)";

         $resultado = $conexion->prepare($consulta);
         $resultado->execute(array(":nam"=>$name,":photo"=>$nam_photo, ":ide"=>$identification_card, ":cel"=>$cell_phone, ":sex"=>$sex, ":clu"=>$cluster, ":nam_ban"=>$bank_name, ":ti_ban"=>$bank_account_type, ":acc_num"=>$account_number));

         header("Location:register_team_member.php");
      }
   ?>

   <div id="container">
      <?php include 'headerControlador.php';?>

      <!-- NUEVO MIEMBRO DE EQUIPO -->
      <div class="new_customer_fund hide_font">
         <div class="customer">
            <p class="clouse_client">X</p>

            <div class="center">
               <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                  <table>
                     <tr>
                        <td><input type="file" id="subir_foto" name="photo"></td>
                     </tr>
                     <tr>
                        <td><input type="text" id="name" name="name" placeholder="Nombre Completo"></td>
                     </tr>
                     <tr>
                        <td><input type="text" id="identification_card" name="identification_card" placeholder="Cedula"></td>
                     </tr>
                     <tr>
                        <td><input type="tel" id="cell_phone" name="cell_phone" placeholder="Celular"></td>
                     </tr>
                     <tr>
                        <td>
                           <div class="select">
                              <select id="sex" name="sex">
                                 <option>Masculino</option>
                                 <option>Femenina</option>
                              </select>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <div class="select">
                              <select id="cluster" name="cluster">
                                 <option>Grupo A</option>
                                 <option>Grupo B</option>
                                 <option>Grupo C</option>
                                 <option>Grupo D</option>
                                 <option>Arroye</option>
                              </select>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <div class="select">
                              <select id="bank_name" name="bank_name">
                                 <option>No Tiene</option>
                                 <option>BHD Leon</option>
                                 <option>Banreservas</option>
                                 <option>Popular</option>
                                 <option>Asociacion Popular</option>
                                 <option>Promerica</option>
                              </select>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <div class="select">
                              <select id="bank_account_type" name="bank_account_type">
                                 <option>No Tiene</option>
                                 <option>Ahorro</option>
                                 <option>Corriente</option>
                              </select>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td><input type="text" id="account_number" name="account_number" placeholder="Numero De Cuenta"></td>
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
            <h1>Panel / Registrar Miembro De Equipo</h1>

            <div class="usuario">
               <img src="../img/icon/login.png" alt="">
               <h3>Nombre Usuario</h3>
            </div>
         </div>

         <div class="barra">
            <form class="buscar" action="buscar.html" method="get">
               <input type="text" name="buscar" id="buscar" placeholder="Buscar Miembro De Equipo">
            </form>

            <div class="botton">
               <button type="button" name="new_client" id="new_client" class="btn_register"><i class="fa-solid fa-user-plus"></i></button>
            </div>
         </div>

         <div class="customer_list">
            <h2>Lista De Miembro De Equipo</h2>

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

               <tr id="cabezera">
                  <th>ID</th>
                  <th>FOTO</th>
                  <th>NOMBRE</th>
                  <th>CEDULA</th>
                  <th># CELULAR</th>
                  <th>SEXO</th>
                  <th>GRUPO</th>
                  <th>NOMBRE DE BANCO</th>
                  <th>TIPO DE CUENTA</th>
                  <th>NUMERO DE CUENTA</th>
               </tr>
               <?php foreach ($registrar as $miembro_equipo): ?>
                  <tr>
                     <td><?php echo $miembro_equipo->id_team_member ?></td>
                     <td><?php echo '<img src="/ejpservice/img/team_member/' . $miembro_equipo->photo . '">' ?></td>
                     <td><?php echo $miembro_equipo->name ?></td>
                     <td><?php echo $miembro_equipo->identification_card ?></td>
                     <td><i class="fa-solid fa-phone"></i><a target="_blank" href="https://api.whatsapp.com/send?phone=1<?php echo $miembro_equipo->cell_phone ?>"><?php echo $miembro_equipo->cell_phone ?></a></td>
                     <td><?php echo $miembro_equipo->sex ?></td>
                     <td><?php echo $miembro_equipo->cluster ?></td>
                     <td><?php echo $miembro_equipo->bank_name ?></td>
                     <td><?php echo $miembro_equipo->bank_account_type ?></td>
                     <td><?php echo $miembro_equipo->account_number ?></td>

                     <td>
                        <!-- boton de eliminar -->
                        <a href="delete_team_member.php?id=<?php echo $miembro_equipo->id_team_member ?>"><i class="btn_delete fa-solid fa-user-minus" name="eliminar"></i></a>

                        <!-- BOTON DE ACTUALIZAR -->
                        <a href="update_team_member.php?id=<?php echo $miembro_equipo->id_team_member ?> & nom=<?php echo $miembro_equipo->name ?> & photo=<?php echo $miembro_equipo->photo ?> & ced=<?php echo $miembro_equipo->identification_card ?> & cel=<?php echo $miembro_equipo->cell_phone ?> & sex=<?php echo $miembro_equipo->sex ?> & gru=<?php echo $miembro_equipo->cluster ?> & nom_ban=<?php echo $miembro_equipo->bank_name ?> & ti_ban=<?php echo $miembro_equipo->bank_account_type ?> & num_cue=<?php echo $miembro_equipo->account_number ?>"><i class="btn_update fa-solid fa-user-gear" name="actualizar"></i></a>
                     </td>
                     <td class="separador">-----------------------------------------</td>
                  </tr>
               <?php endforeach; ?>
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
         const register_team_member = document.getElementById("register_team_member");
         register_team_member.style.borderLeft = '5px solid #81b0be';
         register_team_member.style.backgroundColor = '#192024';
      }
   </script>
</body>
</html>
