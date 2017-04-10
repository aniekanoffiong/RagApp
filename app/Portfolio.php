<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Categories;

class Portfolio extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'category_id', 'portfolio'
    ];

    public $table = 'portfolios';

    public function user()
    {
        $this->belongsTo('User');
    }

    public function category()
    {
        $this->belongsTo('Categories');
    }

}
