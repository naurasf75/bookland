<?php
// Sertakan koneksi database
require "connect.php";

// Periksa apakah parameter "id" tersedia dalam URL
if (isset($_GET['id'])) {
    $id = $_GET["id"];
    
    // Query untuk menghapus data buku berdasarkan ID
    $delete_query = "DELETE FROM buku WHERE id = $id";
    mysqli_query($conn, $delete_query);

    // Periksa apakah query berhasil dijalankan
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: list_buku.php");
    } else {
        echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'list_buku.php';
        </script>
        ";
        exit;
    }
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
