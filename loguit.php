<?
//vernietig de sessie-variabele zodat gebruiker is uitgelogd
session_start();
session_destroy();
header("location:index.php");
?>