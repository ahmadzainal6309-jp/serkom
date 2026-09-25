<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;


class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        
        $daftarProduk = [
            ['nama_produk' => 'Himi Gouache',    'harga' => 125000,  'stok' => 120],
            ['nama_produk' => 'Canvas',        'harga' =>10000,  'stok' => 80],
            ['nama_produk' => 'Painting Brush 1 set',   'harga' => 21000,  'stok' => 60],
            ['nama_produk' => 'Himi Gouache Refill',         'harga' => 25000, 'stok' => 25],
            ['nama_produk' => 'Palette',  'harga' => 6000, 'stok' => 40],
            ['nama_produk' => 'Drawing Pen Joyko',    'harga' => 6500, 'stok' => 35],
            ['nama_produk' => 'Pensil 2B Faber-Castell', 'harga' => 3000, 'stok' => 50],
            ['nama_produk' => 'Watercolor Paper Baohong',    'harga' => 15000,  'stok' => 0],   
        ];

        foreach ($daftarProduk as $produk) {
           
            Produk::firstOrCreate(['nama_produk' => $produk['nama_produk']], $produk);
        }
    }
}
