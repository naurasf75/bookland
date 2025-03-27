<?php
$host = "localhost";  // Sesuaikan jika server database berbeda
$username = "root";       // Ganti dengan username MySQL kamu
$pass = "";           // Ganti dengan password MySQL kamu (kosongkan jika default)
$dbname = "database_bookland"; // Nama database yang sudah dibuat
$port = 3306;

// Membuat koneksi
$conn = new mysqli($host, $username, $pass, $db, $port);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
} else {
    echo "Koneksi berhasil ke database_bookland";
}
?>
