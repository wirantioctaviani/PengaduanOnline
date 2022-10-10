<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrdDokumen extends Model
{
    use HasFactory;
    protected $table = 'trd_dokumen';
    protected  $primaryKey = 'id';
    protected $fillable = ['mstr_pengaduan_id','trh_pengaduan_id','trd_tindaklanjut_id', 'nama_file','created_at', 'updated_at'];
}
