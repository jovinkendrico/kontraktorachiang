<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'projects';

    protected $fillable = ['nama', 'lokasi', 'totalharga'];


    public function pembelianbarang(): HasMany
    {
        return $this->hasMany(PembelianBarang::class);
    }

    public function kaskeluar(): HasMany
    {
        return $this->hasMany(KasKeluar::class);
    }
}

