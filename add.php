<?php 
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "mysql";
	$db = "crud";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $db);
	
	// initialize variables
	$name = "";
	$id = 0;
	$update = false;

	if (isset($_POST['add'])) {
		$name = $_POST['name'];;

		mysqli_query($conn, "INSERT INTO employee (name) VALUES ('$name')"); 
		header('location: index.php');
	}
	
	// if (isset($_POST['add'])) {
	// 	$name = $_POST['name'];;

	// 	mysqli_query($conn, "INSERT INTO project (name) VALUES ('$name')"); 
	// 	header('location: projects.php');
	// }
	
?>
