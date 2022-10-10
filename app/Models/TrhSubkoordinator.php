<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrhSubkoordinator extends Model
{
    use HasFactory;
    protected $table = 'trh_subkoordinator';
    protected  $primaryKey = 'id';
    protected $fillable = ['mstr_pengaduan_id','subbid_id', 'subkoor_id','has_chosen', 'created_at', 'updated_at'];
}
