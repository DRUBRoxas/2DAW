<?php
session_start();
if (!isset($_SESSION["N1"])) {

    $_SESSION["N1"] = 1;
}
echo "el valor de n = " . $_SESSION["N1"];
?>
<a href="suma.php">Suma</a>