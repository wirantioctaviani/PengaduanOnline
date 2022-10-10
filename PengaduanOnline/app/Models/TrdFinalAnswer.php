<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrdFinalAnswer extends Model
{
    use HasFactory;
    protected $table = 'trd_finalanswer';
    protected  $primaryKey = 'id_finalanswer';
    protected $fillable = ['mstr_pengaduan_id', 'no_tiket','user_id','final_answer', 'created_at', 'updated_at'];
}
