<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderBarang extends Model
{
    use HasFactory;
    protected $table = "order_barang";
    protected $primaryKey = "no_po";
    protected $guarded = [];

    /**
     * Get the supplier that owns the OrderBarang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class, 'kode_supplier', 'kode_supplier');
    }

    /**
     * Get the detail associated with the OrderBarang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detail(): HasOne
    {
        return $this->hasOne(OrderDetail::class, 'no_po', 'no_po');
    }
}
