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
                <!-- Display session messages -->
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-info">
                <?= htmlspecialchars($_SESSION['message']) ?>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        <div class="row">
            <?php if ($rowCount > 0): ?>
                <?php while ($row2 = mysqli_fetch_assoc($que2)): ?>
                    <div class="col-lg-6 col-md-12 mb-4">
                        <div class="card">
                            <div class="blogitem mb-5">
                                <div class="blogitem-image">
                                    <a href="blog-details.php?id=<?= htmlspecialchars($row2['blog_id']) ?>">
                                        <?php $imgSrc = "upload/" . htmlspecialchars($row2['image']); ?>
                                        <img src="<?= $imgSrc ?>" alt="blog image" class="img-fluid">
                                    </a>
                                    <span class="blogitem-date"><?= htmlspecialchars($row2['publish_date']) ?></span>
                                </div>
                                <div class="blogitem-content p-3">
                                    <div class="blogitem-header">
                                        <div class="blogitem-meta">
                                            <span><i class="zmdi zmdi-account"></i> By <a href="javascript:void(0);"><?= htmlspecialchars($row2['author']) ?></a></span>
                                        </div>
                                    </div>
                                    <h5><a href="blog-details.php?id=<?= htmlspecialchars($row2['blog_id']) ?>"><?= htmlspecialchars($row2['title']) ?></a></h5>
                                    <?= htmlspecialchars(substr($row2['content'], 0, 150)) ?>...

                                    <?php if (!$row2['is_enabled']): ?>
                                        <div class="alert alert-warning" role="alert">
                                            This blog is disabled.
                                        </div>
                                    <?php endif; ?>

                                    <!-- Toggle Button Form -->
                                    <a href="toggle_blog.php?blog_id=<?= $row2['blog_id'] ?>&current_status=<?= $row2['is_enabled'] ?>" 
   class="btn <?= $row2['is_enabled'] ? 'btn-danger' : 'btn-success' ?>">
    <?= $row2['is_enabled'] ? 'Disable Blog' : 'Enable Blog' ?>
</a>


                                    <a href="blog-details.php?id=<?= htmlspecialchars($row2['blog_id']) ?>" class="btn btn-info">Read More</a>
                                    <a href="del_blog.php?id=<?= htmlspecialchars($row2['blog_id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this blog?');">Delete Blog</a>
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
