<?php
include 'connection_service.php';
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id']) && isset($_GET['service']) && isset($_GET['created_at']) && isset($_GET['table'])) {
    $id = $_GET['id'];
    $service = $_GET['service'];
    $created_at = $_GET['created_at'];
    $table = $_GET['table'];

    // Query to get the current 'is_enabled' status based on id, service, and created_at
    $sql = "SELECT is_enabled FROM `$table` WHERE id = ? AND service = ? AND created_at = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $id, $service, $created_at);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentStatus = $row['is_enabled'];

        // Toggle the 'is_enabled' value
        $newStatus = ($currentStatus == 1) ? 0 : 1;

        // Update the database with the new 'is_enabled' value
        $updateSql = "UPDATE `$table` SET is_enabled = ? WHERE id = ? AND service = ? AND created_at = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("iiss", $newStatus, $id, $service, $created_at);
        $updateStmt->execute();

        // Redirect back to the page where the services are displayed
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Service not found.";
    }
} else {
    echo "Invalid parameters.";
}

$conn->close();
?>
