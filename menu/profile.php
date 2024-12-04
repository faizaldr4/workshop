<div class="wrapper">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Profile</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 connectedSortable">
                    <div class="card mb-12">
                        <div class="card-header">
                            UBAH FOTO ANDA
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="container d-flex justify-content-center" style="height: 200px;">
                                    <img src="<?= $photo_profile ?>" class="img-fluid img-thumbnail" alt="Gambar">
                                </div>
                                <div class="container d-flex justify-content-center" style="height: 200px;">
                                    <form method="post" enctype="multipart/form-data">
                                        <input type="file" name="photo" id="file-upload" class="form-control" style="display: none;">
                                        <label for="file-upload" class="btn btn-primary">Pilih Gambar</label>
                                        <button type="submit" class="btn btn-primary">KIRIM</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('file-upload').addEventListener('change', function(event) {
        const input = event.target;
        const fileName = input.files[0].name;
        const label = document.querySelector('label[for="file-upload"]');
        label.textContent = fileName;
    });
</script>

<?php
if (isset($_FILES['photo'])) {
    $target_dir = "../assets/upload/";
    $target_file = $target_dir . $_SESSION["username"].".jpg";
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
    echo "File uploaded successfully.";
}
?>
<?php
// if (isset($_FILES['photo'])) {
//     $allowed_types = array('jpg', 'jpeg');
//     $max_size = 5000000; // 5MB
// $target_dir = "../assets/upload/";
// $target_file = $target_dir . $_SESSION["username"];
//     $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//     $file_size = $_FILES["photo"]["size"];

//     if (in_array($file_type, $allowed_types) && $file_size <= $max_size) {
//         if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
//             echo "File uploaded successfully.";
//         } else {
//             echo "Sorry, there was an error uploading your file.";
//         }
//     } else {
//         echo "Sorry, only JPG, JPEG, and PNG files are allowed, and the file size must be less than 5MB.";
//     }
// }
?>