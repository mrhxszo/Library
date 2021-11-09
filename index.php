<?php
include("header.php");
include("login.php");
?>
<head>
    <style>
        .container {
        position: relative;
        /* max-width: 800px; Maximum width */
        margin: 0 auto; /* Center it */
        }

        .content {
        position: absolute; 
        top: 20%;
        left: 10%;
        background: rgb(0, 0, 0);
        background: rgba(0, 0, 0, 0); 
        color: white;
        width: 100%;
        text-shadow: 2px 2px 2px black; 
        }

        @media only screen and (max-width: 800px) {
            .content {
                left: 0%;
            }
        }
    </style>
</head>

<body>
    <?php
    if(!isset($_SESSION["username"])){
       echo'<div class="container">
        <img src="library.jpg" alt="Notebook" style="width:100%;height:90%;">
        <div class="content">
          <h1>Create the collection of your favourite books in your personal library.</h1>
          <h2 style="position:absolute;left:30%;">
              <a href="signup.php" style="color:white;">Get Started Now!</a></br>
          </br>
              <a href="php/Users/guest.inc.php" style="color:white;">Try As a Guest!</a>
          </h2>    
      </div>
      </div>';
    }
    else{
        echo"<div class='container'>
        <img src='library.jpg' alt='Notebook' style='width:100%;height:90%;'>
        <div class='content'>
          <h1>Hello ", $_SESSION['username'], "!</h1>
          <h2 style='position:absolute;left:30%;'>
              <a href='library.php' style='color:white;'>See my library!</a></br>
          </h2>    
      </div>
      </div>";
    }
    ?>
</body>