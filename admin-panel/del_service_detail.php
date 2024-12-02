<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure ID is an integer to prevent SQL injection

    $sql3 = "DELETE FROM services WHERE service_id = '$id'";
    if (mysqli_query($conn, $sql3)) {
        echo "
        <!-- Bootstrap CSS Link -->
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
                        <a href='table_service_detail.php' class='btn btn-primary'>Go Back</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- JQuery, Bootstrap JS, and Popper.js -->
        <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js'></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
        
        <script>
            // Automatically open the success modal after deletion
            $(document).ready(function() {
                $('#successModal').modal('show');
            });
        </script>
        ";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "No ID provided";
}
?>
