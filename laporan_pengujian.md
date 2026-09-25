# Laporan Debugging

| No. | Nama Bug | Penyebab | Solusi | Status |
|:---:|:---------|:--------|:------|:------:|
| 1 | Stok Minus | Tidak ada validasi jumlah beli vs stok | Tambah validasi `$request->jumlah <= $produk->stok` | Fixed |
| 2 | Error Subtotal | Variabel harga bertipe string | Ubah tipe data ke `(int)` sebelum dikali | Fixed |

---
