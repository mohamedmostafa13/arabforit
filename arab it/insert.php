<!DOCTYPE html>
<html>

<head>
	<title>Insert page</title>
</head>

<body>
	<center>
		<?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => testo
		$conn = mysqli_connect("localhost", "root", "", "laravel");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 4 values from the form data(input)
		$full_name = $_REQUEST['name'];
		$subject = $_REQUEST['subject'];
		$message = $_REQUEST['message'];
		$email = $_REQUEST['email'];
		
		// Performing insert query execution
		// here our table name is feedback
		$sql = "INSERT INTO feedback VALUES (null,'$full_name', 
			'$email','$subject','$message')";
		
        if(mysqli_query($conn, $sql)){
            header("Location: contact.php");
            exit();
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
		
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>
