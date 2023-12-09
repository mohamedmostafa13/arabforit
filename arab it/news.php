<!DOCTYPE html>
<html>

<head>
	<title>news page</title>
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
		
		// Taking all values from the form data(input)
	
		$email = $_REQUEST['email'];
		
		// Performing insert query execution
		// here our table name is news
		$sql = "INSERT INTO news VALUES ('$email')";
		
        if(mysqli_query($conn, $sql)){
            header("Location: index.php");
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
