<?php

    $_SESSION['MM_Username']="";
    $_SESSION['MM_UserGroup']="";
    $_SESSION['vpt_UserId']="";
    $_SESSION['vpt_Mail']="";
    $_SESSION['vpt_Nivel']="";

    unset($_SESSION['MM_Username']);
    unset($_SESSION['MM_UserGroup']);
    unset($_SESSION['vpt_UserId']);
    unset($_SESSION['vpt_Mail']);
    unset($_SESSION['vpt_Nivel']);

    header("Location: login.php");
?>