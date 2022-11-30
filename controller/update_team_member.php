<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Actualizar Miembro De Equipo</title>
   <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, maximum-scale=3, minimum-scale=1">
   <link rel="shortcut icon" href="../img/icon/favicon.png">

   <link rel="stylesheet" href="../css/main.css">
   <link rel="stylesheet" href="../css/major.css">
   <link rel="stylesheet" href="../css/window.css">
   <link rel="stylesheet" href="../css/customers.css">
   <link rel="stylesheet" href="../css/buttons.css">
   <link rel="stylesheet" href="../css/inputs.css">
   <link rel="stylesheet" href="../css/register_team_member.css">

   <script src="https://kit.fontawesome.com/bab436a7aa.js" crossorigin="anonymous"></script>
</head>

<body>
   <?php
      include 'conexion.php';

      $idr = $_REQUEST['id'];

      $sql = "SELECT * FROM team_member WHERE id_team_member = :idr";
      $resu = $conexion->prepare($sql);
      $resu->execute(array(':idr'=>$idr));

      while ($fila = $resu->fetch(PDO::FETCH_ASSOC)) {
         $photo_mde = $fila['photo'];
      }

      if (!isset($_POST['actualizar'])) {
         $id = $_GET['id'];
         $nom = $_GET['nom'];
         $ced = $_GET['ced'];
         $cel = $_GET['cel'];
         $sex = $_GET['sex'];
         $gru = $_GET['gru'];
         $nom_ban = $_GET['nom_ban'];
         $ti_ban = $_GET['ti_ban'];
         $num_cue = $_GET['num_cue'];
      } else {
         $id = $_POST['id'];
         $nom = $_POST['nom'];
         $ced = $_POST['ced'];
         $cel = $_POST['cel'];
         $sex = $_POST['sex'];
         $gru = $_POST['gru'];
         $nom_ban = $_POST['nom_ban'];
         $ti_ban = $_POST['ti_ban'];
         $num_cue = $_POST['num_cue'];

         $consulta = "UPDATE team_member SET name = :miNom, identification_card = :miCed, sex = :miSexo, cell_phone = :miCel, cluster = :miGrup, bank_name = :miNomBan, bank_account_type = :miTipBan, account_number = :miNumBan  WHERE id_team_member = :miId";

         $resultado = $conexion->prepare($consulta);
         $resultado->execute(array(":miId"=>$id, ":miNom"=>$nom, ":miCed"=>$ced, ":miSexo"=>$sex, ":miCel"=>$cel, ":miGrup"=>$gru, ":miNomBan"=>$nom_ban, ":miTipBan"=>$ti_ban, ":miNumBan"=>$num_cue));

            header ("Location:register_team_member.php");
         }
   ?>

   <div id="container">
      <?php include 'headerControlador.php';?>

      <div class="container_major">
         <div id="header">
            <h1>Panel / Miembro De Equipo</h1>

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
            <h2>Actualizar Miembro De Equipo</h2>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/multipart/form-data">
               <table>
                  <thead>
                     <th>ID</th>
                     <th>FOTO</th>
                     <th>NOMBRE</th>
                     <th>CEDULA</th>
                     <th># CELULAR</th>
                     <th>SEXO</th>
                     <th>GRUPO</th>
                     <th>NOMBRE BANCO</th>
                     <th>TIPO DE CUENTA</th>
                     <th>NUMERO DE CUENTA</th>
                  </thead>
                  <tbody>
                     <tr>
                        <td><label for="id"></label><input type="hidden" name="id" id="id" value="<?php echo $id ?>"></td>
                        <td><img src="/ejpservice/img/team_member/<?php echo $photo_mde; ?>" width="150" height="150"><input type="file" name="foto" id="foto"></td>
                        <td><label for="nom"></label><input type="text" name="nom" id="nom" value="<?php echo $nom ?>"></td>
                        <td><label for="ced"></label><input type="text" name="ced" id="ced" value="<?php echo $ced ?>"></td>
                        <td><label for="cel"></label><input type="text" name="cel" id="cel" value="<?php echo $cel ?>"></td>
                        <td><label for="sex">
                           <div class="select">
                              <select id="sex" name="sex">
                                 <option><?php echo $sex ?></option>
                                 <option>Masculino</option>
                                 <option>Femenina</option>
                              </select>
                           </div>
                        </td>
                        <td>
                           <div class="select">
                              <select id="gru" name="gru">
                                 <option><?php echo $gru ?></option>
                                 <option>Grupo A</option>
                                 <option>Grupo B</option>
                                 <option>Grupo C</option>
                                 <option>Grupo D</option>
                                 <option>Arroye</option>
                              </select>
                           </div>
                        </td>
                        <td>
                           <div class="select">
                              <select id="nom_ban" name="nom_ban">
                                 <option><?php echo $nom_ban ?></option>
                                 <option>No Tiene</option>
                                 <option>BHD Leon</option>
                                 <option>Banreservas</option>
                                 <option>Popular</option>
                                 <option>Asociacion Popular</option>
                                 <option>Promerica</option>
                              </select>
                           </div>
                        </td>
                        <td>
                           <div class="select">
                              <select id="ti_ban" name="ti_ban">
                                 <option><?php echo $ti_ban ?></option>
                                 <option>No Tiene</option>
                                 <option>Ahorro</option>
                                 <option>Corriente</option>
                              </select>
                           </div>
                        </td>
                        <td><label for="num_cue"></label><input type="text" name="num_cue" id="num_cue" value="<?php echo $num_cue ?>"></td>
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
         const register_team_member = document.getElementById("register_team_member");
         register_team_member.style.borderLeft = '5px solid #81b0be';
         register_team_member.style.backgroundColor = '#192024';
      }
   </script>

</body>

</html>
