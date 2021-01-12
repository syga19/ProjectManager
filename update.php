<?php
    $servername = "localhost";
	$username = "root";
	$password = "mysql";
	$db = "crud";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $db);

  if (isset($_POST['update'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$project = $_POST['project_id'];
	$sql =  "UPDATE employee SET project_id='$project'WHERE id=$id";
	$que = "UPDATE employee SET name='$name' WHERE id=$id";
    //liepa sql'ui padaryt tą ką į "que" kintamąjį 
    //kadangi jokio rezultato nereikia tai iškart executint
	// tas pats cia kaip workbenche enter paspaust 
	$stmt = $conn->prepare($que);
    $stmt->execute();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
	header('location: index.php');
}

?>



	