<?php
ob_start(); // Mencegah output sebelum HTML dimulai

// Daftar buku
$buku = [
    ["judul" => "2,578.0Km", "harga" => 87999, "gambar" => "gambar/book1.jpg"],
    ["judul" => "Dear J", "harga" => 89999, "gambar" => "gambar/book2.jpg"],
    ["judul" => "Alaia II", "harga" => 99999, "gambar" => "gambar/book3.jpg"],
    ["judul" => "Bumit", "harga" => 67999, "gambar" => "gambar/deal1.jpg"],
    ["judul" => "Lumpur", "harga" => 77999, "gambar" => "gambar/deal2.jpg"],
    ["judul" => "Leiden", "harga" => 89999, "gambar" => "gambar/trend1.jpg"],
    ["judul" => "Gadis Kretek", "harga" => 79999, "gambar" => "gambar/trend2.jpg"]
];

// Daftar notifikasi
$notifikasi = [
    ["pesan" => "Diskon 20% untuk buku terbaru!", "link" => "promo.html"],
    ["pesan" => "Pre-order buku eksklusif sekarang!", "link" => "preorder.html"],
    ["pesan" => "Gratis ongkir untuk pembelian di atas Rp 100.000!", "link" => "gratis-ongkir.html"]
];

// Fungsi untuk mencari buku
function cariBuku($keyword, $buku) {
    $hasil = [];
    foreach ($buku as $item) {
        if (stripos($item['judul'], $keyword) !== false) {
            $hasil[] = $item;
        }
    }
    return $hasil;
}

// Proses pencarian
$hasil_pencarian = [];
$keyword = "";
if (isset($_GET['search'])) {
    $keyword = $_GET['search'];
    $hasil_pencarian = cariBuku($keyword, $buku);
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BookLand</title>
    <link rel="stylesheet" href="style2.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <style>
        /* CSS untuk notifikasi */
        .notification-container {
            position: absolute;
            top: 60px;
            right: 20px;
            width: 250px;
            background: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 1000;
            padding: 10px;
        }
        .notification-container ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .notification-container ul li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .notification-container ul li:last-child {
            border-bottom: none;
        }
        .notification-container ul li a {
            text-decoration: none;
            color: #333;
            display: block;
        }
    </style>
</head>

<body>

<header>
    <nav class="navbar">
        <a href="#" class="logo">BookLand</a>

        <div class="nav-main">
            <a href="#" class="nav-link kategori">
                <i class="fa-solid fa-bars"></i> Kategori
            </a>

            <!-- Pencarian Buku -->
            <form method="GET" id="search-form">
                <div class="search-bar">
                    <input type="text" name="search" id="search-input" placeholder="Search..." required>
                    <button type="submit"><i class="fa-solid fa-search"></i></button>
                </div>
            </form>
        </div>

        <div class="nav-icons">
            <a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a>
            <a href="edit.html"><i class="fa-solid fa-pen-to-square"></i></a>

            <!-- Tombol Notifikasi -->
            <a href="#" id="notif-icon"><i class="fa-solid fa-bell"></i></a>

            <!-- Container Notifikasi -->
            <div class="notification-container" id="notif-container">
                <ul>
                    <?php foreach ($notifikasi as $notif): ?>
                        <li><a href="<?= htmlspecialchars($notif['link']) ?>"><?= htmlspecialchars($notif['pesan']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="buttons">
            <a href="index.html" class="btn btn-login">Login</a>
            <a href="index.html" class="btn btn-signup">Signup</a>
        </div>
    </nav>
</header>

<section class="search-results" id="results-section" style="display: <?= isset($_GET['search']) ? 'block' : 'none'; ?>;">
    <?php if (!empty($keyword)): ?>
        <h2>Hasil Pencarian:</h2>
        <?php if (!empty($hasil_pencarian)): ?>
            <p>Buku "<strong><?= htmlspecialchars($keyword) ?></strong>" yang kamu cari berhasil ditemukan.</p>
            <div class="trend-list">
                <?php foreach ($hasil_pencarian as $b): ?>
                    <div class="trend-item">
                        <img src="<?= htmlspecialchars($b['gambar']) ?>" alt="<?= htmlspecialchars($b['judul']) ?>" />
                        <p><?= htmlspecialchars($b['judul']) ?></p>
                        <span>Rp <?= number_format($b['harga'], 0, ',', '.') ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Buku "<strong><?= htmlspecialchars($keyword) ?></strong>" belum tersedia.</p>
        <?php endif; ?>
    <?php endif; ?>
</section>

<section class="hero">
    <div class="hero-background"></div>
    <div class="hero-content">
      <p class="editor-choice">EDITOR CHOICE</p>
      <h1>
        <span class="hero-title">Top 10 Books</span> Books<br />To Make It A Great
        Year
      </h1>
      <button class="shop-btn">Shop Now →</button>
    </div>
    <div class="hero-image">
      <img src="gambar/books.jpg" alt="Books" />
    </div>
    </div>
  </section>

  <section class="book-section">
    <h2>Popular Books</h2>
    <div class="book-list">
      <div class="book-item">
        <img src="gambar/book1.jpg" alt="Book 1" />
        <p>2,578.0Km</p>
        <span>Rp.87.999</span>
      </div>
      <div class="book-item">
        <img src="gambar/book2.jpg" alt="Book 2" />
        <p>Dear J</p>
        <span>Rp 89.999</span>
      </div>
      <div class="book-item">
        <img src="gambar/book3.jpg" alt="Book 3" />
        <p>Alaia II</p>
        <span>Rp 99.999</span>
      </div>
    </div>
  </section>

  <section class="daily-deals">
    <h2>Daily Deals</h2>
    <div class="deal-list">
      <div class="deal-item">
        <img src="gambar/deal1.jpg" alt="Deal 1" />
        <p>Bumit</p>
        <span class="price">Rp 67.999</span>
      </div>
      <div class="deal-item">
        <img src="gambar/deal2.jpg" alt="Deal 2" />
        <p>Lumpur</p>
        <span class="price">Rp 77.999</span>
      </div>
    </div>
  </section>

  <section class="trending-books">
    <h2>Trending Now</h2>
    <div class="trend-list">
      <div class="trend-item">
        <img src="gambar/trend1.jpg" alt="Trend 1" />
        <p>Leiden</p>
        <span>Rp 89.999</span>
      </div>
      <div class="trend-item">
        <img src="gambar/trend2.jpg" alt="Trend 2" />
        <p>Gadis Kretek</p>
        <span>Rp 79.999</span>
      </div>
    </div>
  </section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let notifIcon = document.getElementById("notif-icon");
        let notifContainer = document.getElementById("notif-container");

        if (notifIcon && notifContainer) {
            notifIcon.addEventListener("click", function (event) {
                event.preventDefault();

                // Toggle notifikasi
                if (notifContainer.style.display === "none" || notifContainer.style.display === "") {
                    notifContainer.style.display = "block";
                } else {
                    notifContainer.style.display = "none";
                }

                event.stopPropagation();
            });

            // Klik di luar notifikasi untuk menutup
            document.addEventListener("click", function (event) {
                if (!notifContainer.contains(event.target) && event.target !== notifIcon) {
                    notifContainer.style.display = "none";
                }
            });
        } else {
            console.error("Element notif-icon atau notif-container tidak ditemukan!");
        }
    });
</script>

</body>
</html>
<?php ob_end_flush(); ?>