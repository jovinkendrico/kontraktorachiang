<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailPembelianBarang extends Model
{

    protected $table = 'detail_pembelian_barangs';

    protected $fillable = ['pembelian_barang_id', 'barang_id', 'merk', 'qty', 'uom', 'harga'];

    use HasFactory, SoftDeletes;
}
