<?php
// Disable error reporting to avoid any output that could interfere with the XML response
ini_set('display_errors', 0);  // Disable error display
error_reporting(E_ALL & ~E_NOTICE);  // Report all errors except notices

// Include connection for blogs
include 'connection.php';  

// Include connection for services (assuming it's in the 'admin-panel' folder)
include 'admin-panel/connection_service.php';  // Assuming this file defines $coni

// Set the content type to XML
header('Content-Type: application/xml');

// Start outputting the XML
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

// Add static pages to the sitemap
$static_pages = [
    'http://localhost/adharpshy-2/index.php',
    'http://localhost/adharpshy-2/contact.php',
    'http://localhost/adharpshy-2/services.php',
    'http://localhost/adharpshy-2/blogs.php'
];

foreach ($static_pages as $page_url) {
    echo '<url>';
    echo '<loc>' . htmlspecialchars($page_url) . '</loc>';  // Use htmlspecialchars to encode special characters
    echo '<lastmod>' . date('Y-m-d') . '</lastmod>'; 
    echo '<priority>1.0</priority>';
    echo '</url>';
}

// Fetch all published blog posts from the default blog database
$sql = "SELECT title FROM blogs WHERE is_enabled = 1"; 
$result = mysqli_query($conn, $sql);  // Use $conn for blogs database

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $title = htmlspecialchars($row['title']);
        // Create a clean URL based on the blog title
        $url = 'http://localhost/adharpshy-2/blog-single.php?title=' . urlencode($title);
        
        // Output each blog's URL in XML format
        echo '<url>';
        echo '<loc>' . htmlspecialchars($url) . '</loc>';  // Use htmlspecialchars to encode special characters
        echo '<lastmod>' . date('Y-m-d') . '</lastmod>'; 
        echo '<priority>0.5</priority>';
        echo '</url>';
    }
}

// Fetch all city tables and enabled services from the 'cities' database
$sql1 = "SHOW TABLES";
$tablesResult = mysqli_query($coni, $sql1);  // Use $coni for services database

if ($tablesResult === false) {
    echo "Error executing query: " . mysqli_error($coni);
    exit();
}

// Loop through the tables and fetch data dynamically for enabled services
while ($tableRow = mysqli_fetch_assoc($tablesResult)) {
    $tableName = $tableRow['Tables_in_' . $dbname];  // Table name (e.g., 'nagpur')

    // Query to fetch enabled services from each table in the cities database
    $sql2 = "SELECT * FROM `$tableName` WHERE is_enabled = 1 ORDER BY created_at DESC";
    $que2 = mysqli_query($coni, $sql2);  // Use $coni for services database

    // Check if the query was successful
    if ($que2 === false) {
        echo "Error executing query for table $tableName: " . mysqli_error($coni);
        continue;
    }

    // Check if any enabled services were found
    while ($row2 = mysqli_fetch_assoc($que2)) {
        $serviceId = $row2['id'];
        $serviceName = urlencode($row2['service_title']);
        $createdAt = date('Y-m-d', strtotime($row2['created_at'])); // Format the created_at date

        // Generate the URL for the service
        $serviceUrl = "http://localhost/adharpshy-2/services.php?id=" . $serviceId . "&service=" . $serviceName;

        // Output the service URL in XML format
        echo '<url>';
        echo '<loc>' . htmlspecialchars($serviceUrl) . '</loc>';  // Use htmlspecialchars to encode special characters
        echo '<lastmod>' . $createdAt . '</lastmod>';
        echo '<priority>0.5</priority>';
        echo '</url>';
    }
}

// Close the URL set
echo '</urlset>';

// Close the database connections
mysqli_close($conn);  // Close the connection for the blogs database
mysqli_close($coni);  // Close the connection for the services database

// Make sure there's no extra output here, and nothing after </urlset>

// No need to flush as it's not necessary in this case

?>
