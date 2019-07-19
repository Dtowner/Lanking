<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "lanking_test";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	$Email = mysqli_real_escape_string($conn, $_POST['email']);
	$Password = mysqli_real_escape_string($conn, $_POST['password']);
		
	// $sql = 'SELECT password FROM lanking_test WHERE email = $Email';
	$sql = "SELECT password FROM accounts WHERE email = $Email";
	$result = mysqli_query($conn,$sql);
	
		if($result == $Password)
		{
			ob_flush();
			header("Location: description.html");
			ob_end_flush();
			die();
		}
		else
		{
			ob_flush();
			header("Location: search.html");
			ob_end_flush();
			die();
		}
		if(empty($Email) || empty($Password))
		{
			ob_flush();
			header("Location: loginFail.html");
			ob_end_flush();
			die();
		}
		/* else if( )
		{
			// Find corresponding id to email and check if password is correct
		} */
		
	

	if ($conn->query($sql) === TRUE) 
	{
		// echo "New record created successfully";
	} 
	else 
	{
		// echo "Error: " . $sql . "<br>" . $conn->error;
	} 
	$conn->close();
	
	ob_flush();
	header("Location: account.html");
	ob_end_flush();
	die();  
?>