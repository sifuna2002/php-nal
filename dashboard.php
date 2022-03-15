<?php
session_start();
if(isset($_POST["clear"])){
    session_unset(); // remove all session variables
    session_destroy(); // destroy the session
}
require("database/connection.php");

if(isset($_SESSION["username"])){
    $c = $_SESSION["username"];
    setcookie("user_cookie","$c",time() + 10,'/');
}
else{
    header("Location: login.php");
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Voting system</title>
</head>
<body>
        <h5>
            <?php
            if(isset($_SESSION["username"])){
                echo "@".$_SESSION["username"];
            }
            ?>
        </h5>


        <form method="post">
        <button name="clear">Logout
        </button>
        </form>
    
</body>
</html>