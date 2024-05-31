<?php
include 'connection.php';

// Get the form data
$voterID = $_POST['voteID'];
$president = $_POST['president-select'];
$chancellor = $_POST['chancellor-select'];
$mp = $_POST['mp'];

// Insert the data into the database
$sql = "INSERT INTO votes (voteID, presidentID, chancellorID, mp)
        VALUES ('$voterID', '$president', '$chancellor', '$mp')";

// push the command to the database
mysqli_query($conn, $sql);

// Close the database connection
mysqli_close($conn);

// Return a response
echo "Vote casted!";

if(isset($_GET['president-select'])){

}
?>