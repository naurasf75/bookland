<?php
// Array data buku
$books = [
    ["title" => "Atomic Habits", "genre" => "Self-Improvement", "rating" => 4.8],
    ["title" => "The Hobbit", "genre" => "Fantasy", "rating" => 4.7],
    ["title" => "1984", "genre" => "Dystopian", "rating" => 4.6],
    ["title" => "Harry Potter", "genre" => "Fantasy", "rating" => 4.9],
    ["title" => "Sapiens", "genre" => "History", "rating" => 4.5]
];

// Default preferensi pengguna
$userPreferences = [
    "favoriteGenre" => "Fantasy",
    "minRating" => 4.5
];

// Fungsi untuk memberikan rekomendasi buku
function recommendBooks($books, $preferences) {
    $recommendations = [];

    foreach ($books as $book) {
        if ($book["genre"] === $preferences["favoriteGenre"] && $book["rating"] >= $preferences["minRating"]) {
            $recommendations[] = $book;
        }
    }

    return $recommendations;
}

// Jika form dikirim, update preferensi pengguna
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userPreferences["favoriteGenre"] = $_POST["genre"];
    $userPreferences["minRating"] = (float) $_POST["minRating"];
}

// Menjalankan fungsi rekomendasi
$recommendedBooks = recommendBooks($books, $userPreferences);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookland - Rekomendasi Buku</title>
</head>
<body>
    <h2>Pilih Preferensi Buku</h2>
    <form method="POST">
        <label for="genre">Genre Favorit:</label>
        <select name="genre">
            <option value="Fantasy" <?= $userPreferences["favoriteGenre"] == "Fantasy" ? "selected" : "" ?>>Fantasy</option>
            <option value="Self-Improvement" <?= $userPreferences["favoriteGenre"] == "Self-Improvement" ? "selected" : "" ?>>Self-Improvement</option>
            <option value="Dystopian" <?= $userPreferences["favoriteGenre"] == "Dystopian" ? "selected" : "" ?>>Dystopian</option>
            <option value="History" <?= $userPreferences["favoriteGenre"] == "History" ? "selected" : "" ?>>History</option>
        </select>
        <br>

        <label for="minRating">Rating Minimum:</label>
        <input type="number" step="0.1" name="minRating" value="<?= $userPreferences["minRating"] ?>" min="0" max="5">
        <br>

        <button type="submit">Cari Rekomendasi</button>
    </form>

    <h2>Rekomendasi Buku:</h2>
    <ul>
        <?php if (count($recommendedBooks) > 0) : ?>
            <?php foreach ($recommendedBooks as $book) : ?>
                <li><?= $book["title"]; ?> (<?= $book["rating"]; ?>⭐)</li>
            <?php endforeach; ?>
        <?php else : ?>
            <li>Tidak ada rekomendasi buku yang sesuai.</li>
        <?php endif; ?>
    </ul>
</body>
</html>
