<?php require_once('connections/conexion.php');?>
<?php
$variable_Consulta = "0";
if (isset($VARIABLE)) {
  $variable_Consulta = $VARIABLE;
}

$query_DatosOpenRequest = sprintf("SELECT * FROM request WHERE id_request=%s", GetSQLValueString($_GET["id"], "int"));
$DatosOpenRequest = mysqli_query($con, $query_DatosOpenRequest) or die(mysqli_error($con));
$row_DatosOpenRequest = mysqli_fetch_assoc($DatosOpenRequest);
$totalRows_DatosOpenRequest = mysqli_num_rows($DatosOpenRequest);
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


  $insertGoTo = "request_done.php";
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
            $yearold = date("Y") - ObtenerAnoUsuario($row_DatosOpenRequest['id_user']);
          ?>
          <?php //echo $row_DatosUserRef['name']; ?>
          <!-- Content Row -->
          <div class="row">
            <div class="prog_forms_2" style="height: 550px;">
              <div class="prog_forms_cab">
                <div class="profil_cilcle">
                </div>
                <div class="priv_info">
                  <?php echo ObtenerNombreUsuario($row_DatosOpenRequest['id_user']); ?> <?php echo ObtenerApellidoUsuario($row_DatosOpenRequest['id_user']); ?>
                  <br><?php echo $yearold; ?> Year old
                  <br>Height: <?php echo $row_DatosOpenRequest['usr_height']; ?> cm
                </div>
                   
              </div>
              <div class="prog_forms_parts_2" style="margin-top: -40px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td style="text-decoration: underline;" width="50%" colspan="2" valign="middle" align="center">Current</td>
                      <td style="text-decoration: underline; border-left: 1px solid #999;" width="50%" colspan="2" valign="middle" align="center">Goal</td>
                    </tr>
                    <tr>
                      <td width="25%" valign="middle" align="right">Weight:&nbsp;</td>
                      <td width="25%" valign="middle" align="left">&nbsp;<?php echo $row_DatosOpenRequest['usr_weight']; ?> kg</td>
                      <td style="border-left: 1px solid #999;" width="25%" valign="middle" align="right">Weight:&nbsp;</td>
                      <td width="25%" valign="middle" align="left">&nbsp;<?php echo $row_DatosOpenRequest['usr_weight_goal']; ?> kg</td>
                    </tr>
                    <tr>
                      <td width="25%" valign="middle" align="right">Biceps:&nbsp;</td>
                      <td width="25%" valign="middle" align="left">&nbsp;<?php echo $row_DatosOpenRequest['usr_biceps']; ?> cm</td>
                      <td style="border-left: 1px solid #999;" width="25%" valign="middle" align="right">Biceps:&nbsp;</td>
                      <td width="25%" valign="middle" align="left">&nbsp;<?php echo $row_DatosOpenRequest['usr_biceps_goal']; ?> cm</td>
                    </tr>
                    <tr>
                      <td width="25%" valign="middle" align="right">Chest:&nbsp;</td>
                      <td width="25%" valign="middle" align="left">&nbsp;<?php echo $row_DatosOpenRequest['usr_chest']; ?> cm</td>
                      <td style="border-left: 1px solid #999;" width="25%" valign="middle" align="right">Chest:&nbsp;</td>
                      <td width="25%" valign="middle" align="left">&nbsp;<?php echo $row_DatosOpenRequest['usr_chest_goal']; ?> cm</td>
                    </tr>
                    <tr>
                      <td width="25%" valign="middle" align="right">Waist:&nbsp;</td>
                      <td width="25%" valign="middle" align="left">&nbsp;<?php echo $row_DatosOpenRequest['usr_waist']; ?> cm</td>
                      <td style="border-left: 1px solid #999;" width="25%" valign="middle" align="right">Waist:&nbsp;</td>
                      <td width="25%" valign="middle" align="left">&nbsp;<?php echo $row_DatosOpenRequest['usr_waist_goal']; ?> cm</td>
                    </tr>
                    <tr>
                      <td width="25%" valign="middle" align="right">Hips:&nbsp;</td>
                      <td width="25%" valign="middle" align="left">&nbsp;<?php echo $row_DatosOpenRequest['usr_hips']; ?> cm</td>
                      <td style="border-left: 1px solid #999;" width="25%" valign="middle" align="right">Hips:&nbsp;</td>
                      <td width="25%" valign="middle" align="left">&nbsp;<?php echo $row_DatosOpenRequest['usr_hips_goal']; ?> cm</td>
                    </tr>
                    <tr>
                      <td width="25%" valign="middle" align="right">Thigh:&nbsp;</td>
                      <td width="25%" valign="middle" align="left">&nbsp;<?php echo $row_DatosOpenRequest['usr_thigh']; ?> cm</td>
                      <td style="border-left: 1px solid #999;" width="25%" valign="middle" align="right">Thigh:&nbsp;</td>
                      <td width="25%" valign="middle" align="left">&nbsp;<?php echo $row_DatosOpenRequest['usr_thigh_goal']; ?> cm</td>
                    </tr>
                    <tr>
                      <td width="25%" valign="middle" align="right">Fet:&nbsp;</td>
                      <td width="25%" valign="middle" align="left">&nbsp;<?php echo $row_DatosOpenRequest['usr_fat']; ?> %</td>
                      <td style="border-left: 1px solid #999;" width="25%" valign="middle" align="right">Fet:&nbsp;</td>
                      <td width="25%" valign="middle" align="left">&nbsp;<?php echo $row_DatosOpenRequest['usr_fat_goal']; ?> %</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="prog_forms_parts_2">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                      <tr>
                        <td width="50%" valign="middle" align="right">Personal Trainig:&nbsp;</td>
                        <td width="50%" valign="middle" align="left">
                        <?php if ($totalRows_DatosOpenRequest > 0) { ?>
                        &nbsp;<?php echo ObtenerNombreUsuario($row_DatosOpenRequest['id_pt']); ?> <?php echo ObtenerApellidoUsuario($row_DatosOpenRequest['id_pt']); ?>
                        <?php }
                        else
                        { ?>
                        None
                        <?php }  ?>
                        </td>
                      </tr>
                    </tbody>
                </table>
              </div>
                  <form class="user" action="send_request.php" method="post" name="formrequest" id="formrequest">
                <div style="width: 93%; margin: 0 auto;">
                  <input type="submit" class="btn btn-primary btn-user btn-block" style="text-transform: uppercase;" value="Create a program for <?php echo ObtenerNombreUsuario($row_DatosOpenRequest['id_user']); ?>" />
                </div>
                  <input type="hidden" name="usr_height" id="usr_height" value="<?php echo $row_DatosCurrent['usr_height']; ?>"/>
                  <input type="hidden" name="usr_weight" id="usr_weight" value="<?php echo $row_DatosCurrent['usr_weight']; ?>"/>
                  <input type="hidden" name="usr_biceps" id="usr_biceps" value="<?php echo $row_DatosCurrent['usr_biceps']; ?>"/>
                  <input type="hidden" name="usr_chest" id="usr_chest" value="<?php echo $row_DatosCurrent['usr_chest']; ?>"/>
                  <input type="hidden" name="usr_waist" id="usr_waist" value="<?php echo $row_DatosCurrent['usr_waist']; ?>"/>
                  <input type="hidden" name="usr_hips" id="usr_hips" value="<?php echo $row_DatosCurrent['usr_hips']; ?>"/>
                  <input type="hidden" name="usr_thigh" id="usr_thigh" value="<?php echo $row_DatosCurrent['usr_thigh']; ?>"/>
                  <input type="hidden" name="usr_fat" id="usr_fat" value="<?php echo $row_DatosCurrent['usr_fat']; ?>"/>

                  <input type="hidden" name="usr_weight_goal" id="usr_weight_goal" value="<?php echo $row_DatosGoal['usr_weight_goal']; ?>"/>
                  <input type="hidden" name="usr_biceps_goal" id="usr_biceps_goal" value="<?php echo $row_DatosGoal['usr_biceps_goal']; ?>"/>
                  <input type="hidden" name="usr_chest_goal" id="usr_chest_goal" value="<?php echo $row_DatosGoal['usr_chest_goal']; ?>"/>
                  <input type="hidden" name="usr_waist_goal" id="usr_waist_goal" value="<?php echo $row_DatosGoal['usr_waist_goal']; ?>"/>
                  <input type="hidden" name="usr_hips_goal" id="usr_hips_goal" value="<?php echo $row_DatosGoal['usr_hips_goal']; ?>"/>
                  <input type="hidden" name="usr_thigh_goal" id="usr_thigh_goal" value="<?php echo $row_DatosGoal['usr_thigh_goal']; ?>"/>
                  <input type="hidden" name="usr_fat_goal" id="usr_fat_goal" value="<?php echo $row_DatosGoal['usr_fat_goal']; ?>"/>
                  <input type="hidden" name="id_pt" id="id_pt" value="<?php echo $row_DatosGoal['id_pt']; ?>"/>

                  <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['vpt_UserId'];?>"/>
                  <input type="hidden" name="MM_insert" id="MM_insert" value="formrequest" />
                </form>
              
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
  <?php include("inc/logout_msn.php"); ?>

  <?php include("inc/footer.php"); ?>

</body>

</html>
<?php
//AÑADIR AL FINAL DE LA PÁGINA
mysqli_free_result($DatosConsulta);
mysqli_free_result($query_DatosCurrent);
mysqli_free_result($query_DatosGoal);
?>