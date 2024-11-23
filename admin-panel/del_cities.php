<?php
include 'connection_service.php';

if (isset($_GET['id'])) {
    $dbNameToDelete = $_GET['id']; 

    if (!empty($dbNameToDelete) && preg_match('/^[a-zA-Z0-9_]+$/', $dbNameToDelete)) {
        $sql3 = "DROP DATABASE `$dbNameToDelete`"; 

        $result = mysqli_query($conn, $sql3);

        if ($result) {
            header("Location: dashboard.php"); 
            exit(); 
        } else {
           
            die("Error deleting database: " . mysqli_error($conn));
        }
    } else {
        
        die("Invalid database name.");
    }
}
?>
