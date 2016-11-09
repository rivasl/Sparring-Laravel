<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand', 'model',
    ];

}
