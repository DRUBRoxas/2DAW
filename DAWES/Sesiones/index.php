<?php
session_start();
if(!isset($_SESSION["numero"]))
{
    $_SESSION["numero"]=1;
}

echo "El valor de n = ".$_SESSION["numero"];
?>
<a href="suma.php">Suma 1</a>