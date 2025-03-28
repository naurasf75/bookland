<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku | Bookland</title>
</head>

<body>
    <?php include("navbar.php") ?>

    <center>
        <div class="container">
            <h1>Tambah Buku</h1>
            <div class="col-md-4 p-3">
                <div class="card">
                    <div class="card-body">
                        <form action="create.php" method="POST" enctype="multipart/form-data">
                            <!-- JUDUL BUKU -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="judul_buku" id="judul_buku" required>
                                <label for="judul_buku">Judul Buku</label>
                            </div>
                            <!-- PENULIS BUKU -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="penulis" id="penulis" required>
                                <label for="penulis">Penulis</label>
                            </div>
                            <!-- PENERBIT BUKU -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="penerbit_buku" id="penerbit_buku"
                                    required>
                                <label for="penerbit_buku">Penerbit Buku</label>
                            </div>
                            <!-- KATEGORI BUKU -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="kategori_buku" id="kategori_buku"
                                    required>
                                <label for="kategori_buku">Kategori Buku</label>
                            </div>
                            <!-- HARGA BUKU -->
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="harga_buku" id="harga_buku" required>
                                <label for="harga_buku">Harga Buku</label>
                            </div>
                            <!-- STOK BUKU -->
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="stok_buku" id="stok_buku" required>
                                <label for="stok_buku">Stok Buku</label>
                            </div>

                            <button type="submit" name="create" class="btn btn-primary mb-3 mt-3 w-100">Tambah
                                Buku</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </center>
</body>

</html>