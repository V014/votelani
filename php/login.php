<?php
session_start();
include ('connection.php');
include ('utils.php');

if(isset($_POST['login'])){
	$Username = esctxt($connection, $_POST["Username"]);
	$Password = esctxt($connection, $_POST["Password"]);
	$hash = password_hash($Password, PASSWORD_BCRYPT);
	date_default_timezone_set("Africa/Blantyre");
	$DateTime = date('Y-m-d H:i:s');
	
	$querylogin = $connection->query("SELECT `ID`, `Password` FROM students WHERE `Username` = '$Username'");
	if ($querylogin->num_rows > 0)
		$data = $querylogin->fetch_array();
		$_SESSION['ID'] = $data['ID'];
		$ID = $_SESSION['ID'];
		// check to see if there is a valid result
		if(password_verify($Password, $data['Password'])){
			$queryLog = $connection->query("UPDATE `students` SET `LastEntry` = '$DateTime' WHERE `ID` = $ID");
			if($queryLog == true)
				header ("Location: ../../home.php"); // redirect to home if valid
				exit();
			}
		else
			$_SESSION['login'] = "Incorrect credentials!";
			$_SESSION['alert'] = "alert-danger";
			header ("Location: ../../index.php"); // redirect to login if invalid
			exit();
	} 
?>