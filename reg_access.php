<?php require_once('connections/conexion.php');?>
<?php
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

function mysqli_result($res, $row, $field=0) { 
    $res->data_seek($row); 
    $datarow = $res->fetch_array(); 
    return $datarow[$field]; 
}

if (isset($_POST['email'])) {
  $loginUsername=$_POST['email'];
  //ATENCIÓN USAMOS MD5 para guardar la contraseña.
  $password=md5($_POST['password']);
  $MM_fldUserAuthorization = "rank";
  $MM_redirectLoginSuccess = "to_complete_signup.php";
  $MM_redirectLoginFailed = "error.php?error=2";
  $MM_redirecttoReferrer = false;
  
  	
  $LoginRS__query=sprintf("SELECT id_user, email, password, rank FROM users WHERE email=%s AND password=%s AND status=1",
  GetSQLValueString($loginUsername, "text"),
  GetSQLValueString($password, "text")); 
   
  $LoginRS = mysqli_query($con,  $LoginRS__query) or die(mysqli_error($con));
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysqli_result($LoginRS,0,'rank');
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	 
    $_SESSION['vpt_UserId'] = mysqli_result($LoginRS,0,'id_user');
    $_SESSION['vpt_Mail'] = mysqli_result($LoginRS,0,'email');
    $_SESSION['vpt_Nivel'] = mysqli_result($LoginRS,0,'rank');
	//ContabilizarAcceso($_SESSION['vpt_UserId']);
	
	/* DESCOMENTAR SOLO SI SE USA EL CHECK DE RECORDAR CONTRASEÑA, HABRÁ QUE USAR LA FUNCIÓN generar_cookie()
	if ((isset($_POST["CAMPORECUERDA"])) && ($_POST["CAMPORECUERDA"]=="1"))
	generar_cookie($_SESSION['NOMBREWEB_UserId']);
	*/	     

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
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
        <?php include("inc/header_front_2.php"); ?>
        <div class="head_reg">
            <div class="formular_front">
                <form action="reg_access.php" method="post" name="formsignup" id="formsignup">
                    <table width="70%" align="center" cellspacing="0" class="list">
                        <tr>
                            <td colspan="6" height="30" align="center" valign="middle"><h3>New member Login</h3> <p>Login to your member area using your email and password used</p></td>      
                        </tr>
                        <tr valign="baseline" height="50">
                            <td style="" colspan="6" align="center" valign="middle"></td>      
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
                            <td style=" padding-bottom:10px;" nowrap="nowrap" align="center"><input style="padding: 20px 172px;" type="submit" class="button" value="LOG IN" /></td>
                        </tr>
                    </table>
                    <input type="hidden" name="status" id="status" value="1"/>
                    <input type="hidden" name="MM_insert" id="MM_insert" value="formsignin" />
                </form>
            </div>
        </div>
    </div>
    <div class="foot_inicio">
        Copyright © Virtual PT 2019
    </div>
</div>
</body>
</html>