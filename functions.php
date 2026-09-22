<?php
// functions.php - Processing Layer

/**
 * Mengalkulasi total nilai aset dari seluruh produk (Harga x Stok)
 */
function hitungTotalNilaiStok($daftarProduk) {
    $totalNilai = 0;
    foreach ($daftarProduk as $produk) {
        // Nilai aset per produk = Harga dikali Jumlah Stok
        $totalNilai += ($produk['harga'] * $produk['stok']);
    }
    return $totalNilai;
}

/**
 * Memeriksa apakah stok kritis (< 3) untuk memberikan class CSS warna merah
 */
function getWarnaBarisStok($stok) {
    if ($stok < 3) {
        return "stok-kritis"; // Nama class CSS untuk styling warna
    }
    return "";
}