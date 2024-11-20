<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $content = $_POST['content'];

    // Image upload
    $filename = $_FILES['image']['name'];
    $tmpname = $_FILES['image']['tmp_name'];
    $size = $_FILES['image']['size'];

    // Define the paths for both upload locations
    $adminPanelUploadPath = "upload/" . $filename;  // Inside admin-panel folder
    $externalUploadPath = "../uploado/" . $filename;  // Outside admin-panel folder

    if ($size <= 20000000) {
        // Move the file to the 'admin-panel' upload folder
        if (move_uploaded_file($tmpname, $adminPanelUploadPath)) {
            // Copy the file to the 'uploado' folder outside the admin-panel
            if (copy($adminPanelUploadPath, $externalUploadPath)) {
                // Now insert the data into the database
                $sql = "INSERT INTO blogs (title, author, category, content, image, is_enabled) 
                        VALUES ('$title', '$author', '$category', '$content', '$filename', '1')";

                if (mysqli_query($conn, $sql)) {
                    echo "New blog post created successfully!";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "Failed to copy the image to the external 'uploado' folder.";
            }
        } else {
            echo "Failed to upload image to the 'admin-panel' folder.";
        }
    } else {
        echo "Image size exceeds 20MB.";
    }
}
?>
