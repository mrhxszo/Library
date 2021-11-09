<?php
session_start();
?>

<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="style.css" rel="stylesheet">
</head>

<body class = "bodyy">
    <img src = "dog.jpg">
    <li><?php 
    if (isset($_SESSION["firstname"])){
      echo "firstname: " , ($_SESSION["firstname"]);
      echo "lastname: " , ($_SESSION["lastname"]);
    }
    else{
      header(Users/login.php);
    }
    ?><br>
    <li>

</body>

</html>