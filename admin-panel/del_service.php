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
      
        echo "<!-- Bootstrap CSS Link -->
        <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>

        <!-- Success Modal -->
        <div class='modal fade' id='successModal' tabindex='-1' role='dialog' aria-labelledby='successModalLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='successModalLabel'>Success</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <p>Record deleted successfully!</p>
                    </div>
                    <div class='modal-footer'>
                        <a href='manage_services.php' class='btn btn-primary'>Go Back</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- JQuery, Bootstrap JS, and Popper.js -->
        <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js'></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
            <!-- JQuery and Scripts -->
    <script src='assets/bundles/libscripts.bundle.js'></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
    <script src='assets/bundles/vendorscripts.bundle.js'></script> <!-- slimscroll, waves Scripts Plugin Js -->
    <script src='assets/bundles/jvectormap.bundle.js'></script> <!-- JVectorMap Plugin Js -->
    <script src='assets/bundles/sparkline.bundle.js'></script> <!-- Sparkline Plugin Js -->
    <script src='assets/bundles/c3.bundle.js'></script>
   
    <script src='assets/js/pages/index.js'></script>
    <script src='assets/bundles/mainscripts.bundle.js'></script> 
        
        <script>
            // Automatically open the success modal after deletion
            $(document).ready(function() {
                $('#successModal').modal('show');
            });
        </script>";
    
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
