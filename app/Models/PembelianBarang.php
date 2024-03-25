<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PembelianBarang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pembelian_barangs';

    protected $fillable = ['tanggal', 'project_id', 'supplier', 'status', 'jatuh_tempo'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
    public function detailpembelianbarang(): HasMany
    {
        return $this->hasMany(DetailPembelianBarang::class);
    }

    public function getTotalHarga()
    {
        $totalHarga = 0;

        foreach ($this->detailpembelianbarang as $detail) {
            $totalHarga += $detail->totalharga();
        }

        return $totalHarga;
    }
}
