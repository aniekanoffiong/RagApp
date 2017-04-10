<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Categories;

class UserCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'category_id'
    ];

    public function user()
    {
        return $this->belongsToMany('User');
    }

    public function category()
    {
        return $this->belongsToMany('Categories');
    }

}
