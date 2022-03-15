<?php

require("database/connection.php");
session_start();
$error = false;
if(isset($_SESSION["username"])){
    $c = $_SESSION["username"];
    $_COOKIE["user_name"] = $c;
    setcookie("user_cookie","$c",time() + 10,'/');
    header("Location: nalika/index.php");
}

function clearSession(){
    session_unset(); // remove all session variables
    session_destroy(); // destroy the session
 }

 if(isset($_POST['login_button'])){
    $user_email= $pass= '';
    $user_email=$_POST['user_email'];
    $pass=$_POST['password'];
    if(empty($user_email) || empty($pass)){
        $error = true;
    }else{
        $c_p = crypt($pass,"ioahc7t(68809q8r%6xq)");
        echo $c_p;
        $get_password = "SELECT * FROM User WHERE user_email=\"".$user_email."\"";
        echo $get_password;
        $user_results = $conn->query($get_password);
        if($user_results->num_rows > 0){
            $error = false;
            while($row = $user_results->fetch_assoc()){
                $name_z =  $row["first_name"];
                echo $name_z;
                $pass_z =  $row["user_password"];

                if($pass_z === $c_p){
                    $_SESSION["username"] = $name_z;
                    setcookie("user_cookie","$name_z",time() + 20,'/');
                    header("Location: nalika/index.php");
                    
                }
                else{
                    clearSession();
                    $error = true;
                }
                 

            }
            // echo $user_results["user_name"];
          }
          else{
              $error = true;
          }

        // $firstname=htmlspecialchars($firstname);
    }
    
}   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login | Voting System</title>


</head>

<body>
    <!-- partial:index.partial.html -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Login | Voting System</title>

        <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
        <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet"> -->
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/login.css">

        <link rel="stylesheet" href="assets/css/style.css">
        <!--Stylesheet-->

    </head>

    <body>
        <?php
        
        
    ?>
        <div class="background">
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
        <form method="post">
            <h3>Login</h3>

            <label for="email">Email</label>
            <input type="email" placeholder="user@organization.dormain" id="user_email" name="user_email" required>
            <label for="password">Password</label>
            <input type="password" placeholder="Password" id="password" name="password" required>

            <input type="submit" name="login_button" value="Login" style="margin-top:30px;margin-bottom:30px;" />
            <center>
            <a href="signup.php">Sign up</a>
            </center>
            <?php
        if($error){
            echo "<center><p style\"color:red\"> Check on credentials </p></center>";
        }
        ?>


        </form>
    </body>

    </html>
    <!-- partial -->

</body>

</html>


<!-- logout

function clearSession(){
    session_unset(); // remove all session variables
    session_destroy(); // destroy the session
    echo "Session Cleared";
 }
-->