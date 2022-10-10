<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstrBidang extends Model
{
    use HasFactory;
    protected $table = 'mstr_bidang';
    protected  $primaryKey = 'id_bidang';
    protected $fillable = ['nama_bidang', 'subbid_id', 'bidang_id'];
}
