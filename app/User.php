<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $guarded = [];
    protected $fillable = [
        'name', 'email', 'password','role',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users';
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

}
