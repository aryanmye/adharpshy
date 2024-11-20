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
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application UI kit.">
    <title>Admin - AdharPsych</title>
    <link rel="icon" href="images/favicon-32x32.png">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
    <link rel="stylesheet" href="assets/plugins/charts-c3/plugin.css"/>
    <link rel="stylesheet" href="assets/plugins/morrisjs/morris.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.min.css">
    <style>
        /* Sidebar toggle styles */
        body {
            transition: all 0.3s ease;
        }

        body.mobile-menu-open .left-aside {
            transform: translateX(0); /* Show the sidebar */
        }

        .left-aside {
            transform: translateX(-100%); /* Initially hide the sidebar off-screen */
            transition: transform 0.3s ease;
        }
    </style>
</head>
<body class="theme-blush">

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Left Sidebar -->
<?php include 'leftaside.php'; ?>

<!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs sm">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="setting">
            <div class="slim_scroll">
                <div class="card">
                    <h6>Theme Option</h6>
                    <div class="light_dark">
                        <div class="radio">
                            <input type="radio" name="radio1" id="lighttheme" value="light" checked=""/>
                            <label for="lighttheme">Light Mode</label>
                        </div>
                        <div class="radio mb-0">
                            <input type="radio" name="radio1" id="darktheme" value="dark"/>
                            <label for="darktheme">Dark Mode</label>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h6>Color Skins</h6>
                    <ul class="choose-skin list-unstyled">
                        <li data-theme="purple"><div class="purple"></div></li>
                        <li data-theme="blue"><div class="blue"></div></li>
                        <li data-theme="cyan"><div class="cyan"></div></li>
                        <li data-theme="green"><div class="green"></div></li>
                        <li data-theme="orange"><div class="orange"></div></li>
                        <li data-theme="blush" class="active"><div class="blush"></div></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</aside>

<!-- Main Content -->
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Dashboard</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> AdharPsych</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>
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
                                        <p class="text"><?= htmlspecialchars(substr(strip_tags($row2['content']), 0, 150)) ?>...</p>

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

                                        <a href="../blog-single.php?title=<?= htmlspecialchars($row2['title']) ?>" class="btn btn-info">Read More</a>
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

<!-- JQuery and Scripts -->
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->
<script src="assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
<script src="assets/bundles/c3.bundle.js"></script>
<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/js/pages/index.js"></script>

<script>
    $(document).ready(function() {
        // When the mobile menu button is clicked
        $(".mobile_menu").on("click", function() {
            $("body").toggleClass("mobile-menu-open");
        });
    });
</script>

</body>
</html>

<?php
$conn->close();
?>
