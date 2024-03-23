<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KasKeluar extends Model
{
    protected $table = 'kas_keluars';
    protected $fillable = ['tanggal', 'project_id', 'deskripsi'];
    use HasFactory, SoftDeletes;
}
