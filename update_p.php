<?php
    $servername = "localhost";
	$username = "root";
	$password = "mysql";
	$db = "crud";
	$conn = mysqli_connect($servername, $username, $password, $db);

  if (isset($_POST['update'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$que = "UPDATE project SET name='$name' WHERE id=$id";
    //liepa sql'ui padaryt tą ką į "que" kintamąjį 
    //kadangi jokio rezultato nereikia tai iškart executint
	// tas pats cia kaip workbenche enter paspaust 
	$stmt = $conn->prepare($que);
	$stmt->execute();
	header('location: projects.php');
}

?>
