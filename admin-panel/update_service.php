<?php
// Include database connection
include 'connection_service.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $id = $_POST['id'];
    $table = $_POST['table'];
    $service_title = $_POST['service_title'];
    $service_name = $_POST['service_name'];
    $area_name = $_POST['area_name'];
    $publish_date = $_POST['publish_date'];
    $service_description = $_POST['service_discription']; // Use this name

    // Image upload handling
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        $tmpname = $_FILES['image']['tmp_name'];
        $size = $_FILES['image']['size'];

        // Define the image upload path
        $imagePath = "../uploado/" . $image;

        // Check file size limit
        if ($size <= 20000000) {  // 20MB size limit
            // Move the uploaded image
            if (!move_uploaded_file($tmpname, $imagePath)) {
                echo "Error uploading image.";
                exit();
            }
        } else {
            echo "Image size exceeds 20MB.";
            exit();
        }
    } else {
        // No new image uploaded; retain the existing image
        $image = isset($_POST['existing_image']) ? $_POST['existing_image'] : '';
    }

    // Prepare the update query
    $query = "UPDATE `$table` SET service_title = ?, service = ?, area_name = ?, service_discription = ?, publish_date = ?" .
             ($image ? ", image_path = ?" : "") . 
             " WHERE id = ?";
    $stmt = $coni->prepare($query);

    if ($stmt) {
        // Bind parameters
        $params = [$service_title, $service_name, $area_name, $service_description, $publish_date];
        if ($image) $params[] = $image;
        $params[] = $id;  // Last parameter is the ID

        // Determine the types of the bind variables
        $types = str_repeat('s', count($params));
        $stmt->bind_param($types, ...$params);

        // Execute the query
        if ($stmt->execute()) {
            // echo "Service updated successfully!";
            echo "<script>window.location.href='manage_services.php';</script>";
        } else {
            echo "Error updating service: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $coni->error;
    }
}

// Close the database connection
$coni->close();
?>
