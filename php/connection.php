<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "votelani";
    try{
        $connection = mysqli_connect($host, $username, $password, $database) 
        or die ("We're experiencing a problem, please try again later");
    }
    catch(exception){
        echo "<script>alert('An error occurred, please try again later');</script>";
    }
?>