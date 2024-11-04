<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['blog_id'])) {
    $blogId = (int)$_POST['blog_id']; // Ensure blog ID is an integer

    // Fetch the current status of the blog
    $query = "SELECT is_enabled FROM blogs WHERE blog_id = $blogId";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $newStatus = $row['is_enabled'] ? 0 : 1; // Toggle status
            $updateQuery = "UPDATE blogs SET is_enabled = $newStatus WHERE blog_id = $blogId";
            
            if (mysqli_query($conn, $updateQuery)) {
                // Optionally, you can set a success message in session or redirect
                echo "Blog status updated successfully.";
            } else {
                echo "Error updating status: " . mysqli_error($conn);
            }
        } else {
            echo "Blog not found.";
        }
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }
}

// Redirect back to the blog dashboard
header("Location: blog_dashboard.php");
exit();
?>
