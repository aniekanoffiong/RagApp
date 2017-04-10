<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UserCategory;

class Categories extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category'];

    public $table = 'categories';

    public function user_category()
    {
        return $this->hasMany('UserCategory');
    }
}
