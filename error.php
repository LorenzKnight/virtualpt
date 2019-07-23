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
            <div class="cab_inic">
            <h1>Opss...</h1>
            </div>
            <div class="cab_inic">
                <?php if ($_GET["error"]==1){?>
                <div class="formular_cont" style="color: #999;">
                    <p>There is a user with this e-mail address<br>
                    Please try another email address<br><br>
                    <a href="index.php"><input style="padding: 20px 100px;" class="button" type="submit" value="TRY ANOTHER E-MAIL" /></a><br>
                    or<br><br> 
                    <a href="#">recover your account here</a></p>
                </div>
                <?php } ?>
                <?php if ($_GET["error"]==2){?>
                <div class="formular_cont" style="color: #999;">
                    <p>E-mail or password incorrect<br>
                    Please try again<br><br>
                    <a href="reg_access.php"><input style="padding: 20px 100px;" class="button" type="submit" value="TRY AGAIN" /></a><br>
                    or<br><br> 
                    <a href="#">recover your account here</a></p>
                </div>
                <?php } ?>
                <?php if ($_GET["error"]==3){?>
                <div class="formular_cont" style="color: #999;">
                    <p>E-mail or password incorrect<br>
                    Please try again<br><br>
                    <a href="login.php"><input style="padding: 20px 100px;" class="button" type="submit" value="TRY AGAIN" /></a><br>
                    or<br><br> 
                    <a href="#">recover your account here</a></p>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="foot_inicio">
        Copyright © Virtual PT 2019
    </div>
</div>
</body>
</html>