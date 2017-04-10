<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class SocialLogin extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'provider_id', 'provider', 'user_id',
    ];

    public $table = 'social_login';

    public function user()
    {
        return $this->belongsTo('User');
    }
}
