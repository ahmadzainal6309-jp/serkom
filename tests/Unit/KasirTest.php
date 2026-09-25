<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Produk;
use App\Http\Controllers\TransaksiController;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KasirTest extends TestCase
{
    use RefreshDatabase;

    // TES 1: Uji Perhitungan Subtotal
    public function test_hitung_subtotal()
    {
        $kasir = new TransaksiController();

        // Cek: Apakah 15.000 x 3 = 45.000?
        $this->assertEquals(
            45000,
            $kasir->hitungSubtotal(15000, 3)
        );
    }

    // TES 2: Uji Pengurangan Stok
    public function test_kurangi_stok()
    {
        // 1. Buat data produk dummy (stok = 10)
        $produk = Produk::create([
            'nama_produk' => 'Buku',
            'harga' => 5000,
            'stok' => 10
        ]);

        // 2. Kurangi stok sebanyak 3
        $kasir = new TransaksiController();
        $kasir->kurangiStok($produk->id, 3);

        // 3. Cek apakah stok menjadi 7
        $this->assertEquals(
            7,
            $produk->fresh()->stok
        );
    }
}
