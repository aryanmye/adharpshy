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
    $service_name = $_POST['service_name']; // Ensure this matches the input name
    $service_disc = $_POST['service_disc']; // Ensure this matches the input name
    $is_enabled = isset($_POST['is_enabled']) ? 1 : 0; // Default to 1 if not provided
    
    // Image upload handling
    $filename = $_FILES['image']['name'];
    $tmpname = $_FILES['image']['tmp_name'];
    $size = $_FILES['image']['size'];
    
    // Define upload paths
    $adminPanelUploadPath = "upload/" . basename($filename);  // Inside admin-panel folder
    $externalUploadPath = "../uploado/" . basename($filename);  // Outside admin-panel folder

    // Validate file size (limit: 20MB)
    if ($size <= 20000000) {
        // Move the file to the 'admin-panel' upload folder
        if (move_uploaded_file($tmpname, $adminPanelUploadPath)) {
            // Copy the file to the 'uploado' folder outside the admin-panel
            if (copy($adminPanelUploadPath, $externalUploadPath)) {

                // Prepare and execute SQL query to insert data into the selected city's table
                // Use prepared statements to avoid SQL injection
                $stmt = $conn->prepare("INSERT INTO `$category` (area_name, service_title, service_discription, service, image_path) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $area_name, $service_title, $service_disc, $service_name, $filename);

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
