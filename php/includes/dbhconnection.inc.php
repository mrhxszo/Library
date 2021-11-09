<?php

$user = "sql11449452";
$pass = "ljA3YHR9vr";
$host = "sql11.freesqldatabase.com";
$dbName = "sql11449452";

// $user = "root";
// $pass = "Arsenal@76mysql";
// $host = "localhost";
// $dbName = "library";

$conn = mysqli_connect($host, $user, $pass, $dbName);

if(!$conn){
    die("connection failed: ". mysqli_connect_error());
}