<div class="wrapper">
    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            App Feature
                        </li>
                    </ol>
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content Header--> <!--begin::App Content-->
    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row"> <!-- Start col -->
                <div class="col-lg-12 connectedSortable">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="mb-0">App Feature</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            // Celah Keamanan Local File Incluision
                            // Path ke file
                            $file = '../assets/docs/app_feature.txt';

                            // Memeriksa apakah file ada
                            // if (file_exists($file)) {
                            // Membuka file
                            $handle = fopen($file, "r");

                            // Membaca isi file
                            $content = fread($handle, filesize($file));

                            // Menutup file
                            fclose($handle);

                            // Menampilkan isi file
                            echo nl2br($content);
                            // } else {
                            //     echo "File tidak ditemukan.";
                            // }
                            ?>
                        </div>
                    </div> <!-- /.card --> <!-- DIRECT CHAT -->
                </div> <!-- /.Start col --> <!-- Start col -->
            </div> <!-- /.row (main row) -->
        </div> <!--end::Container-->
    </div> <!--end::App Content-->
</div>