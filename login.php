<head>
    <script src="javascript/loginform.js" defer ></script>
</head>

<div class="login-form">

    <div class = "login-box">
        <button class="closebtn fromlogin">&times;</button>
            <form action="index.php"class="login-items" method = "POST">
                <input type="text" name="Username" id="username" class="modal-text" placeholder="Username">
                <input type= "password" name="password" id="password" class="modal-text" placeholder="Password">
                <button type="submit" name="submit" id = "login" class ="submit-button fromlogin" >LOGIN</button>
                <p>Don't have an account?</p>
                <a href="signup.php" style = "color:black;">SIGNUP</a>
            </form> 
    </div>

</div>