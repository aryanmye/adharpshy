<?php
include 'header.php';
$sql2 = "SELECT * FROM `blogs` WHERE is_enabled = 1 ORDER BY publish_date DESC;";
$que2 = mysqli_query($conn, $sql2);


// Check if the query was successful
if ($que2 === false) {
    echo "Error executing query: " . mysqli_error($conn);
    exit();
}
// Check the number of rows returned
$rowCount = mysqli_num_rows($que2);
?>
		

		
		
		<!-- Start Blog Area -->
<section class="blog section" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Keep up with Our Most Recent Medical News.</h2>
                    <img src="img/section-img.png" alt="#">
                </div>
            </div>
        </div>
        <div class="row">
            <?php if ($rowCount > 0): ?>
                <?php while ($row2 = mysqli_fetch_assoc($que2)): ?>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single Blog -->
                        <div class="single-news">
                            <div class="news-head">
                                <?php $imgSrc = "upload/" . htmlspecialchars($row2['image']); ?>
                                <img src="<?= $imgSrc ?>" alt="blog image" class="img-fluid">
                            </div>
                            <div class="news-body">
                                <div class="news-content">
                                    <div class="date">Published on : <?= htmlspecialchars($row2['publish_date']) ?></div>
                                    <h2><a href="blog-single.php?title=<?= htmlspecialchars($row2['title']) ?>"><?= htmlspecialchars($row2['title']) ?></a></h2>
                                    <p class="text"><?= htmlspecialchars(substr($row2['content'], 0, 150)) ?>...</p>
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
</section>
<!-- End Blog Area -->



<?php
include 'footer.php';
?>






        </body>
        </html>