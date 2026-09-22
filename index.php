<?php
// index.php - Presentation Layer

// 1. Memuat file dependency utama secara aman
require_once 'products.php';
require_once 'functions.php';

// 2. Memanggil fungsi kalkulasi total aset
$totalAset = hitungTotalNilaiStok($katalogProduk);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Product Information System</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f6f9; }
        .summary-card { background-color: #fff; padding: 15px; border-left: 5px solid #007bff; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; background-color: #fff; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #007bff; color: white; }
        
        /* CSS Logika Conditional Stok Kritis (< 3) */
        .stok-kritis {
            background-color: #ffe6e6; /* Warna latar merah muda */
            color: #d9534f;
            font-weight: bold;
        }
        .badge-kritis {
            background-color: #d9534f;
            color: white;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 11px;
        }
    </style>
</head>
<body>

    <h1>Product Information System</h1>
    
    <!-- Ringkasan Total Nilai Aset -->
    <div class="summary-card">
        <h3>Ringkasan Gudang</h3>
        <p>Total Nilai Stok Gudang: <strong>Rp <?= number_format($totalAset, 0, ',', '.'); ?></strong></p>
    </div>

    <!-- Tabel Tampilan Produk -->
    <h2>Katalog Produk</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($katalogProduk as $produk): ?>
                <!-- Menambahkan class CSS jika stok < 3 -->
                <tr class="<?= getWarnaBarisStok($produk['stok']); ?>">
                    <td><?= $produk['id']; ?></td>
                    <td><?= $produk['nama']; ?></td>
                    <td><?= $produk['kategori']; ?></td>
                    <td>Rp <?= number_format($produk['harga'], 0, ',', '.'); ?></td>
                    <td>
                        <?= $produk['stok']; ?>
                        <?php if ($produk['stok'] < 3): ?>
                            <span class="badge-kritis">Stok Kritis!</span>
                        <?php endif; ?>
                    </td>
                    <td><?= $produk['deskripsi']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>