<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function evidences()
    {
        return $this->hasMany('App\Evidence');
    }

    public function hasRole($rol_param)
    {
        foreach($this->roles as $rol)
        {
            if($rol->rol == $rol_param)
            {
                return true;
            }
        }
        return false;
    }

    public function coordinator()
    {
        return $this->hasOne('App\Coordinator');
    }

    public function secretary()
    {
        return $this->hasOne('App\Secretary');
    }

    public function defaultLists()
    {
        return $this->belongsToMany('App\DefaultList');
    }

    public function meetings()
    {
        return $this->belongsToMany('App\Meeting');
    }

    public function bonus()
    {
        return $this->belongsToMany('App\Bonus');
    }

    public function avatar()
    {
        return $this->hasOne('App\Avatar');
    }
}
