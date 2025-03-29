<?php
include("navbar.php");

// Koneksi ke database
include("connect.php");

// Ambil id dari parameter URL
$id = $_GET['id'];

// Query SQL untuk mengambil data buku berdasarkan ID
$query = "SELECT * FROM buku WHERE id = $id";

// Eksekusi query
$data = mysqli_query($conn, $query);

// Buat array kosong untuk menampung data
$books = [];

// Looping semua data dan masukkan ke dalam array
while ($book = mysqli_fetch_assoc($data)) {
    $books[] = $book;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="row">
        <center>
            <h1>Detail Buku</h1>
            <div class="col-md-4 p-3">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <!-- Menampilkan data buku dari database -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="judul_buku" id="judul_buku"
                                    value="<?= $books[0]["judul_buku"] ?>" disabled>
                                <label for="judul_buku">Judul Buku</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="penulis" id="penulis"
                                    value="<?= $books[0]["penulis"] ?>" disabled>
                                <label for="penulis">Penulis</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="kategori_buku" id="kategori_buku"
                                    value="<?= $books[0]["kategori_buku"] ?>" disabled>
                                <label for="kategori_buku">Kategori Buku</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="harga_buku" id="harga_buku"
                                    value="<?= $books[0]["harga_buku"] ?>" disabled>
                                <label for="harga_buku">Harga Buku</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="jumlah_buku" id="jumlah_buku"
                                    value="<?= $books[0]["jumlah_buku"] ?>" disabled>
                                <label for="jumlah_buku">Jumlah Buku</label>
                            </div>
                            <a href="form_update_buku.php?id=<?= $id ?>"
                                class="btn btn-warning mb-3 mt-3 w-100">Edit</a>
                            <a href="delete.php?id=<?= $id ?>" class="btn btn-danger mb-3 mt-3 w-100">Delete</a>
                        </form>
                    </div>
                </div>
            </div>
        </center>
    </div>
</body>

</html>