<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Portfolio;

class PortfolioDetails extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'portfolio_id', 'image', 'details'
    ];

    public $table = 'portfolio_details';

    public function user()
    {
        $this->belongsTo('Portfolio');
    }
}
