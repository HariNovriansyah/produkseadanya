<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'produk';
    protected $guarded = [];
    protected $primaryKey = 'kode_produk';
    protected $keyType = 'string';

    public function kelompokProduk()
    {
        return $this->belongsTo(KelompokProduk::class, 'kelompok_produk_id');
    }
}
