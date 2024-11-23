<?php
include('connection_service.php');

if (isset($_GET['db']) && isset($_GET['table']) && isset($_GET['id']) && isset($_GET['service'])) {
    // Capture parameters from the URL
    $db = $_GET['db'];
    $table = $_GET['table'];
    $id = intval($_GET['id']); // Ensure ID is treated as an integer
    $service = $_GET['service'];
    
    // Sanitize database and table names to prevent SQL injection
    $db = mysqli_real_escape_string($coni, $db);
    $table = mysqli_real_escape_string($coni, $table);
    $service = mysqli_real_escape_string($coni, $service);
    
    // Connect to the specified database
    mysqli_select_db($coni, $db);
    
    // Delete query with dynamic table, ID, and service filtering
    $sql = "DELETE FROM `$table` WHERE `id` = '$id' AND `service` = '$service'";
    $result = mysqli_query($coni, $sql);

    if ($result) {
      
        echo '<div class="floating-box">
                <h2>Notice</h2>
                <p>Service Successfully Deleted.</p>
                <button onclick="goBack()">Go Back</button>
              </div>
              
              
                  <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .floating-box {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            text-align: center;
        }

        .floating-box h2 {
            margin: 0 0 10px;
            color: #333;
        }

        .floating-box p {
            margin: 0 0 20px;
            color: #555;
        }

        .floating-box button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .floating-box button:hover {
            background-color: #0056b3;
        }
    </style>


    
              
              
              
              ';

        
                  

        
    } else {
        echo "Error deleting record: " . mysqli_error($coni);
    }
} else {
    echo "Required parameters (db, table, id, service) are missing.";
}
?>
    <script>
        function goBack() {
            history.back(); // Navigate to the previous page
        }
    </script>
