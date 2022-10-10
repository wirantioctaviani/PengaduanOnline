<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstrRole extends Model
{
    use HasFactory;
    protected $table = 'mstr_role';
    protected  $primaryKey = 'id_role';
    protected $fillable = ['nama_role'];

    public function Users()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
