# SPESIFIKASI PROGRAM KASIRKU

## 1. Deskripsi Aplikasi

KasirKu adalah aplikasi web penjualan sederhana yang digunakan untuk mencatat transaksi penjualan barang secara digital.

Aplikasi dibuat menggunakan framework Laravel dan digunakan untuk membantu proses pengelolaan produk serta transaksi penjualan.

## 2. Daftar Fitur

Fitur utama aplikasi KasirKu:

1. Menampilkan daftar produk.
2. Menampilkan nama produk, harga, dan stok.
3. Menambahkan data produk.
4. Mengubah data produk.
5. Menghapus data produk.
6. Membuat transaksi penjualan.
7. Memilih produk yang akan dibeli.
8. Menentukan jumlah barang yang dibeli.
9. Menghitung subtotal.
10. Menghitung total pembayaran.
11. Menyimpan transaksi ke database.
12. Mengurangi stok setelah transaksi.
13. Menampilkan riwayat transaksi.
14. Menampilkan detail transaksi.

## 3. Struktur Database

Database KasirKu menggunakan beberapa tabel utama.

### Tabel Produk

| Field | Keterangan |
|---|---|
| id | Primary key |
| nama_produk | Nama produk |
| harga | Harga produk |
| stok | Jumlah stok produk |

### Tabel Transaksi

| Field | Keterangan |
|---|---|
| id | Primary key |
| tanggal | Tanggal transaksi |
| total_bayar | Total pembayaran |

### Tabel Detail Transaksi

| Field | Keterangan |
|---|---|
| id | Primary key |
| transaksi_id | ID transaksi |
| produk_id | ID produk |
| jumlah | Jumlah produk yang dibeli |
| subtotal | Harga × jumlah |

## 4. Relasi Database

Relasi database yang digunakan:

- Satu transaksi memiliki banyak detail transaksi.
- Satu detail transaksi memiliki satu transaksi.
- Satu produk dapat digunakan pada banyak detail transaksi.
- Satu detail transaksi memiliki satu produk.

## 5. Route yang Digunakan

Route utama aplikasi meliputi:

- Route produk
- Route transaksi
- Route riwayat transaksi
- Route detail transaksi

Daftar route lengkap terdapat pada file:

`routes/web.php`

## 6. Alur Transaksi

Alur transaksi pada aplikasi KasirKu:

```text
Mulai
   ↓
Pilih Produk
   ↓
Masukkan Jumlah Pembelian
   ↓
Periksa Stok
   ↓
Stok Cukup?
   ├── Tidak → Tampilkan Pesan Error
   │
   └── Ya
        ↓
   Hitung Subtotal
        ↓
   Simpan Transaksi
        ↓
   Simpan Detail Transaksi
        ↓
   Kurangi Stok Produk
        ↓
   Hitung Total Bayar
        ↓
   Tampilkan Hasil Transaksi
        ↓
      Selesai