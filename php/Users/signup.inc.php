<?php

require_once "../includes/dbhconnection.inc.php";
require_once "functions.inc.php";

$signupininfo = json_decode(file_get_contents("php://input"), true);



    $fullname = $signupininfo["fullname"];
    $username = $signupininfo["username"];
    $email = $signupininfo["email"];
    $password = $signupininfo["password"];
    $repassword = $signupininfo["repassword"];


    // $fullname = "Nischal";
    // $username = "mrhxszo";
    // $email = "dhungananischal76@gmail.com";
    // $password = "123456";
    // $repassword = "123456";

    if(emptyfield($fullname,$username,$email,$password,$repassword) !== False){
        $error = ["error"=> "Please fill out all fields"];
        echo json_encode($error);
        header('Content-Type: application/json; charset=utf-8');
        exit();
    }
    if(invalidusername($username) != False){
        $error = ["error"=> "invalid Username"];
        echo json_encode($error);
        exit();
    }
    if(invalidemail($email) != False){
        $error = ["error"=>"invalid Email"];
        echo json_encode($error);
        exit();
    }
    if(passwordmatch($password, $repassword) != False){
        $error = ["error"=> "password didn't match"];
        echo json_encode($error);
        exit();
    }
    if(usernameexists($conn, $username, $email) != False){
        $error = ["error"=> "username or email already exists"];
        echo json_encode($error);
        exit();      
    }
    if(strlen($password) <= 5 ){
        $error = ["error"=> "password is too short"];
        echo json_encode($error);
        exit(); 
    }

    createuser($conn, $fullname, $username, $email, $password);
    
    // $error = ["201"=> "created"];
    // echo json_encode($error);