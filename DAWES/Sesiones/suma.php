<?php
session_start();

$_SESSION["N1"] += 1;
header("location:index.php");
