<?php
// Include the database connection
include 'connection.php';

// Check if service_id is passed in the POST request
if (isset($_POST['service_id']) && is_numeric($_POST['service_id'])) {
    $service_id = (int)$_POST['service_id'];  // Ensure service_id is an integer

    // Prepare the SQL query to fetch service details
    $sql = "SELECT service_name, service_title, service_disc FROM services WHERE service_id = ?";
    
    // Use prepared statements to avoid SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $service_id); // Bind the service_id parameter as an integer
        $stmt->execute(); // Execute the query
        
        // Get the result
        $result = $stmt->get_result();
        
        // Check if the service exists
        if ($result->num_rows > 0) {
            // Fetch the service details
            $row = $result->fetch_assoc();
            
            // Return the data in JSON format
            echo json_encode([
                'service_title' => $row['service_title'], // Ensure the field name matches your database
                'service_name' => $row['service_name'],
                'service_desc' => $row['service_disc']
            ]);
        } else {
            // If no service found, return an error message
            echo json_encode(['error' => 'Service not found']);
        }
        
        // Close the statement
        $stmt->close();
    } else {
        // If there's an error with the query
        echo json_encode(['error' => 'Database query failed']);
    }
} else {
    // If service_id is not provided or is not a valid number
    echo json_encode(['error' => 'Invalid or missing service ID']);
}

// Close the database connection
$conn->close();
?>
