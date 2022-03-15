<?php
 require("database/connection.php");
 $em = "voting254";
 $email = htmlspecialchars($em);
 $out = crypt($email,'voting_salt%6(*(@*&*(@$*&Q@*$*@**');
// $dec = decrypt($email,'voting_salt%6(*(@*&*(@$*&Q@*$*@**');
 // echo ("<br><br>".$out);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <title>Voting System</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" url="favicon.ico">

</head>

<body style="background:url(bg.jpg);
background-repeat:no-repeat;
background-size:cover;
">

    <!-- <center>
  <div style="padding-top:10vh;">
  <?php 
  /*  if($em ="voting254"){
      header('Location: second.php');
      echo "moving";
    }
   */


   ?>

  </div>
</center> -->

    <div class="nav">
        <a href="" class="navbar">
            Voting
        </a>
        <a href="signup.php" class="navbar first">Sign Up</a>
        <a href="login.php" class="navbar">Login</a>

    </div>

    <div class="top container">
        <div class="row">
            <div class="col-md-4">
                <center>
                    
                    <br><br>
                </center>
            </div>
            <div class="col-md-6">
                <center>
                <div class="threeD">
                  LOGIN TO VOTE!
                </div>
                </center>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <div class="footer">
        <center>&copy; sifuna 2022</center>
    </div>



</body>

<script src="assets/js/jquery.js"></script>
<script src="assets/js/script.js"></script>

</html>