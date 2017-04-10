<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Jobs extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'category_id', 'employer_id', 'description', 'amount', 'deadline', 'status'
    ];

    public $table = 'jobs';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    public function user()
    {
        return $this->belongsTo('User');
    }
}
