<?php require_once('connections/conexion.php');?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formsignup")) {    
  $updateSQL = sprintf("UPDATE users SET name=%s, surname=%s, year=%s, month=%s, day=%s WHERE id_user=%s",
                       GetSQLValueString($_POST["name"], "text"),
					   GetSQLValueString($_POST["surname"], "text"),
                       GetSQLValueString($_POST["year"], "int"),
                       GetSQLValueString($_POST["month"], "text"),
                       GetSQLValueString($_POST["day"], "int"),
                       GetSQLValueString($_POST["id_user"], "int"));
		

$Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

  $updateGoTo = "current_measurements.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
?>
<html>
<head>
<meta charset="iso-8859-1">
<title>Virtual PT</title>
<link rel="shortcut icon" href="favicon-32x32.png">
<link href="css/_colors.scss" />
<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
<script>
</script>
</head>
<body>
<div class="wrapper">
    <div class="container2">
        <?php include("inc/header_front_2.php"); ?>
        <div class="head_comp">
            <div class="cab_inic" style="color: #999; margin-bottom: 50px;">
            <h2>Welcome to virtual PT.</h2>
            <p>Your goal will be met after these steps</p>
            <?php
            //if ((isset($_SESSION['MM_Username'])) && ($_SESSION['MM_Username'] != ""))
            //{
            //    echo "Hi ". $_SESSION['MM_Username'];
            //    echo "Hi ". $_SESSION['vpt_UserId'];
            //}
            //else
            //{ ?>
                <!--No funciona...-->
            <?php //} ?>
            </div>
            <div class="cab_inic">
                <div class="formular_cont">
                    <form action="to_complete_signup.php" method="post" name="formsignup" id="formsignup">
                        <table width="100%" align="center" cellspacing="0" class="list">
                            <tr>
                                <td style="color: #999;" colspan="6" height="30" align="center" valign="middle"><h3>Get advice from Virtual PT every day about how to get in shape.</h3></td>      
                            </tr>
                            <tr valign="baseline" height="50">
                                <td colspan="3" valign="middle" align="center">
                                    <input class="text_input" name="name" id="name" size="21" placeholder="Enter your Name..." required/>
                                </td>
                                <td colspan="3" valign="middle" align="center">
                                    <input class="text_input" name="surname" id="surname" size="21" placeholder="Enter your Surname..." required/>
                                </td>
                            </tr>
                            <tr valign="baseline" height="50">
                                <td width="24%" colspan="2" valign="middle" align="center">
                                <input class="text_input" name="day" id="day" size="13" placeholder="day..." required/>
                                </td>
                                <td width="24%" colspan="2" valign="middle" align="center">
                                <input class="text_input" name="month" id="month" size="13" placeholder="Month..." required/>
                                </td>
                                <td width="24%" colspan="2" valign="middle" align="center" style="">
                                <input class="text_input" name="year" id="year" size="13" placeholder="Year..." required/>
                                </td>
                            </tr>
                            <tr valign="baseline">
                                <td colspan="6" align="center" nowrap="nowrap" style=" padding-bottom:10px;"><input style="padding: 20px 188px;" type="submit" class="button" value="NEXT" /></td>
                            </tr>
                        </table>
                        <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['vpt_UserId'];?>"/>
                        <input type="hidden" name="MM_insert" id="MM_insert" value="formsignup" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="foot_inicio">
        Copyright © Virtual PT 2019
    </div>
</div>
</body>
</html>