<?php include 'add.php'; ?>
<?php require_once 'update.php'; ?>
<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$db = "crud";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//issikvieti delete.php
require_once 'delete.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets\scss\main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<header>
    <div class="line">
        <h2><a href="index.php">Employees</a></h2>
        <h2><a href="projects.php">Projects</a></h2>
    </div>
</header>
<!-- update -->
<?php
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $db = "crud";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);
    if (isset($_GET['update'])) {
        $id = $_GET['update'];
        $name = $_GET['name'];
        $project = $_GET['project_id'];
        $update = true;
        $record = mysqli_query($conn, "SELECT * FROM employee WHERE id='$id'");

    }

?>
<!-- Bandau select pasidaryt -->
<?php
  $servername = "localhost";
  $username = "root";
  $password = "mysql";
  $db = "crud";
  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $db);
  function all_projects($conn) {
      $output = '';
      $sql = "SELECT name, id FROM project";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_array($result)) {
          $output .= '<option value="'.$row["id"] . '">'.$row["name"].'</option>';
      }
      return $output;
  }
?>

<div style="margin: 1rem;">
	<form method="POST" action="update.php" >
        <input type="hidden" name="id" value="<?php echo $id; ?>">
		<input type="text" name="name" value="<?php echo $name; ?>">
        <select name="project_id" id="project_id" >
            <option value="0">Projects</option>
            <?php echo all_projects($conn); ?>
        </select>
	    <button class="btn" type="submit" name="update" style="background: #AB80F0;" >UPDATE</button>
	</form>
</div>

<div>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Employee</th>
            <th>Projects</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$db = "crud";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT employee.id as id,
     employee.name as employee,
     project.id as project_id,
     project.name as project
     FROM crud.employee
     LEFT JOIN Project
     ON employee.project_id = project.id;";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        print('<tr><td>' . $row["id"] . '</td><td>'
        . $row["employee"] . " " . '</td><td>'
        . $row["project"] . '</td><td>' . " "
        . '<a href="?action=deleteEmpl&id='
        . $row['id'] . '"><button style="background: #AB80F0; padding: 3px;">DELETE</button></a>'
        . " " . '<a href="index.php?update=' . $row['id']
        . '&name='.$row['employee']. '&project='.$row['project'].' "><button style="background: #AB80F0; padding: 3px;">UPDATE</button></a>' . '</td></tr>');
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
    </tbody>
</table>
<?php while ($row) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="add.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</div>

    <div style="margin: 1rem;">
	<form method="POST" action="add.php" >
		<input type="text" name="name" placeholder="Enter new employee">
		<button class="btn" type="submit" name="add" style="background: #AB80F0;" >ADD</button>
	</form>
    </div>




</body>
</html>
