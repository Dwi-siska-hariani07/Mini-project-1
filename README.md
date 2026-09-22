# Mini Project 1: Product Information System (Desain)

Blueprint sistem manajemen data informasi produk siap pakai berbasis konsep teori yang telah dipelajari.

> **Catatan Penting Sesi Ini:** Pembelajaran hanya berfokus pada pematangan cetak biru konsep arsitektur desain secara logis (**Sesi Tanpa Coding / Pengetikan Kode**). Repositori ini berisi dokumen perancangan saja, belum ada implementasi program.

---

## 🎯 Tujuan
Merancang struktur blueprint sistem informasi produk yang:
- menyimpan data produk (ID, Nama, Kategori, Harga, Stok, Deskripsi),
- menghitung total nilai aset gudang,
- menyorot produk dengan stok kritis (< 3),
- menampilkan semuanya dalam tabel HTML.

## 🧱 Arsitektur Ringkas

| Layer | Berkas | Tanggung Jawab |
|---|---|---|
| Data Layer | `products.php` | Multidimensional array data komoditas produk |
| Processing Layer | `functions.php` | Fungsi `hitungTotalNilaiStok()` dan logika conditional warna baris (stok < 3) |
| Presentation Layer | `index.php` | Merajut komponen dengan `require_once`, merender tabel HTML via `foreach` |

Arah ketergantungan: `index.php` → `functions.php` → `products.php`

## 📂 Isi Dokumen Blueprint

| Berkas | Isi |
|---|---|
| [`SAD.md`](./SAD.md) | Software Architecture Document: ruang lingkup, arsitektur, rincian komponen, risiko |
| [`Processing_flowchart.md`](./Processing_flowchart.md) | Flowchart, sequence diagram, dan tabel uji skenario |
| `README.md` | Ringkasan proyek (dokumen ini) |

## 🗂️ Rencana Struktur Proyek (Saat Implementasi Nanti)

```
product-information-system/
├── index.php        # Presentation Layer
├── functions.php    # Processing Layer
├── products.php     # Data Layer
├── SAD.md
├── Processing_flowchart.md
└── README.md
```

## 📐 Aturan Bisnis
1. **Nilai stok per produk** = Harga × Stok.
2. **Total nilai stok** = jumlah nilai stok seluruh produk.
3. **Stok kritis** = stok **kurang dari 3** (tepat 3 dianggap aman).
4. Baris produk kritis ditandai warna berbeda pada tabel.

## 🔄 Alur Singkat
1. Pengguna membuka `index.php`.
2. Data dan fungsi dimuat dengan `require_once`.
3. Total nilai stok dihitung.
4. `foreach` menelusuri produk; baris kritis diberi warna.
5. Tabel dan total nilai stok ditampilkan.

## ✅ Checklist Sesi Desain
- [x] Menentukan tujuan dan ruang lingkup
- [x] Merancang arsitektur tiga layer
- [x] Mendefinisikan skema data produk
- [x] Merancang logika `hitungTotalNilaiStok()`
- [x] Merancang aturan stok kritis
- [x] Membuat flowchart proses
- [ ] Implementasi kode (sesi berikutnya)

## 🚀 Langkah Berikutnya
Pada sesi implementasi, pengerjaan disarankan berurutan: `products.php` → `functions.php` → `index.php`, lalu diuji dengan tabel skenario di `Processing_flowchart.md`.

## 🧰 Kebutuhan Lingkungan (Tahap Implementasi)
- PHP 8.x
- Web server lokal (misalnya XAMPP / Laragon / `php -S`)
- Browser modern

## 📝 Lisensi & Penggunaan
Proyek pembelajaran (mini project). Bebas dipakai untuk keperluan belajar.
