<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Notifications\User\ResetPassword;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function sendPasswordResetNotification($token)
    {


        $this->notify(new ResetPassword($token));


    }




    public function profile()
    {
        return $this->hasMany('App\Profile');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
