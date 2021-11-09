<?php session_start(); ?>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="javascript/functions.js" defer ></script>
  <script src="javascript/script.js" defer ></script>
  <link href="style.css" rel="stylesheet">
  <style>
      .topic{
          margin: 10px 5px 5px 5px;
          color: white;
          font-family: monospace;
      }
      .home{
          margin: 5px 5px 5px 5px;
          padding-left: 20px;
          color:black;
          border: none;
          color: white;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
      }
      .login{
          margin: 5px 5px 5px 5px;
          padding-left: 20px;
          color:black;
          border: none;
          color: white;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
      }

      .login:hover{
        cursor: pointer;
        }
      .signup{
          margin: 5px 5px 5px 5px;
          padding-left: 20px;
          color:black;
          border: none;
          color: white;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 15px;
      }
      @media screen and (max-width: 480px) {
        .signup{
            padding-left: 0px;
            font-size: 15px;
        }
        .login{
            padding-left: 0px;
            font-size: 15px;
        }
        .topic{
            font-size: 30px;
        }
        .home{
            font-size: 15px;
        }      
      }
      .upbar{
          display:flex;
          align-items: center;
          margin-top: 10px;
      }
  </style>
</head>

<header>
    <p class = "topic" >LIBRARY</p>
        <?php if(isset($_SESSION["username"])){
                echo '<div class="upbar">';
                echo '<p class = "signup username">',$_SESSION["username"],"</p>","<br>";
                echo '<p class = "userid" style="display:none;">',$_SESSION["userid"],"</p>","<br>";
                echo '<a href="php/Users/logout.inc.php" class = "signup">Log out</a>';
                echo '<a href="library.php" class = "signup">Library</a>';
                echo "</div>";
        }
            else{
                echo '<div class="upbar">';
                echo '<a href="index.php"class = "home">Home</a>';
                echo '<a class = "login">Log in</a>';
                echo '<a href="signup.php" class = "signup">Sign up</a>';
                echo "</div>";
            }
        ?>

</header>

</html>