<?php

function emptyfield($fullname,$username,$email,$password,$repassword){
    if (empty($fullname) || empty($username) || empty($email) || empty($password) || empty($repassword)){
        return true;
    }
    else return false;
}

function invalidusername($username){
    if(!(preg_match("/^[a-zA-z0-9]*$/", $username))){
        return true;
    }
    else{
        return false;
    }
}

function invalidemail($email){
    if(!(filter_var($email,FILTER_VALIDATE_EMAIL))){
        return true;
    }
    else{
        return false;
    }
}

function passwordmatch($password, $repassword){
    if($password !== $repassword){
        return true;
    }
    else{
        return false;
    }
}

function usernameexists($conn, $username, $email){
    $sql = "SELECT * FROM Users WHERE username = ? OR useremail = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        // echo (mysqli_error($conn));
        $error = ["500 internal server error"=> "stmtfailed"];
        echo json_encode($error);
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($resultData);

    // $sql = "SELECT * FROM Users WHERE username = '$username' OR useremail = '$email';";
    // $resultData=mysqli_query($conn,$sql);
    
    // if (!mysqli_query($conn, $sql)) {
    //     echo (mysqli_error($conn));
    // }
    // $row = mysqli_fetch_assoc($resultData);

    if ($row) {
        return $row;
    }
    else{
        return false;
    }

    mysqli_stmt_close($stmt);
}

function createuser($conn, $fullname, $username, $email, $password){
    $sql = "INSERT INTO Users(fullname,username,useremail,userpassword) VALUES(?,?,?,?)";

    $stmt = mysqli_stmt_init($conn);
    if(!(mysqli_stmt_prepare($stmt, $sql))){
        // echo (mysqli_error($conn));
        $error = ["500 internal server error"=> "stmtfailed"];
        echo json_encode($error);
        exit();
    }

    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

    echo (mysqli_error($conn));
    mysqli_stmt_bind_param($stmt,"ssss",$fullname, $username, $email, $hashedpassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $userinfo=[ "201" => "created",
                "fullname" => usernameexists($conn, $username, $password)['fullname'],
                "username" => usernameexists($conn, $username, $password)['username'],
                "Email" => usernameexists($conn, $username, $password)['useremail']];
    
    echo json_encode($userinfo);
}

//loginfunctions

function emptyfieldlogin($username,$password){
    if ((empty($username) || empty($password))){
        return true;
    }
    else return false;
}

function loginUser($conn, $username, $password){
    $usernameexists = usernameexists($conn, $username, $username);

    if ($usernameexists === false) {
        $error = ["404 not found"=> "username not found"];
        echo json_encode($error);
        exit();
    }

    $passwordhashed = $usernameexists["userpassword"];
    $checkpassword = password_verify($password, $passwordhashed);

    if($checkpassword === false){
        $error = ["401 unauthorized"=> "wrongpassword"];
        echo json_encode($error);
        exit();
    }

    elseif($checkpassword === true){
        session_start();
        $_SESSION["email"] = $usernameexists;
        $_SESSION["userid"] = $usernameexists["userid"];
        $_SESSION["username"] = $usernameexists["username"];
        $success = array("200 OK" => "logged in",
        usernameexists($conn, $username, $password));
        echo json_encode($success);
        exit();
    }

}
