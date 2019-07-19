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
	
	$Email = mysqli_real_escape_string($conn, $_GET['email']);
	$Password = mysqli_real_escape_string($conn, $_GET['password']);
	$sql = "SELECT password FROM accounts WHERE email = $Email";
	$result = mysqli_query($conn,$sql);
		if(empty($Email) || empty($Password))
		{
			ob_flush();
			header("Location: loginFail.html");
			ob_end_flush();
			die();
		}
			$row = mysqli_fetch_array($result);
			$resPass = $row['password'];
			
			$pass1 = (string)$resPass;
			$pass2 = (String)$Password;
			
			if($pass1 == $pass2)
			{
				die("Success: Correct Password");
			}
			else
			{
				die("Fail : " . $pass2 . $pass2);
			}  

	
		
	

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