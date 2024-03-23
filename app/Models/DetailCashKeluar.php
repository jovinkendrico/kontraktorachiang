<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailCashKeluar extends Model
{
    protected $table = 'detail_cash_keluars';

    protected $fillable = ['kas_keluar_id', 'deskripsi', 'harga'];

    use HasFactory, SoftDeletes;
}
