<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sold_units', 'number_days', 'probability', 'accumulate_probability'
    ];
}
