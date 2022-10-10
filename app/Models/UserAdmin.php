<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserAdmin extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $table = 'useradmin';
    protected $primaryKey = 'id_admin';
    protected $fillable = [
        'nama',
        'email',
        'nip',
        'subbid',
        'role',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function MstrRole()
    {
        return $this->hasOne('App\Models\MstrRole');
    }
}
