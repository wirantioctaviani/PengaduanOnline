<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrdBukti extends Model
{
    use HasFactory;
    protected $table = 'trd_bukti';
    protected  $primaryKey = 'id';
    protected $fillable = ['mstr_pengaduan_id', 'nama_file','created_at', 'updated_at'];
}
