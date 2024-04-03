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

    public function payment(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function getTotalPembelian()
    {
        $total = 0;

        foreach ($this->pembelianbarang as $detail) {
            $total += $detail->getTotalHarga();
        }

        return $total;
    }

    public function getTotalJasa()
    {
        $total = 0;

        foreach ($this->kaskeluar as $detail) {
            $total += $detail->getTotalJasa();
        }
        return $total;
    }

    public function getProfit()
    {
        return $this->totalharga - $this->getTotalPembelian() - $this->getTotalJasa();
    }

    public function getTotalPayment()
    {
        $total = 0;

        foreach ($this->payment as $detail) {
            $total += $detail->total_bayar;
        }

        return $total;
    }

    public function countRows()
    {
        return self::count();
    }
}
