<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class KasKeluar extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kas_keluars';
    protected $fillable = ['tanggal', 'project_id', 'deskripsi'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function detailcashkeluar(): HasMany
    {
        return $this->hasMany(DetailCashKeluar::class);
    }

    public function getTotalHarga()
    {
        $totalHarga = 0;

        foreach ($this->detailcashkeluar as $detail) {
            $totalHarga += $detail->totalharga();
        }

        return $totalHarga;

    public function totalharga()
    {
        return $this->detailcashkeluar()->sum('harga');
    }
}
