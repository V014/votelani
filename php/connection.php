<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "votelani";
    try{
        $conn = mysqli_connect($host, $username, $password, $database);
    }
    catch(exception){
        echo "<script>alert('An error occurred, please try again later');</script>";
    }
?>