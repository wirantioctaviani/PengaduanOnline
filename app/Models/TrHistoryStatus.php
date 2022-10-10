<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrHistoryStatus extends Model
{
    use HasFactory;
    protected $table = 'tr_history_status';
    protected  $primaryKey = 'id_history';
    protected $fillable = ['mstr_pengaduan_id','status_id', 'user_id', 'keterangan', 'created_at', 'updated_at'];
}
