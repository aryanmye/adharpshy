<?php
// Connection variables
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password

// Create a new connection
$conni = new mysqli($servername, $username, $password, 'adharblog');

// Check for connection errors
if ($conni->connect_error) {
    die("Connection failed: " . $conni->connect_error);
}
?>




<section class="content service-details-page">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Service Detail Post</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> AdharPsych</a></li>
                        <li class="breadcrumb-item"><a href="service-details-dashboard.php">Service Details</a></li>
                        <li class="breadcrumb-item active">New Post</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" action="submit_service_detail.php">
                        <div class="card">
                            <div class="body">
                                <!-- Select Service -->
                                <div class="form-group">
                                    <label for="service_select">Select Service</label>
                                    <select class="form-control" id="service_select" name="service_id" required>
                                        <option value="">Select Service</option>
                                        <!-- Populate this with services from the database -->
                                        <?php
                                        // Include database connection
                                        include 'connection.php';

                                        // Fetch available services from the database
                                        $sql = "SELECT service_id, service_name FROM services";
                                        $result = $conni->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='{$row['service_id']}'>{$row['service_name']}</option>";
                                            }
                                        } else {
                                            echo "<option value=''>No services available</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!-- Service Title (dynamically filled) -->
                                <div class="form-group">
                                    <label for="service_title">Service Title</label>
                                    <input type="text" name="servicetitle" id="servicetitle" class="form-control" placeholder="Enter Service Title" required />
                                </div>

                                <!-- Service Name -->
                                <div class="form-group">
                                    <label for="service_name">Service Name</label>
                                    <input type="text" name="service_name" id="service_name" class="form-control" placeholder="Enter Service Name" required />
                                </div>

                                <!-- Service Description (dynamically filled) -->
                                <div class="form-group">
                                    <label for="service_disc">Service Description</label>
                                    <textarea name="service_disc" id="service_disc" class="form-control" placeholder="Enter Service Description" required></textarea>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-info waves-effect mt-2 w-100">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // When a service is selected
    $('#service_select').on('change', function() {
        var serviceId = $(this).val(); // Get selected service ID
        
        if (serviceId) {
            // Make AJAX request to fetch service details
            $.ajax({
                url: 'get_service.php', // PHP script to fetch service details
                type: 'POST',
                data: { service_id: serviceId },
                dataType: 'json', // Expect JSON response
                success: function(response) {
                    // Handle the server response
                    if (response.error) {
                        // Display error if service details not found or query failed
                        alert(response.error);
                    } else {
                        // Populate the Service Title and Description fields
                        $('#servicetitle').val(response.service_title);
                        $('#service_name').val(response.service_name);
                        $('#service_disc').val(response.service_desc);
                    }
                },
                error: function(xhr, status, error) {
                    // Display the error if the AJAX request fails
                    alert('Error fetching service details: ' + error);
                }
            });
        } else {
            // If no service is selected, clear the fields
            $('#servicetitle').val('');
            $('#service_name').val('');
            $('#service_disc').val('');
        }
    });
});


</script>
