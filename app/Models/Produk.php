<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produk extends Model
{
    use HasFactory;


    protected $table = 'produk';


    protected $fillable = [
        'nama_produk',
        'harga',
        'stok',
    ];


    protected $casts = [
        'harga' => 'integer',
        'stok' => 'integer',
    ];

    
    public function detailTransaksis(): HasMany
    {
        return $this->hasMany(DetailTransaksi::class, 'produk_id');
    }
}
