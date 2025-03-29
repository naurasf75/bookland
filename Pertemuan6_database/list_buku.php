<?php
// Koneksi ke database
include("connect.php");

// Cek apakah ada data yang dikirim melalui search
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Buat query untuk menampilkan data sesuai pencarian
$query = "SELECT * FROM buku WHERE judul_buku LIKE '%$search%'";

// Jalankan query
$data = mysqli_query($conn, $query);

// Tampung hasil query ke dalam array
$books = [];
while ($book = mysqli_fetch_assoc($data)) {
    $books[] = $book;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include("navbar.php") ?>
    <center>
        <div class="container mt-5">
            <h1>Daftar Buku</h1>

            <!-- Form Pencarian -->
            <form action="list_buku.php" method="GET" class="form-inline mb-3" style="display: flex; align-items: center; width: 50%;">
                <input class="form-control me-2" type="search" name="search" placeholder="Cari buku..." aria-label="Search" value="<?=$search ?>">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

            <table class="table align-middle table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah Buku</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($books) == 0) : ?>
                        <tr>
                            <th colspan="8" class="text-center">TIDAK ADA DATA</th>
                        </tr>
                    <?php endif; ?>

                    <?php foreach ($books as $index => $book) : ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $book["judul_buku"] ?></td>
                            <td><?= $book["penulis"] ?></td>
                            <td><?= $book["kategori_buku"] ?></td>
                            <td>Rp<?= number_format($book["harga_buku"], 0, ',', '.') ?></td>
                            <td><?= $book["jumlah_buku"] ?></td>
                            <td>
                                <a href="./detail_buku.php?id=<?= $book["id"] ?>" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </center>
</body>

</html>
