<?php
// Array daftar buku dengan kategori
$books = [
    "Pemrograman" => ["Belajar PHP", "Dasar HTML & CSS", "JavaScript Lanjutan"],
    "Teknologi" => ["Dasar-Dasar Data Science", "Kecerdasan Buatan", "Internet of Things"],
    "Filsafat" => ["Filsafat Ilmu", "Logika dan Argumen", "Pemikiran Kritis"],
    "Bisnis" => ["Strategi Bisnis Modern", "Manajemen Keuangan", "Marketing Digital"]
];

// Fungsi untuk mendapatkan buku berdasarkan kategori
function getBooksByCategory($category) {
    global $books;
    return isset($books[$category]) ? $books[$category] : [];
}

// Struktur kontrol: Menentukan kategori default
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : "Pemrograman";
$bookList = getBooksByCategory($selectedCategory);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>BookLand</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="#" class="logo">BookLand</a>
            <div class="nav-links">
                <a href="?category=Pemrograman" class="nav-link">Pemrograman</a>
                <a href="?category=Teknologi" class="nav-link">Teknologi</a>
                <a href="?category=Filsafat" class="nav-link">Filsafat</a>
                <a href="?category=Bisnis" class="nav-link">Bisnis</a>
            </div>
        </nav>
    </header>
    <section class="book-list">
        <h2>Daftar Buku dalam Kategori: <?php echo htmlspecialchars($selectedCategory); ?></h2>
        <ul>
            <?php if (!empty($bookList)) { 
                foreach ($bookList as $bookTitle) { 
                    echo "<li>" . htmlspecialchars($bookTitle) . "</li>";
                } 
            } else {
                echo "<li>Tidak ada buku dalam kategori ini.</li>";
            } ?>
        </ul>
    </section>
</body>
</html>
