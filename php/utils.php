<?php
// this function escapes user input with dangerous code
function escTxt($connection, $string) {
	$result = mysqli_real_escape_string($connection, $string);
	return $result;
}
// this function redirects the user to a different page
function redirect_to($new_location) {
	header("Location: ". $new_location);
	exit();
}
// this function deletes a row, takes in an ID and a table name.
function deleteInfo($id, $tableName) {
	$deleteStmt = "DELETE FROM $tableName WHERE `Id` = $id"; 
	return $deleteStmt;
}
// this function selects info, takes in an array and table name
function buildInsert($fields, $tableName) {
	$columns = implode(', ', array_keys($fields));
	$values = implode(', ', array_values($fields)); 
	$stmt = "INSERT INTO $tableName VALUES ($values)";
	return $stmt;
}
// this function updates info, takes in an arrat and table name
function updateInsert($field, $string, $tableName, $id) {
	$columns = implode(', ', array_values($fields));
	$text = implode(', ', array_values($string));
	$stmt = "UPDATE $tableName SET $columns = $text WHERE Id = $id";
	return $stmt;
}
?>