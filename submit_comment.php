<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first = $_POST['firstname'];
    $last = $_POST['lastname'];
    $email = $_POST['email'];
    $content = $_POST['message'];



        $sql = "INSERT INTO customer_comment (firstname, lastname, email, message) 
                VALUES ('$first', '$last', '$email', '$content')";

        if (mysqli_query($conn, $sql)) {
           $commentStatus='success';
        } else {
            $commentStatus='error';
        }
    } else {
        echo "Failed to post comment";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Submission</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>


<!-- Bootstrap Modal for Success/Error Message -->
<?php if ($commentStatus == 'success'): ?>
    <div class="modal fade show" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true" style="display: block;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commentModalLabel">Comment Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <!-- Success Message with Green Tick -->
                    <i class="fas fa-check-circle fa-3x text-success"></i>
                    <h4 class="mt-3">Your comment has been posted successfully!</h4>
                </div>
                <div class="modal-footer">
                    <a href="javascript:history.back()" class="btn btn-secondary">Go Back</a>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php elseif ($commentStatus == 'error'): ?>
    <div class="modal fade show" id="commentModalError" tabindex="-1" aria-labelledby="commentModalLabelError" aria-hidden="true" style="display: block;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commentModalLabelError">Comment Error</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <!-- Error Message with Red Cross -->
                    <i class="fas fa-times-circle fa-3x text-danger"></i>
                    <h4 class="mt-3">Something went wrong. Please try again.</h4>
                    <p class="text-muted"><?= $errorMessage ?? '' ?></p>
                </div>
                <div class="modal-footer">
                    <a href="javascript:history.back()" class="btn btn-secondary">Go Back</a>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- jQuery, Popper, and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>