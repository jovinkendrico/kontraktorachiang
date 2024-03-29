<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailCashKeluar extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'detail_cash_keluars';

    protected $fillable = ['kas_keluar_id', 'deskripsi', 'harga'];

    public function kaskeluar(): BelongsTo
    {
        return $this->belongsTo(KasKeluar::class);
    }

    public function totalharga()
    {
        return $this->harga;
    }
}
