<?php
include 'connection.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize inputs
    $service_title = mysqli_real_escape_string($conn, $_POST['service_title']);
    $service_name = mysqli_real_escape_string($conn, $_POST['service_name']);
    $service_disc = mysqli_real_escape_string($conn, $_POST['service_disc']); // Corrected typo from "servoce_disc"

    // Insert the data into the database
    $sql = "INSERT INTO services (service_title, service_name, service_disc) 
            VALUES ('$service_title', '$service_name', '$service_disc')";

    if (mysqli_query($conn, $sql)) {
        echo "New service post created successfully!";
    } else {
        echo "Database Error: " . mysqli_error($conn);
    }
}
?>
