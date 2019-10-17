<?
if($_SESSION['autentificado']!="1"){
header("location:../login.php");
exit();
}
?>