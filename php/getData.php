<?php 
include 'connection.php';

// get the selected value from the Get request
$selectedValue = $_GET['selectedValue'];

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