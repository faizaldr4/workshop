<?php
// if (isset($_GET['url'])) {
//     $url = $_GET['url'];

//     // Fetching the content from the URL
//     $response = file_get_contents($url); 
//     // Celah Keamanan Server-Side Request Forgery (SSRF) (OTG-INTROS-001)
//     // http://localhost/workshop/dashboard/index.php?page=admin
//     // ../assets/docs/app_feature.txt

//     echo $response;
// } else {
//     echo "URL parameter is missing.";
// }
?>

<!-- <form method="GET">
    URL: <input type="text" name="url">
    <input type="submit" value="Fetch URL">
</form> -->

<?php
$allowed_domains = ['eduparx.id', 'inixindojogja.co.id'];

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $parsed_url = parse_url($url);

    if (!isset($parsed_url['host']) || !in_array($parsed_url['host'], $allowed_domains)) {
        die("Invalid or restricted domain.");
    }

    // Fetching the content from the URL
    $response = file_get_contents($url);

    echo $response;
} else {
    echo "URL parameter is missing.";
}
?>

<form method="GET">
    URL: <input type="text" name="url">
    <input type="submit" value="Fetch URL">
</form>
