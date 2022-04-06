<?php
 session_start();
 require("database/connection.php");

 if(isset($_SESSION["username"])){
  header("Location: nalika/index.php");

 }
 if(isset($_POST['user_signup'])) {
  $password = $_POST['user_password'];
  $user_email = $_POST['user_email'];
  $user_name = $_POST['user_name'];
  $other_name = $_POST['other_name'];
  
  $check_rec = "SELECT id FROM User where user_email=\"".$user_email."\"";
  $user_results = $conn->query($check_rec);
    if($user_results->num_rows > 0){
      $error = true;
    }
    else{
      $error = false;
      $encr_pass = crypt($password,"ioahc7t(68809q8r%6xq)");
      $save_rec = "INSERT INTO User(first_name,other_name,user_email,user_password) VALUES (\"".$user_name."\",\"".$other_name."\",\"".$user_email."\",\"".$encr_pass."\") ";
  
      if($conn->query($save_rec) === TRUE){
        $result = $conn->query($check_rec);
        if($result->num_rows > 0){
          $_SESSION["username"] = $name_z;
          header("Location: nalika/index.php");

          // while($row = $result->fetch_assoc()){
              // echo $row["user_name"]." has been saved" ;
          // }
      }
      }
      else{
        echo $conn->error;
      }  
  }
  #325
 
  // $city = $_POST['reg_city'];

  // if(validateUser($username,$password) == 0 ){
  //     echo "<p style=\"color:green;\"> Auth details valid in $city</p>";
  // }
  // else{
  //     echo "<p style=\"color:red;\"> Auth failed in $city</p>";
  // }
 }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Sign Up | Voting System</title>
    <link rel="icon" url="favicon.ico">

</head>

<body style="background:url(signup.jpg);
background-repeat:no-repeat;
background-size:cover;">
    <center>
    <div style="padding-top:10vh;
    background: #4568DC;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #B06AB3, #4568DC);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #B06AB3, #4568DC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    width: 600px;
    margin-top:40px;
    border-radius:15px;
    ">
        <p id="db_connnection"></p>
        <center>
            <h2>SIGNUP</h2>
            <hr style="margin-left:20%;margin-right:20%;">

        </center>
        <form method="post" style="padding-left:20%;padding-right:20%; ">
            <label for="user_name">First Name</label>
            <input type="text" name="user_name" id="user_name" class="form-control" required placeholder="Mendel"
                maxlength="20"><br>
                <label for="user_name">Other Name</label>
            <input type="text" name="other_name" id="other_name" class="form-control" required placeholder="Mendel"
            <br><br>
            <label for="Email">Email</label><br>
            <input type="email" name="user_email" id="user_email" class="form-control" required placeholder="Email"><br>
            <label for="password">password</label><br>
            <input type="password" name="user_password" class="form-control" id="user_password" required><br><br>
            <center>
                <button class="btn btn-info" name="user_signup" type="submit" style="width:70%">Sign Up</button>
            </center><br>
            <center>
                <button class="btn btn-danger" name="user_login" type="submit" style="width:70%"><a href="login.php" style="color:white; text-decoration:none;">Login</a></button>
            </center><br>
            
            <p>
                <?php
              // echo $user_email." ----- ".crypt($password,"voting04576dertr")
              if($error){
                echo "<i style=\"color:red\"> There exist a user with similar credentials</i>";
              }
              else{
                // echo "<i style=\"color:green\"> creating user</i>";
              }
            ?>
            </p>
        </form>

    </div>
    </center>

</body>

</html>
