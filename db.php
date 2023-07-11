<?php
//Post parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "chatroom";


//Connect to the database
$conn = mysqli_connect($servername, $username, $password, $database);

//check the connection
if(!$conn){
    die("Failed to connect" . mysqli_connect_error());
}


?>
