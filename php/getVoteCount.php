<?php
include 'connection.php';

// Get the selected candidate and selection option from the GET request
$selectedCandidate = $_GET['selectedCandidate'];
$selectionOption = $_GET['selectionOption'];
$candidateID = $selectedCandidate;

// Retrieve the vote count from the votes table
$query = "SELECT COUNT($candidateID) as vote_count FROM votes WHERE CandidateID = '$candidateID'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$voteCount = $row['vote_count'];

// Return the vote count in JSON format
echo json_encode(['vote_count' => $voteCount]);

// Close the database connection
mysqli_close($conn);
