<?php  include('add_two.php'); ?>
<?php require_once 'update_p.php';?>
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

<?php
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $db = "crud";
    $conn = mysqli_connect($servername, $username, $password, $db);
    if (isset($_GET['update'])) {
        $id = $_GET['update'];
        $name = $_GET['name'];
        $update = true;
        $record = mysqli_query($conn, "SELECT * FROM project WHERE id='$id'");
    }
?>
<div style="margin: 1rem;">
	<form method="POST" action="update_p.php" >
        <input type="hidden" name="id" value="<?php echo $id; ?>">
		<input type="text" name="name" value="<?php echo $name; ?>">
	    <button class="btn" type="submit" name="update" style="background: #AB80F0;" >UPDATE</button>
	</form>
</div>

<table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Project Name</th>
            <th>Employees</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
          $servername = "localhost";
          $username = "root";
          $password = "mysql";
          $db = "crud";
            $sql = "SELECT project.id as id,
            project.name as project,
            group_concat(employee.name) as name
            FROM employee
            RIGHT JOIN Project
            ON employee.project_id = project.id
            GROUP by project.id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    print ('<tr><td>' . $row["id"] . '</td><td>' . $row["project"] . 
                    " " . '</td><td>' . $row["name"] . '</td><td>' . " " 
                    . '<a href="?action=deletePro&id='  . $row['id'] . '"><button style="background: #AB80F0; padding: 3px;">DELETE</button></a>' . " " 
                    . '<a href="projects.php?update=' . $row['id']
                    . '&name='.$row['project'] . '"><button style="background: #AB80F0; padding: 3px;">UPDATE</button></a>' . 
                    '</td></tr>');
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
	<form method="POST" action="add_two.php" >
		<input type="text" name="name" placeholder="Enter new project">
		<button class="btn" type="submit" name="add" style="background: #AB80F0;" >ADD</button>
	</form>
    </div>
</body>
</html>