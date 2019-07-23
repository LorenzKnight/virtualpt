<?php require_once('connections/conexion.php');?>
<?php
//$editFormAction = $_SERVER['PHP_SELF'];
//if (isset($_SERVER['QUERY_STRING'])) {
//  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
//}

//if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formsignup")) {    
//  $updateSQL = sprintf("UPDATE users SET usr_weight=%s, usr_height=%s, usr_biceps=%s, usr_chest=%s, usr_waist=%s, usr_hips=%s, usr_thigh=%s, usr_fat=%s WHERE id_user=%s",
//                       GetSQLValueString($_POST["usr_weight"], "int"),
//  					 GetSQLValueString($_POST["usr_height"], "int"),
//                       GetSQLValueString($_POST["usr_biceps"], "int"),
//                       GetSQLValueString($_POST["usr_chest"], "int"),
//                       GetSQLValueString($_POST["usr_waist"], "int"),
//                       GetSQLValueString($_POST["usr_hips"], "int"),
//                       GetSQLValueString($_POST["usr_thigh"], "int"),
//                       GetSQLValueString($_POST["usr_fat"], "int"),
//                       GetSQLValueString($_POST["id_user"], "int"));
		

//$Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

//  $updateGoTo = "welcome.php";
// if (isset($_SERVER['QUERY_STRING'])) {
//    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
//    $updateGoTo .= $_SERVER['QUERY_STRING'];
//   }
//  header(sprintf("Location: %s", $updateGoTo));
//}
?>

<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formsignup")) {


  $insertSQL = sprintf("INSERT INTO usr_current_status(id_user, usr_weight, usr_height, usr_biceps, usr_chest, usr_waist, usr_hips, usr_thigh, usr_fat) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                        GetSQLValueString($_POST["id_user"], "int"),                      
                        GetSQLValueString($_POST["usr_weight"], "int"),
                        GetSQLValueString($_POST["usr_height"], "int"),
                        GetSQLValueString($_POST["usr_biceps"], "int"),
                        GetSQLValueString($_POST["usr_chest"], "int"),
                        GetSQLValueString($_POST["usr_waist"], "int"),
                        GetSQLValueString($_POST["usr_hips"], "int"),
                        GetSQLValueString($_POST["usr_thigh"], "int"),
                        GetSQLValueString($_POST["usr_fat"], "int"));

  
  $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));


  $insertGoTo = "welcome.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
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
            <div class="cab_inic" style="color: #999; margin-bottom: 10px;">
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
                    <form action="current_measurements.php" method="post" name="formsignup" id="formsignup">
                        <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" class="list">
                            <tr>
                                <td style="color: #999;" colspan="3" align="center" valign="middle"><p>Enter your current measurement or click skip if you want that a Personal trainer help you with this.</p><br></td>      
                            </tr>
                            <tr valign="baseline">
                                <td width="20%" valign="middle" align="center" style="background-color: red;">
                                    <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" class="list">
                                        <tr valign="baseline" height="60">
                                            <td valign="middle" align="center">
                                                <input class="text_input_s" name="usr_height" id="usr_height" size="5" placeholder="Height"/>
                                            </td>
                                        </tr>
                                        <tr valign="baseline" height="60">
                                            <td valign="middle" align="center">

                                            </td>
                                        </tr>
                                        <tr valign="baseline" height="60">
                                            <td valign="middle" align="center">
                                                
                                            </td>
                                        </tr>
                                        <tr valign="baseline" height="60">
                                            <td valign="middle" align="center">
                                                <input class="text_input_s" name="usr_fat" id="usr_fat" size="5" placeholder="Fat"/>
                                            </td>
                                        </tr>
                                        <tr valign="baseline" height="60">
                                            <td valign="middle" align="center">
                                                
                                            </td>
                                        </tr>
                                        <tr valign="baseline" height="60">
                                            <td valign="middle" align="center">
                                                
                                            </td>
                                        </tr>
                                        <tr valign="baseline" height="60">
                                            <td valign="middle" align="center">
                                                <input class="text_input_s" name="usr_weight" id="usr_weight" size="5" placeholder="Weight"/>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="60%" valign="middle" align="center" style="background-color: blue;">
                                    
                                </td>
                                <td width="20%" valign="middle" align="center" style="background-color: orange;">
                                    <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" class="list">
                                        <tr valign="baseline" height="30">
                                            <td valign="middle" align="center">

                                            </td>
                                        </tr> 
                                        <tr valign="baseline" height="40">
                                            <td valign="middle" align="center">

                                            </td>
                                        </tr> 
                                        <tr valign="baseline" height="60">
                                            <td valign="middle" align="center">
                                                <input class="text_input_s" name="usr_chest" id="usr_chest" size="5" placeholder="Chest"/>
                                            </td>
                                        </tr>   
                                        <tr valign="baseline" height="60">
                                            <td valign="middle" align="center">
                                                <input class="text_input_s" name="usr_biceps" id="usr_biceps" size="5" placeholder="Biceps"/>
                                            </td>
                                        </tr> 
                                        <tr valign="baseline" height="60">
                                            <td valign="middle" align="center">
                                                <input class="text_input_s" name="usr_waist" id="usr_waist" size="5" placeholder="Waist"/>
                                            </td>
                                        </tr> 
                                        <tr valign="baseline" height="60">
                                            <td valign="middle" align="center">
                                                <input class="text_input_s" name="usr_hips" id="usr_hips" size="5" placeholder="Hips"/>
                                            </td>
                                        </tr> 
                                        <tr valign="baseline" height="60">
                                            <td valign="middle" align="center">
                                                <input class="text_input_s" name="usr_thigh" id="usr_thigh" size="5" placeholder="Thigh"/>
                                            </td>
                                        </tr>
                                        <tr valign="baseline" height="50">
                                            <td valign="middle" align="center">
                                                
                                            </td>  
                                        </tr> 
                                    </table>
                                </td>
                            </tr>
                            <tr valign="baseline">
                                <td colspan="3" align="center" nowrap="nowrap"><input style="padding: 20px 180px;" type="submit" class="button" value="FINISH" /></td>
                            </tr>
                            <tr valign="baseline">
                                <td colspan="3" align="center" nowrap="nowrap" align="center">
                                    
                                    <a href="inicio.php">Skip this step</a>
                                </td>
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