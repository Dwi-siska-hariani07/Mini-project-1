# Processing Flowchart
## Mini Project 1: Product Information System (Desain)

Dokumen ini menggambarkan alur logika sistem secara visual. Ini adalah **rancangan konseptual**, bukan kode program.

---

## 1. Flowchart Utama (Alur `index.php`)

```mermaid
flowchart TD
    START([Mulai: pengguna membuka index.php]) --> REQ1[require_once products.php]
    REQ1 --> REQ2[require_once functions.php]
    REQ2 --> CEK{Data produk tersedia?}

    CEK -- Tidak --> EMPTY[Tampilkan pesan: data produk belum tersedia]
    EMPTY --> FINISH([Selesai])

    CEK -- Ya --> HITUNG[Panggil hitungTotalNilaiStok dengan data produk]
    HITUNG --> TOTAL[/Simpan hasil total nilai stok/]
    TOTAL --> HEAD[Cetak kerangka tabel HTML dan header kolom]
    HEAD --> LOOP{Masih ada produk berikutnya? foreach}

    LOOP -- Ya --> AMBIL[Ambil satu produk]
    AMBIL --> KOND{Stok < 3?}
    KOND -- Ya --> ROWK[Cetak baris dengan warna peringatan stok kritis]
    KOND -- Tidak --> ROWN[Cetak baris normal]
    ROWK --> LOOP
    ROWN --> LOOP

    LOOP -- Tidak --> TUTUP[Tutup tabel HTML]
    TUTUP --> RINGKAS[/Tampilkan Total Nilai Stok/]
    RINGKAS --> FINISH
```

---

## 2. Flowchart Fungsi `hitungTotalNilaiStok()`

```mermaid
flowchart TD
    S([Mulai fungsi]) --> IN[/Terima array produk/]
    IN --> INIT[Set total = 0]
    INIT --> L{Masih ada produk? }

    L -- Ya --> P[Ambil satu produk]
    P --> V{Harga dan Stok valid berupa angka?}
    V -- Tidak --> SKIP[Lewati produk ini]
    V -- Ya --> HIT[Nilai produk = Harga x Stok]
    HIT --> ADD[total = total + nilai produk]
    ADD --> L
    SKIP --> L

    L -- Tidak --> OUT[/Kembalikan total/]
    OUT --> E([Selesai fungsi])
```

---

## 3. Flowchart Logika Conditional (Stok Kritis)

```mermaid
flowchart LR
    A[/Nilai Stok produk/] --> B{Stok < 3?}
    B -- Ya --> C[Status: KRITIS]
    C --> D[Baris diberi warna peringatan]
    B -- Tidak --> E[Status: AMAN]
    E --> F[Baris tanpa warna khusus]
```

---

## 4. Sequence Diagram Antar Layer

```mermaid
sequenceDiagram
    actor U as Pengguna
    participant I as index.php (Presentation)
    participant D as products.php (Data)
    participant F as functions.php (Processing)

    U->>I: Buka halaman
    I->>D: require_once (muat data)
    I->>F: require_once (muat fungsi)
    I->>F: hitungTotalNilaiStok(data produk)
    F->>D: Baca nilai Harga dan Stok tiap produk
    F-->>I: Total nilai stok
    loop foreach tiap produk
        I->>F: Cek stok < 3?
        F-->>I: Kritis / Aman
        I->>I: Cetak baris tabel (warna sesuai status)
    end
    I-->>U: Tabel produk + Total Nilai Stok
```

---

## 5. Tabel Uji Skenario (Trace Logika)

Contoh penelusuran manual memakai data konseptual:

| ID | Harga | Stok | Nilai (Harga x Stok) | Stok < 3? | Tampilan Baris |
|---|---|---|---|---|---|
| 1 | 8.000.000 | 10 | 80.000.000 | Tidak | Normal |
| 2 | 150.000 | 2 | 300.000 | Ya | Peringatan |
| 3 | 300.000 | 5 | 1.500.000 | Tidak | Normal |
| 4 | 2.000.000 | 1 | 2.000.000 | Ya | Peringatan |
| | | | **Total: 83.800.000** | | |

### Kasus Batas
| Skenario | Hasil yang Diharapkan |
|---|---|
| Stok = 3 | Normal (batas kritis adalah kurang dari 3) |
| Stok = 0 | Peringatan; nilai stok 0 |
| Array produk kosong | Pesan data belum tersedia; total 0 |
| Harga/Stok bukan angka | Produk dilewati dari perhitungan |

---

## 6. Keterangan Simbol

| Simbol | Arti |
|---|---|
| Oval `([ ])` | Awal / akhir proses |
| Persegi `[ ]` | Langkah proses |
| Belah ketupat `{ }` | Keputusan / percabangan |
| Jajar genjang `[/ /]` | Input / output |
