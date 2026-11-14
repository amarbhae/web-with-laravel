<?php
require "db.php";
$pesan = "";
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["tambah"])) {
    $nama = trim($_POST["nama_produk"] ?? "");
    $kategori = trim($_POST["kategori"] ?? "");
    $harga = (int)($_POST["harga"] ?? 0);
    $stok = (int)($_POST["stok"] ?? 0);
    
    if ($nama !== "" && $kategori !== "" && $harga > 0 && $stok >= 0) {
        $stmt = $conn->prepare("INSERT INTO produk (nama_produk, kategori, harga, stok) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $nama, $kategori, $harga, $stok);
        $stmt->execute();
        $stmt->close();
        header("Location: index.php?status=tambah"); exit;
    } else {
        $pesan = "Semua kolom wajib diisi, harga harus lebih dari 0, dan stok tidak boleh minus.";
    }
}

// Menangkap status aksi untuk notifikasi
$status = $_GET["status"] ?? "";

$result = $conn->query("SELECT * FROM produk ORDER BY id DESC");
function e($value) { return htmlspecialchars((string)$value, ENT_QUOTES, "UTF-8"); }
?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistem Inventaris Toko Elektronik</title><link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<header>
    <h1>Sistem Inventaris Toko Elektronik</h1>
    <p>Aplikasi Pengelolaan Produk Berbasis PHP Native &amp; MySQL</p>
</header>

<?php if ($status === "tambah"): ?><div class="success">Produk baru berhasil ditambahkan.</div><?php endif; ?>
<?php if ($status === "edit"): ?><div class="success">Data produk berhasil diperbarui.</div><?php endif; ?>
<?php if ($status === "hapus"): ?><div class="success">Produk berhasil dihapus.</div><?php endif; ?>
<?php if ($pesan): ?><div class="error"><?= e($pesan) ?></div><?php endif; ?>

<section class="card">
<h2>Tambah Produk Elektronik</h2>
<form method="post">
<div class="grid">
<label>Nama Produk<input name="nama_produk" maxlength="100" placeholder="Contoh: Smart TV 43 Inch" required></label>
<label>Kategori<select name="kategori" required>
    <option value="">Pilih kategori</option>
    <option>Televisi</option>
    <option>Smartphone</option>
    <option>Laptop &amp; Komputer</option>
    <option>Peralatan Rumah Tangga</option>
    <option>Audio &amp; Aksesoris</option>
</select></label>
<label>Harga (Rp)<input type="number" name="harga" min="1" placeholder="Contoh: 3500000" required></label>
<label>Stok<input type="number" name="stok" min="0" placeholder="Contoh: 15" required></label>
</div><button name="tambah" type="submit">Simpan Produk</button>
</form>
</section>

<section class="card">
<h2>Daftar Inventaris Produk</h2>
<div class="table-wrap">
<table>
<thead>
<tr>
    <th>No.</th>
    <th>Nama Produk</th>
    <th>Kategori</th>
    <th>Harga</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>
<?php if ($result->num_rows === 0): ?>
<tr><td colspan="6" class="empty">Belum ada data produk elektronik.</td></tr>
<?php else: $no=1; while($row=$result->fetch_assoc()): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= e($row["nama_produk"]) ?></td>
    <td><?= e($row["kategori"]) ?></td>
    <td>Rp <?= number_format($row["harga"], 0, ',', '.') ?></td>
    <td><?= e($row["stok"]) ?> unit</td>
    <td class="actions">
        <a class="edit" href="edit.php?id=<?= (int)$row["id"] ?>">Edit</a>
        <a class="delete" href="hapus.php?id=<?= (int)$row["id"] ?>" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
    </td>
</tr>
<?php endwhile; endif; ?>
</tbody>
</table>
</div>
</section>
<footer>Project Pemrograman Web · Database dibuat otomatis saat aplikasi dibuka.</footer>
</div></body></html>