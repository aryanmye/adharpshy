<?php
include 'connection_service.php';

if (isset($_GET['db']) && isset($_GET['table']) && isset($_GET['id']) && isset($_GET['service'])) {
    // Capture parameters from the URL
    $db = $_GET['db'];
    $table = $_GET['table'];
    $id = intval($_GET['id']); // Ensure ID is treated as an integer
    $service = $_GET['service'];
    
    // Sanitize database and table names to prevent SQL injection
    $db = mysqli_real_escape_string($conn, $db);
    $table = mysqli_real_escape_string($conn, $table);
    $service = mysqli_real_escape_string($conn, $service);
    
    // Connect to the specified database
    mysqli_select_db($conn, $db);
    
    // Delete query with dynamic table, ID, and service filtering
    $sql = "DELETE FROM `$table` WHERE `id` = '$id' AND `service` = '$service'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<div class='alert alert-primary' role='alert'>
                This is a primary alert—check it out!
                <a href='manage_services.php' class='btn btn-primary ml-3'>Go Back</a>
              </div>";
                  

        
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Required parameters (db, table, id, service) are missing.";
}
?>
