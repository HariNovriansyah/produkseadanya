<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokProduk extends Model
{
    use HasFactory;
    protected $table = 'kelompok_produk';
    protected $guarded = [];
    public function produks()
    {
        return $this->hasMany(Produk::class, 'kelompok_produk_id');
    }
}
