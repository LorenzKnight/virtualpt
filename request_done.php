<?php require_once('connections/conexion.php');?>
<?php
$variable_Consulta = "0";
if (isset($VARIABLE)) {
  $variable_Consulta = $VARIABLE;
}

$query_DatosConsulta = sprintf("SELECT * FROM users WHERE id_user=%s", GetSQLValueString($_SESSION['vpt_UserId'], "int"));
$DatosConsulta = mysqli_query($con, $query_DatosConsulta) or die(mysqli_error($con));
$row_DatosConsulta = mysqli_fetch_assoc($DatosConsulta);
$totalRows_DatosConsulta = mysqli_num_rows($DatosConsulta);
?>
<?php
$query_DatosCurrent = sprintf("SELECT * FROM usr_current_status WHERE id_user=%s", GetSQLValueString($_SESSION['vpt_UserId'], "int"));
$DatosCurrent = mysqli_query($con, $query_DatosCurrent) or die(mysqli_error($con));
$row_DatosCurrent = mysqli_fetch_assoc($DatosCurrent);
$totalRows_DatosCurrent = mysqli_num_rows($DatosCurrent);
?>
<?php
$query_DatosGoal = sprintf("SELECT * FROM usr_goals WHERE id_user=%s ORDER BY id_goals DESC", GetSQLValueString($_SESSION['vpt_UserId'], "int"));
$DatosGoal = mysqli_query($con, $query_DatosGoal) or die(mysqli_error($con));
$row_DatosGoal = mysqli_fetch_assoc($DatosGoal);
$totalRows_DatosGoal = mysqli_num_rows($DatosGoal);
?>
<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formrequest")) {
  $year = date("Y");
	$month = date("m");
	$day = date("d");
  $insertSQL = sprintf("INSERT INTO request(id_user, date, year, month, day, time, usr_height, usr_weight, usr_biceps, usr_chest, usr_waist, usr_hips, usr_thigh, usr_fat, usr_weight_goal, usr_biceps_goal, usr_chest_goal, usr_waist_goal, usr_hips_goal, usr_thigh_goal, usr_fat_goal, id_pt) VALUES (%s, NOW(), $year, $month, $day, NOW(), %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                        GetSQLValueString($_POST["id_user"], "int"),
                        GetSQLValueString($_POST["usr_height"], "int"),                     
                        GetSQLValueString($_POST["usr_weight"], "int"),
                        GetSQLValueString($_POST["usr_biceps"], "int"),
                        GetSQLValueString($_POST["usr_chest"], "int"),
                        GetSQLValueString($_POST["usr_waist"], "int"),
                        GetSQLValueString($_POST["usr_hips"], "int"),
                        GetSQLValueString($_POST["usr_thigh"], "int"),
                        GetSQLValueString($_POST["usr_fat"], "int"),
                                             
                        GetSQLValueString($_POST["usr_weight_goal"], "int"),
                        GetSQLValueString($_POST["usr_biceps_goal"], "int"),
                        GetSQLValueString($_POST["usr_chest_goal"], "int"),
                        GetSQLValueString($_POST["usr_waist_goal"], "int"),
                        GetSQLValueString($_POST["usr_hips_goal"], "int"),
                        GetSQLValueString($_POST["usr_thigh_goal"], "int"),
                        GetSQLValueString($_POST["usr_fat_goal"], "int"),
                        GetSQLValueString($_POST["id_pt"], "int"));

  
  $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));


  $insertGoTo = "welcome.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Virtual PT</title>

  <?php include("inc/header.php"); ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include("inc/menu.php"); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <?php include("inc/topbar.php"); ?>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
        
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!--<h1 class="h3 mb-0 text-gray-800">Request a new program </h1>-->
        </div>
          <?php
            $yearold = date("Y") - $row_DatosConsulta['year'];
          ?>
          <!-- Content Row -->
          <div class="row">
            <div class="done_msn">
              <h1>Done!</h1>
              <p>Your request is now ready to process it.</p>
              <a href="inicio.php">Ok</a>
            </div> 
          </div>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <?php include("inc/footer.php"); ?>

</body>

</html>
<?php
//AÑADIR AL FINAL DE LA PÁGINA
mysqli_free_result($DatosConsulta);
?>