<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Panel</title>
   <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, maximum-scale=3, minimum-scale=1">

   <link rel="shortcut icon" href="../img/icon/favicon.png">
   <link rel="stylesheet" href="../css/major.css">

   <script src="https://kit.fontawesome.com/bab436a7aa.js" crossorigin="anonymous"></script>
</head>

<body>
   <div id="container">
      <?php
         session_start();
         if (!isset($_SESSION['usuario'])) {
            header ("location:login.php");
         }

         include 'conexion.php';

         include 'headerControlador.php';

         //CLIENTES
         $sql_nom = "SELECT id_customers FROM customers ORDER BY id_customers DESC";
         $reg = $conexion->prepare($sql_nom);
         $reg->execute();

         $res = $reg->fetch(PDO::FETCH_ASSOC);

         //EVENTOS REALIZADOS
         $sql_ven = "SELECT count(id_sales) AS id_sal FROM sales";
         $reg_ven = $conexion->prepare($sql_ven);
         $reg_ven->execute();

         $res_ven = $reg_ven->fetch(PDO::FETCH_ASSOC);

         //MIEMBROS DE EQUIPO
         $sql_mde = "SELECT count(id_team_member) AS id_team FROM team_member";
         $reg_mde = $conexion->prepare($sql_mde);
         $reg_mde->execute();

         $res_mde = $reg_mde->fetch(PDO::FETCH_ASSOC);
      ?>

      <div class="container_major">
         <div id="header">
            <h1>Panel</h1>

            <div class="user">
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

         <div class="totales">
            <a href="sales.php">
               <div class="total">
                  <div class="titulo">
                     <h3><?php echo $res_ven['id_sal'];?></h3>
                     <h3>Total Eventos</h3>
                  </div>

                  <div class="icono ven">
                     <i class="fa-sharp fa-solid fa-handshake"></i>
                  </div>
               </div>
            </a>

            <a href="Inventory.php">
               <div class="total">
                  <div class="titulo">
                     <h3>5</h3>
                     <h3>Total Inventario</h3>
                  </div>

                  <div class="icono inv">
                     <i class="fa-sharp fa-solid fa-inbox"></i>
                  </div>
               </div>
            </a>

            <a href="customers.php">
               <div class="total">
                  <div class="titulo">
                     <h3><?php echo $res['id_customers'];?></h3>
                     <h3>Total Cliente</h3>
                  </div>

                  <div class="icono cli">
                     <i class="fa-solid fa-user"></i>
                  </div>
               </div>
            </a>

            <a href="register_team_member.php">
               <div class="total">
                  <div class="titulo">
                     <h3><?php echo $res_mde['id_team'];?></h3>
                     <h3>Miembros De Equipo</h3>
                  </div>

                  <div class="icono cli">
                     <i class="fa-solid fa-restroom"></i>
                  </div>
               </div>
            </a>
         </div>
      </div>
   </div>

   <script>
      window.onload = function () {
         const panel = document.getElementById("panel");
         panel.style.borderLeft = '5px solid #81b0be';
         panel.style.backgroundColor = '#192024';
      }
   </script>

</body>

</html>
