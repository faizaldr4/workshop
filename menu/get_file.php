<?php
// Celah Keamanan Remote File Incluision

// $allowed_domains = ['eduparx.id', 'inixindojogja.co.id'];
$response = false;

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $parsed_url = parse_url($url);

    // if (!isset($parsed_url['host']) || !in_array($parsed_url['host'], $allowed_domains)) {
    //     die("Invalid or restricted domain.");
    // }

    $response = file_get_contents($url);
}

?>
<div class="wrapper">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Show Page</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 connectedSortable">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3>Tampilkan Halaman </h3>
                            <ul>
                                <li>
                                    <a href="./index.php?page=../menu/get_file&url=https://eduparx.id">Eduparx</a>
                                </li>
                                <li>
                                    <a href="./index.php?page=../menu/get_file&url=https://inixindojogja.co.id">Inixindo Jogja</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <?php
                            if ($response) {
                                echo '<iframe src="' . htmlspecialchars($url) . '" style="width:100%; height:500px; border:none;"></iframe>';
                            } else {
                                echo 'Failed to load data.';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>