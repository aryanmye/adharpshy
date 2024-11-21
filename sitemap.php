<?php
include 'connection.php';  

header('Content-Type: application/xml');

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

// Add static pages
$static_pages = [
    'http://localhost/adharpshy-1/index.php',
    'http://localhost/adharpshy-1/contact.php',
   
];

foreach ($static_pages as $page_url) {
    echo '<url>';
    echo '<loc>' . $page_url . '</loc>';
    echo '<lastmod>' . date('Y-m-d') . '</lastmod>'; 
    echo '<priority>1.0</priority>'; 
    echo '</url>';
}

// Fetch all published blog posts
$sql = "SELECT title FROM blogs WHERE is_enabled = 1"; 
$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $title = htmlspecialchars($row['title']);
        // Create a clean URL based on the blog title
        $url = 'http://localhost/adharpshy-1/blog-single.php?title=' . urlencode($title);
        
        // Output each blog's URL in XML format
        echo '<url>';
        echo '<loc>' . $url . '</loc>';
        echo '<lastmod>' . date('Y-m-d') . '</lastmod>'; 
        echo '<priority>0.5</priority>'; 
        echo '</url>';
    }
}

echo '</urlset>';
mysqli_close($conn);
?>
