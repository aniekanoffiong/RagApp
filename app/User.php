<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\SocialLogin;
use App\Jobs;
use App\Rating;
use App\Profile;
use App\UserCategory;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $incrementing = false;

    public function socialLogin()
    {
        return $this->hasMany('SocialLogin');
    }

    public function jobs()
    {
        return $this->hasMany('Jobs');
    }

    public function profile()
    {
        return $this->hasOne('Profile');
    }

    public function rating()
    {
        return $this->hasMany('Rating');
    }

    public function user_category()
    {
        return $this->hasMany('UserCategory');
    }

    public function fullName()
    {
        return $this->first_name .' '. $this->last_name;
    }
}
