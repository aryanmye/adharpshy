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
    
    // Image upload handling
    $filename = $_FILES['image']['name'];
    $tmpname = $_FILES['image']['tmp_name'];
    $size = $_FILES['image']['size'];
    $destination = "upload/" . $filename;

    if ($size <= 20000000 && move_uploaded_file($tmpname, $destination)) {
        // Insert data into the selected city's table
        $conn = new mysqli($servername, $username, $password, 'cities'); // Reconnect to the 'cities' database

        // SQL query to insert data into the selected city's table (category)
        $sql = "INSERT INTO `$category` (area_name, service_title, service_discription, service, image_path)
                VALUES ('$area_name', '$service_title', '$service', '$service_discription', '$destination')";

        if (mysqli_query($conn, $sql)) {
            echo "New blog post created successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        $conn->close();
    } else {
        echo "Failed to upload image or image size exceeds 20MB.";
    }
}


?>
