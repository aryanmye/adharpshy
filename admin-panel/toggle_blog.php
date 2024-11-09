<?php
session_start();
include('connection.php');

if (isset($_GET['blog_id']) && isset($_GET['current_status'])) {
    $blog_id = intval($_GET['blog_id']);
    $current_status = intval($_GET['current_status']);
    
    // Determine the new status
    $new_status = $current_status ? 0 : 1;
    
    // Update the database
    $update_query = "UPDATE blogs SET is_enabled = ? WHERE blog_id = ?";
    if ($stmt = $conn->prepare($update_query)) {
        $stmt->bind_param("ii", $new_status, $blog_id);
        if ($stmt->execute()) {
            $_SESSION['message'] = "Blog status updated successfully.";
        } else {
            $_SESSION['message'] = "Failed to update blog status.";
        }
        $stmt->close();
    } else {
        $_SESSION['message'] = "Failed to prepare update query.";
    }
} else {
    $_SESSION['message'] = "Invalid request.";
}

// Redirect back to the blog list page
header("Location: blog_dashboard.php");
exit();
