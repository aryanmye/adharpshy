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
    // Get form data
    $category = $_POST['category']; // The selected city/database
    $area_name = $_POST['area_name'];
    $service_title = $_POST['service_title'];
    $service = $_POST['service'];
    $service_discription = $_POST['service_discription'];
    $is_enabled = isset($_POST['is_enabled']) ? 1 : 0; // Default to 1 if not provided
    
    // Image upload handling
    $filename = $_FILES['image']['name'];
    $tmpname = $_FILES['image']['tmp_name'];
    $size = $_FILES['image']['size'];
    $adminPanelUploadPath = "upload/" . $filename;  // Inside admin-panel folder
    $externalUploadPath = "../uploado/" . $filename;  // Outside admin-panel folder

    if ($size <= 20000000) {
        // Move the file to the 'admin-panel' upload folder
        if (move_uploaded_file($tmpname, $adminPanelUploadPath)) {
            // Copy the file to the 'uploado' folder outside the admin-panel
            if (copy($adminPanelUploadPath, $externalUploadPath)) {
        $conn = new mysqli($servername, $username, $password, 'cities'); // Reconnect to the 'cities' database

        // SQL query to insert data into the selected city's table (category)
        $sql = "INSERT INTO `$category` (area_name, service_title, service_discription, service, image_path)
                VALUES ('$area_name', '$service_title', '$service_discription', '$service', '$filename')";

        if (mysqli_query($conn, $sql)) {
            echo "New Service added successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        $conn->close();
    } else {
        echo "Failed to upload image or image size exceeds 20MB.";
    }
}
    }}
?>
