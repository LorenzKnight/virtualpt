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
            <h1 class="h3 mb-0 text-gray-800">Program</h1>
          </div>
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <a href="program_add.php" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Request a Program</span>
                  </a>
          </div>
          <?php
            $yearold = date("Y") - $row_DatosConsulta['year'];
          ?>
          <div class="row">
          
            <?php include("inc/usr_status_card.php"); ?>
            <?php include("inc/usr_goal_card.php"); ?>
            <?php include("inc/usr_program_card.php") ?>
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