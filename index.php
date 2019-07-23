<?php require_once('connections/conexion.php'); ?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$password=md5($_POST["password"]);

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formsignin")) {
    if (comprobaremailunico($_POST["email"]))
    {
  $insertSQL = sprintf("INSERT INTO users(email, password, status) VALUES (%s, %s, %s)",
                            GetSQLValueString($_POST["email"], "text"),
                            GetSQLValueString($password, "text"),
                            GetSQLValueString($_POST["status"], "int"));

  $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));

  $insertGoTo ="reg_access.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
    }
    else
    {
       // EL EMAIL NO ES UNICO
       $insertGoTo ="error.php?error=1";
       header(sprintf("Location: %s", $insertGoTo));
    }
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
        <?php include("inc/header_front.php"); ?>
        <div class="head">
            <div class="col_2">
                <div class="lin_3">
                <h1>VIRTUAL PT</h1>
                <h4>Your virtual personal trainer live</h4>
                </div>
            </div>
            <div class="col_2">
                <div class="formular_front">
                    <form action="index.php" method="post" name="formsignin" id="formsignin">
                        <table width="70%" align="center" cellspacing="0" class="list">
                            <tr>
                                <td style="" colspan="6" height="30" align="center" valign="middle"><h3>Register and get advice from Virtual PT every day about how to get in shape.</h3></td>      
                            </tr>
                            <tr valign="baseline" height="50">
                                <td colspan="6" valign="middle" align="center">
                                <input class="text_input" type="email" name="email" id="email" size="45" placeholder="Enter your E-Mail..." title="Enter a valid email" required/>
                                </td>
                            </tr>
                            <tr valign="baseline" height="50">
                                <td style="" colspan="6" valign="middle" align="center">
                                <input class="text_input" type="password" name="password" id="password" size="45" placeholder="Enter your Password..." required/>
                                </td>
                            </tr>
                            <tr valign="baseline">
                                <td style=" padding-bottom:10px;" nowrap="nowrap" align="center"><input style="padding: 20px 170px;" type="submit" class="button" value="SIGN UP" /></td>
                            </tr>
                        </table>
                        <input type="hidden" name="status" id="status" value="1"/>
                        <input type="hidden" name="MM_insert" id="MM_insert" value="formsignin" />
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