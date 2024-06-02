<?php
include 'connection.php';

// Get the form data
$voterID = $_POST['voterID'];
$eventID = $_POST['eventID'];
$president = $_POST['PresidentID'];
$chancellor = $_POST['ChancellorID'];
$mp = $_POST['MPID'];

// Insert the data into the database
$sql = "INSERT INTO votes (voteID, EventID, CitizenID, PresidentID, ChancellorID, MPID)
        VALUES ('$voterID', '$eventID' , '$president', '$chancellor', '$mp')";

// push the command to the database
mysqli_query($conn, $sql);

// Close the database connection
mysqli_close($conn);

// Return a response
echo "Vote casted!";
?>