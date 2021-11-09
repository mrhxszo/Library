<?php
session_start();
$_SESSION["userid"] = "0";
$_SESSION["username"] = "Guest User";

header("location:../../library.php");