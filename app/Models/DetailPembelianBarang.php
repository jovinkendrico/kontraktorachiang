<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailPembelianBarang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'detail_pembelian_barangs';

    protected $fillable = ['pembelian_barang_id', 'barang_id', 'merk', 'qty', 'uom', 'harga'];

    public function pembelianbarang(): BelongsTo
    {
        return $this->belongsTo(PembelianBarang::class, 'pembelian_barang_id', 'id');
    }

    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }
    public function totalharga()
    {
        return $this->qty * $this->harga;
    }
}
