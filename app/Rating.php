<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Rating extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'category_id', 'general_experience', 'timely_delivery', 'product_quality', 'product_accuracy', 'comments',
    ];

    public function user()
    {
        return $this->belongsTo('User');
    }
}
