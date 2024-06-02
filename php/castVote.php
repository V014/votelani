<?php
include 'connection.php';

// Get the form data
$voterID = $_POST['voterID'];
$eventID = $_POST['eventID'];
$president = $_POST['PresidentID'];
$chancellor = $_POST['ChancellorID'];
$mp = $_POST['MPID'];

// code to get citizen ID from voter ID
$getCitizenID = "SELECT CitizenID FROM citizen WHERE VoterID = '$voterID'";
// push the command to the database
$result = mysqli_query($conn, $getCitizenID);
$row = mysqli_fetch_array($result);
$citizenID = $row['CitizenID'];

// Insert the data into the database
$sql = "INSERT INTO votes (voteID, EventID, CitizenID, PresidentID, ChancellorID, MPID)
        VALUES ('', '$eventID', '$citizenID', '$president', '$chancellor', '$mp')";

// push the command to the database
mysqli_query($conn, $sql);

// Close the database connection
mysqli_close($conn);

// Return a response
echo "Vote casted!";
?>