<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "lanking_test";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	$First = mysqli_real_escape_string($conn, $_POST['first_name']);
	$Last = mysqli_real_escape_string($conn, $_POST['last_name']);
	$Email = mysqli_real_escape_string($conn, $_POST['email']);
	$Password = mysqli_real_escape_string($conn, $_POST['password']);
		
	$sql = "INSERT INTO Accounts (First_Name, Last_Name, Email, Password) VALUES ('$First', '$Last', '$Email', '$Password')";

	if ($conn->query($sql) === TRUE) 
	{
		echo "New record created successfully";
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>