<?php
session_start();
$_SESSION["numero"]+=1;
header("location:index.php");
?>

