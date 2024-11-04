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
    $destination = "upload/" . $filename;

    if ($size <= 20000000 && move_uploaded_file($tmpname, $destination)) {
        $sql = "INSERT INTO blogs (title, author, category, content, image, display) 
                VALUES ('$title', '$author', '$category', '$content', '$filename', '1')";

        if (mysqli_query($conn, $sql)) {
            echo "New blog post created successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload image or image size exceeds 20MB.";
    }
}
?>
