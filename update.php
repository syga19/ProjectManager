<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $db = "crud";

    if (isset($_GET['update']) and $_GET['action'] == 'update'){
        $id = $_GET['update'];
        $sql = 'SELECT * FROM employee WHERE id=$id"';
        if (count($result)==1){
            $row = $result->fetch_array();
            $name = $row['name'];
        }
    }
    
?>