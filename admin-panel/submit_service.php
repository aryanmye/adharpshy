<?php
include 'connection_service.php';

// Connect to MySQL server to fetch the table names from the 'cities' database
$conn = new mysqli($servername, $username, $password, 'cities'); // Add 'cities' as the database to use

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $area_name = $_POST['area_name'];
    $service_title = $_POST['service_title'];
    $service_name = $_POST['service_name'];
    $service_disc = $_POST['service_disc'];
    $publish_date = $_POST['publish_date'];

    $filename = $_FILES['image']['name'];
    $tmpname = $_FILES['image']['tmp_name'];
    $size = $_FILES['image']['size'];

    $adminPanelUploadPath = "upload/" . basename($filename);
    $externalUploadPath = "../uploado/" . basename($filename);

    if ($size <= 20000000) {
        if (move_uploaded_file($tmpname, $adminPanelUploadPath)) {
            if (copy($adminPanelUploadPath, $externalUploadPath)) {
                $stmt = $conn->prepare("INSERT INTO `$category` (area_name, service_title, service_discription, service, image_path, publish_date) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $area_name, $service_title, $service_disc, $service_name, $filename, $publish_date);

                if ($stmt->execute()) {
                    echo "New Service added successfully!";
                } else {
                    echo "Error: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Failed to upload image to external path.";
            }
        } else {
            echo "Failed to upload image or image size exceeds 20MB.";
        }
    } else {
        echo "Image size exceeds the maximum limit of 20MB.";
    }
    
    $conn->close();
}
?>
