<?php
$servername = "127.0.0.1";
$username="root";
$password="";

$conn = new mysqli($servername,$username,$password,"db");
if($conn->connect_error){
    die("<i style\"color:red\">Connection failed :</i> ". $conn->connect_error);
}
else{
//  echo "<i style=\"color:green\">Connection Successful</i>";
    /*
    $create_db = "CREATE DATABASE voting_system";
    if($conn->query($create_db) === TRUE){
        echo "DB created successfully";
    }
    else{
        echo "Error creating DB : ".$conn->error;
    }

    // create table

    $create_table = "CREATE TABLE User(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(30) NOT NULL,
    user_email VARCHAR(30) NOT NULL,
    user_password VARCHAR(256) NOT NULL   
    )";

    if($conn->query($create_table) == TRUE){
        echo "table created";
    }
    else{
        echo "Error creating table : ".$conn_>error;
    }
    
    */

}

?>
