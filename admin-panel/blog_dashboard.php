<?php
include 'connection.php';
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql2 = "SELECT * FROM `blogs` ORDER BY blogs.publish_date DESC;";
$que2 = mysqli_query($conn, $sql2);

// Check if the query was successful
if ($que2 === false) {
    echo "Error executing query: " . mysqli_error($conn);
    exit();
}

// Check the number of rows returned
$rowCount = mysqli_num_rows($que2);
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>AdharPsych - Blog</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap-select/css/bootstrap-select.css" />
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
<link rel="stylesheet" href="assets/plugins/charts-c3/plugin.css"/>

<link rel="stylesheet" href="assets/plugins/morrisjs/morris.min.css" />
<!-- Custom Css -->
<link rel="stylesheet" href="assets/css/style.min.css">
</head>
<body class="theme-blush">
    <!-- Left Sidebar -->
    <?php include 'leftaside.php'; ?>

    <section class="content">
        <div class="body_scroll">
            <div class="container">
                <div class="row">
                    <?php if ($rowCount > 0): ?>
                        <?php while ($row2 = mysqli_fetch_assoc($que2)): ?>
                            <div class="col-lg-6 col-md-12 mb-4"> <!-- Add margin bottom for spacing -->
                                <div class="card">
                                    <div class="blogitem mb-5">
                                        <div class="blogitem-image">
                                            <a href="blog-details.html">
                                                <?php $imgSrc = "upload/{$row2['image']}"; ?>
                                                <img src="<?= $imgSrc ?>" alt="blog image" class="img-fluid"> <!-- Make the image responsive -->
                                            </a>
                                            <span class="blogitem-date"><?= $row2['publish_date'] ?></span>
                                        </div>
                                        <div class="blogitem-content p-3"> <!-- Add padding for content -->
                                            <div class="blogitem-header">
                                                <div class="blogitem-meta">
                                                    <span><i class="zmdi zmdi-account"></i> By <a href="javascript:void(0);"><?= $row2['author'] ?></a></span>
                                                </div>
                                            </div>
                                            <h5><a href="blog-details.html"><?= $row2['title'] ?></a></h5>
                                            <p><?= $row2['content'] ?></p>

                                            <?php if (!$row2['is_enabled']): ?>
                                                <div class="alert alert-warning" role="alert">
                                                    This blog is disabled.
                                                </div>
                                            <?php endif; ?>

                                            <form method="POST" action="toggle_blog.php" style="display:inline;">
                                                <input type="hidden" name="blog_id" value="<?= $row2['blog_id'] ?>">
                                                <button type="submit" class="btn btn-toggle <?= $row2['is_enabled'] ? 'btn-success' : 'btn-danger' ?>">
                                                    <?= $row2['is_enabled'] ? 'Disable Blog' : 'Enable Blog' ?>
                                                </button>
                                            </form>

                                            <a href="blog-details.html" class="btn btn-info">Read More</a>
                                            <a href="del_blog.php?id=<?= $row2['blog_id'] ?>" class="btn btn-danger">Delete Blog</a> <!-- Ensure this ID is correct -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="col-lg-12">
                            <div class="alert alert-warning" role="alert">
                                No blogs found.
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
<script src="assets/bundles/c3.bundle.js"></script>

<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/js/pages/index.js"></script>
    <script src="assets/bundles/mainscripts.bundle.js"></script>
</body>
</html>

<?php
$conn->close();
?>
