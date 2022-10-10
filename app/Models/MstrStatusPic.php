<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstrStatusPic extends Model
{
    use HasFactory;
    protected $table = 'mstr_status_pic';
    protected  $primaryKey = 'id_status';
    protected $fillable = ['keterangan'];
}
