<div class="wrapper">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">File PDF</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">File PDF</li>
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
                            Pilih Dokumen untuk Ditampilkan
                        </div>
                        <div class="card-body">
                            <form method="get"  action="../menu/show_pdf.php">
                                <label for="doc">Nama Dokumen:</label>
                                <input type="text" id="doc" name="doc">
                                <input type="hidden" id="command" name="command" value="open_pdf">
                                <input type="submit" value="Tampilkan">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>