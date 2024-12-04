<?php
include 'connection_service.php';

// Connect to the main 'cities' database
$mainDb = "cities";
$conn = new mysqli($servername, $username, $password, $mainDb);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $city = trim($_POST['city']);
    $city_table_name = preg_replace('/[^A-Za-z0-9_]/', '_', strtolower($city));

    $sqlCreateTable = "CREATE TABLE IF NOT EXISTS `$city_table_name` (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        area_name VARCHAR(255) NOT NULL,
        service VARCHAR(255),
        service_title VARCHAR(255),
        service_discription TEXT,
        image_path LONGBLOB,
        is_enabled BINARY(1) DEFAULT 1 NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        publish_date date
    )";

    if ($conn->query($sqlCreateTable) === TRUE) {
        echo "Table '$city_table_name' created successfully in the 'cities' database!";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

$conn->close();
?>
