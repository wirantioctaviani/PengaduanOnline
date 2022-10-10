<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrhKoordinator extends Model
{
    use HasFactory;
    protected $table = 'trh_koordinator';
    protected  $primaryKey = 'id';
    protected $fillable = ['mstr_pengaduan_id','bidang_id', 'koor_id', 'assigned_by','has_chosen', 'created_at', 'updated_at'];
}
