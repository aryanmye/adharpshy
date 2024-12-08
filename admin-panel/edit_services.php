<?php
// Include database connection
include 'connection_service.php';

// Get the 'id' and 'table' parameters from the URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$table = isset($_GET['table']) ? $_GET['table'] : '';

if ($id > 0 && !empty($table)) {
    // Fetch service details
    $query = "SELECT * FROM `$table` WHERE `id` = $id";
    $result = mysqli_query($coni, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $service = mysqli_fetch_assoc($result);
    } else {
        die("Service not found.");
    }
} else {
    die("Invalid request.");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Service Details</title>
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
</head>
<body>
<section class="content service-details-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Edit Service Details</h2>
                <form method="post" action="update_service.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($service['id']) ?>">
                    <input type="hidden" name="table" value="<?= htmlspecialchars($table) ?>">
                    
                    <!-- Area Name -->
                    <div class="form-group">
                        <input type="text" name="area_name" id="area_name" class="form-control" 
                               value="<?= htmlspecialchars($service['area_name']) ?>" required />
                    </div>

                    <!-- Service Title -->
                    <div class="form-group">
                        <input type="text" name="service_title" id="service_title" class="form-control" 
                               value="<?= htmlspecialchars($service['service_title']) ?>" required />
                    </div>

                    <!-- Service Name -->
                    <div class="form-group">
                        <input type="text" name="service_name" id="service_name" class="form-control" 
                               value="<?= htmlspecialchars($service['service']) ?>" required />
                    </div>

                    <!-- Publish Date -->
                    <div class="form-group">
                        <input type="date" name="publish_date" id="publish_date" class="form-control" 
                               value="<?= htmlspecialchars($service['publish_date']) ?>" required />
                    </div>

                    <!-- Image Upload -->
                    <div class="form-group">
                        <label for="image">Current Image:</label><br>
                        <img src="upload/<?= htmlspecialchars($service['image_path']) ?>" 
                             alt="Current Image" style="width: 100px; height: auto;">
                        <input type="file" name="image" id="image" class="form-control mt-2" />
                    </div>

                    <!-- Service Description -->
                    <div class="form-group">
                        <textarea name="service_discription" id="service_discription" required><?= htmlspecialchars($service['service_discription']) ?></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Update Service</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    CKEDITOR.replace('service_discription');
</script>

<!-- Essential Scripts -->
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->
</body>
</html>
