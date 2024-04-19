<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "votelani";
    try{
        $connection = mysqli_connect($host, $username, $password, $database);
        echo "<script>alert('Welcome to votelani');</script>";
    }
    catch(exception){
        echo "<script>alert('An error occurred, please try again later');</script>";
    }
?>