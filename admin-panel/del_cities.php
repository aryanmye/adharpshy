<?php
include 'connection_service.php';

if (isset($_GET['id'])) {
    // Get the database name (or table name) from the GET parameter
    $dbNameToDelete = $_GET['id']; 

    // Ensure the database name is a valid string (for security)
    if (!empty($dbNameToDelete) && preg_match('/^[a-zA-Z0-9_]+$/', $dbNameToDelete)) {
        // Query to delete the database
        $sql3 = "DROP DATABASE `$dbNameToDelete`"; 

        // Execute the query
        $result = mysqli_query($conn, $sql3);

        if ($result) {
            // Redirect back to the dashboard after deletion
            header("Location: dashboard.php"); 
            exit(); // Exit after redirection
        } else {
            // If there's an error, die and show the error message
            die("Error deleting database: " . mysqli_error($conn));
        }
    } else {
        // If the database name is not valid, show an error message
        die("Invalid database name.");
    }
}
?>
