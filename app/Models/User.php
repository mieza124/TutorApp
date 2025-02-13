<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    #use HasApiTokens, Notifiable;
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'userid', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tutor()
    {
        return $this->hasOne(Tutor::class);
    }
}
