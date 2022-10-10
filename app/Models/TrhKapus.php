<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrhKapus extends Model
{
    use HasFactory;
    protected $table = 'trh_kapus';
    protected  $primaryKey = 'idt_penanggungjawab';
    protected $fillable = ['mstr_pengaduan_id', 'kapus_id', 'assigned_by','is_answering','has_chosen', 'created_at', 'updated_at'];
}
