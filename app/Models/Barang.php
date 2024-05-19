<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barang extends Model
{
    use HasFactory;

    protected $table = "barang";
    protected $primaryKey = "kode_barang";

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'unit',
        'ukuran',
        'warna',
        'jenis',
        'harga_satuan',
        'stok'
    ];

}
