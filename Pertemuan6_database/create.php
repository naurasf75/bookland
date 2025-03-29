<?php
// (1) Sertakan koneksi database dari yang sudah kalian buat yaa
require "connect.php";

// (2) Buatlah perkondisian untuk memeriksa apakah permintaan saat ini menggunakan metode POST
if (isset($_POST["create"])) {
    // a. Ambil data judul buku
    $judulBuku = $_POST["judul_buku"];
    // b. Ambil data penulis
    $penulis = $_POST["penulis"];
    // c. Ambil data kategori buku
    $kategoriBuku = $_POST["kategori_buku"];
    // d. Ambil data harga buku
    $hargaBuku = $_POST["harga_buku"];
    // e. Ambil data jumlah stok buku
    $jumlahBuku = $_POST["jumlah_buku"];
    
    // (4) Kalau sudah, kita lanjut Query
    $query = "INSERT INTO buku (judul_buku, penulis, kategori_buku, harga_buku, jumlah_buku) 
    VALUES ('$judulBuku', '$penulis', '$kategoriBuku', '$hargaBuku', '$jumlahBuku')";
    mysqli_query($conn, $query);

    // (5) Buatkan kondisi jika eksekusi query berhasil
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: list_buku.php");
    } else {
        echo "
        <script>
            alert('Data failed');
            document.location.href = list_buku.php;
        </script>
        ";
        exit;
    }
}