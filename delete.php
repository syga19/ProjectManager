<?php
    if(isset($_GET['action']) and $_GET['action'] == 'deleteEmpl'){
        $sql = 'DELETE FROM employee WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $_GET['id']);
        $res = $stmt->execute();

        $stmt->close();
        mysqli_close($conn);

        header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
        die();
    }

   if(isset($_GET['action']) and $_GET['action'] == 'deletePro'){
    $sql = 'DELETE FROM Project WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $_GET['id']);
    $res = $stmt->execute();

    $stmt->close();
    mysqli_close($conn);

    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
    die();
}
?>