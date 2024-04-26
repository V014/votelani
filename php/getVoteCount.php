<?php 
include 'connection.php';

// Get the selected candidate and selection option from the GET request
$selectedCandidate = $_GET['selectedCandidate'];
$selectionOption = $_GET['selectionOption'];


 // Query the database
 $query = "SELECT COUNT[$selectionOption] FROM `event` WHERE candidate = '$selectedCandidate'";

 $result = mysqli_query($connection, $query);

 // Fetch the data
 $data = '';
 while ($row = mysqli_fetch_assoc($result)) {
    $data .= '<p>' . $row['myField'] . '</p>';
 }

 // Close the connection
 mysqli_close($connection);
 echo $data;
?>