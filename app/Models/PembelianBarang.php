<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PembelianBarang extends Model
{
    protected $table = 'pembelian_barangs';

    protected $fillable = ['tanggal', 'project_id', 'supplier', 'status', 'jatuh_tempo'];
    use HasFactory, SoftDeletes;
}
