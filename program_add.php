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
$query_DatosPt = sprintf("SELECT * FROM users");
$DatosPt = mysqli_query($con, $query_DatosPt) or die(mysqli_error($con));
$row_DatosPt = mysqli_fetch_assoc($DatosPt);
$totalRows_DatosPt = mysqli_num_rows($DatosPt);
?>
<?php
$query_DatosCurrent = sprintf("SELECT * FROM usr_current_status WHERE id_user=%s", GetSQLValueString($_SESSION['vpt_UserId'], "int"));
$DatosCurrent = mysqli_query($con, $query_DatosCurrent) or die(mysqli_error($con));
$row_DatosCurrent = mysqli_fetch_assoc($DatosCurrent);
$totalRows_DatosCurrent = mysqli_num_rows($DatosCurrent);
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
  $insertSQL = sprintf("INSERT INTO usr_goals(id_user, date, year, month, day, time, usr_weight_goal, usr_biceps_goal, usr_chest_goal, usr_waist_goal, usr_hips_goal, usr_thigh_goal, usr_fat_goal, id_pt) VALUES (%s, NOW(), $year, $month, $day, NOW(), %s, %s, %s, %s, %s, %s, %s, %s)",
                        GetSQLValueString($_POST["id_user"], "int"),                      
                        GetSQLValueString($_POST["usr_weight_goal"], "int"),
                        GetSQLValueString($_POST["usr_biceps_goal"], "int"),
                        GetSQLValueString($_POST["usr_chest_goal"], "int"),
                        GetSQLValueString($_POST["usr_waist_goal"], "int"),
                        GetSQLValueString($_POST["usr_hips_goal"], "int"),
                        GetSQLValueString($_POST["usr_thigh_goal"], "int"),
                        GetSQLValueString($_POST["usr_fat_goal"], "int"),
                        GetSQLValueString($_POST["id_pt"], "int"));

  
  $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));


  $insertGoTo = "send_request.php";
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
            <h1 class="h3 mb-0 text-gray-800">Request a new program </h1>
          </div>
          


          <?php
            $yearold = date("Y") - $row_DatosConsulta['year'];
          ?>
          <!-- Content Row -->
          <div class="row">
            <div class="prog_forms_2" style="height: 640px;">
              <div class="prog_forms_cab">
                <div class="profil_cilcle">
                </div>
                <div class="priv_info">
                  <?php echo $row_DatosConsulta['name']; ?> <?php echo $row_DatosConsulta['surname']; ?>
                  <br><?php echo $yearold; ?> Year old
                  <br>Height: <?php echo $row_DatosCurrent['usr_height']; ?> cm
                </div>
                   
              </div>
              <div class="prog_forms_parts_2" style="margin-top: -40px;">
              <form class="user" action="program_add.php" method="post" name="formrequest" id="formrequest">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td style="text-decoration: underline;" width="50%" colspan="2" valign="middle" align="center">Current</td>
                      <td style="text-decoration: underline; border-left: 1px solid #999;" width="50%" colspan="2" valign="middle" align="center">Goal</td>
                    </tr>
                    <tr>
                      <td width="25%" valign="middle" align="right">Weight:&nbsp;</td>
                      <td width="25%" valign="middle" align="left">&nbsp;<?php echo $row_DatosCurrent['usr_weight']; ?> kg</td>
                      <td style="border-left: 1px solid #999;" width="35%" valign="middle" align="right"><input class="text_add" name="usr_weight_goal" id="usr_weight_goal" placeholder="Enter Weight...">&nbsp;</td>
                      <td width="15%" valign="middle" align="left">&nbsp;kg</td>
                      
                    </tr>
                    <tr>
                      <td width="25%" valign="middle" align="right">Biceps:&nbsp;</td>
                      <td width="25%" valign="middle" align="left">&nbsp;<?php echo $row_DatosCurrent['usr_biceps']; ?> cm</td>
                      <td style="border-left: 1px solid #999;" width="35%" valign="middle" align="right"><input class="text_add" name="usr_biceps_goal" id="usr_biceps_goal" placeholder="Enter Biceps...">&nbsp;</td>
                      <td width="15%" valign="middle" align="left">&nbsp;cm</td>
                    </tr>
                    <tr>
                      <td width="25%" valign="middle" align="right">Chest:&nbsp;</td>
                      <td width="25%" valign="middle" align="left">&nbsp;<?php echo $row_DatosCurrent['usr_chest']; ?> cm</td>
                      <td style="border-left: 1px solid #999;" width="35%" valign="middle" align="right"><input class="text_add" name="usr_chest_goal" id="usr_chest_goal" placeholder="Enter Chest...">&nbsp;</td>
                      <td width="15%" valign="middle" align="left">&nbsp;cm</td>
                    </tr>
                    <tr>
                      <td width="25%" valign="middle" align="right">Waist:&nbsp;</td>
                      <td width="25%" valign="middle" align="left">&nbsp;<?php echo $row_DatosCurrent['usr_waist']; ?> cm</td>
                      <td style="border-left: 1px solid #999;" width="35%" valign="middle" align="right"><input class="text_add" name="usr_waist_goal" id="usr_waist_goal" placeholder="Enter Waist...">&nbsp;</td>
                      <td width="15%" valign="middle" align="left">&nbsp;cm</td>
                    </tr>
                    <tr>
                      <td width="25%" valign="middle" align="right">Hips:&nbsp;</td>
                      <td width="25%" valign="middle" align="left">&nbsp;<?php echo $row_DatosCurrent['usr_hips']; ?> cm</td>
                      <td style="border-left: 1px solid #999;" width="35%" valign="middle" align="right"><input class="text_add" name="usr_hips_goal" id="usr_hips_goal" placeholder="Enter Hips...">&nbsp;</td>
                      <td width="15%" valign="middle" align="left">&nbsp;cm</td>
                    </tr>
                    <tr>
                      <td width="25%" valign="middle" align="right">Thigh:&nbsp;</td>
                      <td width="25%" valign="middle" align="left">&nbsp;<?php echo $row_DatosCurrent['usr_thigh']; ?> cm</td>
                      <td style="border-left: 1px solid #999;" width="35%" valign="middle" align="right"><input class="text_add" name="usr_thigh_goal" id="usr_thigh_goal" placeholder="Enter Thigh...">&nbsp;</td>
                      <td width="15%" valign="middle" align="left">&nbsp;cm</td>
                    </tr>
                    <tr>
                      <td width="25%" valign="middle" align="right">Fet:&nbsp;</td>
                      <td width="25%" valign="middle" align="left">&nbsp;<?php echo $row_DatosCurrent['usr_fat']; ?> %</td>
                      <td style="border-left: 1px solid #999;" width="35%" valign="middle" align="right"><input class="text_add" name="usr_fat_goal" id="usr_fat_goal" placeholder="Enter Fat...">&nbsp;</td>
                      <td width="15%" valign="middle" align="left">&nbsp;%</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="prog_forms_parts_2">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                      <tr>
                        <td width="50%" valign="middle" align="right">Personal Trainig:&nbsp;</td>
                        <td width="50%" valign="middle" align="left">&nbsp;
                          <select class="text_add" name="id_pt" id="id_pt">
                            <option value="0">None</option>
                            <?php ObtenerEntrenadorPersonal ($row_DatosPt['id_user']);?>
                          </select>
                        </td>
                      </tr>
                    </tbody>
                </table>
              </div>
                  
              <div style="width: 93%; margin: 0 auto;">
                <input type="submit" class="btn btn-primary btn-user btn-block" value="NEXT" />
              </div>
                
                <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['vpt_UserId'];?>"/>
                <input type="hidden" name="MM_insert" id="MM_insert" value="formrequest" />
              </form>
              
            </div>
          </div>

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