<?php include("header.php")?>

<head>
    <script src="javascript/signup.js" defer ></script>
    <style>
        .signup-form{
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            height:100%;
            width: 100%;
            overflow: auto;
            background-color: rgba(0, 0,0, 0.5);
        }

        .signupm-box{
            display: flex;
            flex-direction: column;
            background-color: rgb(114, 6, 190);
            margin: 10% auto;
            padding: 20px;
            height: 45%;
            width: 30%;
            box-shadow: 0 5px 8px black;
            align-items: flex-start;
}



        </style>
</head>

<body>
<div class="signup-form">

    <div class = "signupm-box">
        <button class="closebtn fromsignup">&times;</button>
        <p style = "color:white;font-size: 30px">you are signed up!</p>
        <p class= "login fromsignup" style="font-size:30px;text-decoration:underline">Login</p>
    </div>

</div>

<div class = "signup-box">
    <input type="text" name="fullname" id="fullname" class="modal-text" placeholder="Fullname">

    <input type="text" name="Username" id="signup-username" class="modal-text" placeholder="Username">

    <input type="text" name="email" id="email" class="modal-text" placeholder="Email">

    <input type= "password" name="password" id="signup-password" class="modal-text" placeholder="Password">

    <input type= "password" name="repassword" id="repassword" class="modal-text" placeholder="Retype your Password">

    <button type="submit" name="submit" id = "signup" class ="submit-button" >Sign Up</button>

    <p class="text fromsignup" style = "color:red;font-size: 20px;"></p>
</div>



<?php include("login.php")?>

</body>