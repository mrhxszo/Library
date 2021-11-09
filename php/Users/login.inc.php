<?php
require_once "../includes/dbhconnection.inc.php";
require_once "functions.inc.php";

    $logininfo = json_decode(file_get_contents("php://input"), true);

    $username = $logininfo["username"];
    $password = $logininfo["password"];

    // $username = 'mrhxszo';
    // $password = '123456';

    if(emptyfieldlogin($username, $password) !== False){
        $error = ["417 Expectation Failed"=> "emptyfield"];
        echo json_encode($error);
        exit();
    }

    loginUser($conn, $username, $password);