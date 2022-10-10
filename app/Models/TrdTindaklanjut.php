<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrdTindaklanjut extends Model
{
    use HasFactory;
    protected $table = 'trd_tindaklanjut';
    protected  $primaryKey = 'id_tindaklanjut';
    protected $fillable = ['mstr_pengaduan_id', 'idt_pic','user_id','subbid_id','tindak_lanjut', 'created_at', 'updated_at'];
}
