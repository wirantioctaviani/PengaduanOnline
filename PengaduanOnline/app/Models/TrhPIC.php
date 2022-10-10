<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrhPIC extends Model
{
    use HasFactory;
    protected $table = 'trh_pic';
    protected  $primaryKey = 'idt_pic';
    protected $fillable = ['idt_subkoordinator', 'mstr_pengaduan_id','subbid_id','pic_id', 'status_pic','created_at', 'updated_at'];
}
