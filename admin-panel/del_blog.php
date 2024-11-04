<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure the ID is treated as an integer to prevent SQL injection
    $sql3 = "DELETE FROM blogs WHERE blog_id = '$id'";
    $result = mysqli_query($conn, $sql3);

    if ($result) {
        header("Location: blog_dashboard.php"); // Redirect back to the blog dashboard after deletion
        exit(); // Make sure to exit after redirection
    } else {
        die("Error deleting record: " . mysqli_error($conn));
    }
}
?>
