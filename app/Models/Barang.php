<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    protected $table = 'barangs';

    protected $fillable = ['nama'];
    use HasFactory, SoftDeletes;
}
