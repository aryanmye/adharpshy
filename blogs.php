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
		
<style>
    .single-news .news-head img {
    width: 100%;          /* Ensure the image takes full width of its container */
    height: 200px;        /* Fixed height for all images */
    object-fit: cover;    /* Ensure the image covers the space without stretching */
    object-position: center; /* Keep the center of the image visible, if cropping occurs */
    border-radius: 8px;   /* Optional: Adds rounded corners for a nice effect */
}
/* Ensuring all cards have the same height */
.single-news {
    display: flex;
    flex-direction: column;
    height: 100%;
    border: 1px solid #ddd; /* Optional: for a border around the cards */
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.single-news .news-body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    flex-grow: 1; /* Make the body flexible to fill remaining space */
}

.single-news .news-head img {
    width: 100%;           /* Ensure the image takes full width of its container */
    height: 200px;         /* Fixed height for all images */
    object-fit: cover;     /* Ensures the image covers the space without distortion */
    object-position: center;
    border-radius: 8px 8px 0 0;  /* Optional: Rounded top corners */
}

.single-news .news-content {
    padding: 15px;  /* Add padding inside the content area */
}

.single-news .news-content h2 {
    font-size: 1.2rem;
    margin-bottom: 10px;
}

.single-news .news-content .date {
    font-size: 0.9rem;
    color: #777;
    margin-bottom: 10px;
}

.single-news .news-content p {
    font-size: 1rem;
    line-height: 1.5;
}

/* Optional: Add consistent margin to the bottom of the card */
.single-news .news-body {
    margin-bottom: 10px;
}
    </style>
		
		
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
                        <?php $imgSrc = "uploado/" . htmlspecialchars($row2['image']); ?>
                        <!-- Fixed size image with CSS applied -->
                        <img src="<?= $imgSrc ?>" alt="blog image" class="img-fluid fixed-img">
                    </div>
                    <div class="news-body d-flex flex-column">
                        <div class="news-content">
                            <div class="date">Published on: <?= htmlspecialchars($row2['publish_date']) ?></div>
                            <h2><a href="blog-single.php?title=<?= htmlspecialchars($row2['title']) ?>"><?= htmlspecialchars($row2['title']) ?></a></h2>
                            <p class="text"><?= htmlspecialchars(substr(strip_tags($row2['content']), 0, 150)) ?>..........<a href="blog-single.php?title=<?= htmlspecialchars($row2['title']) ?>">Read more</a></p>
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