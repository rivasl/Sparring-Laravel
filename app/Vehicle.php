<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'vehicles';
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand', 'model', 'plate','owner_id'
    ];

    // Relación
    public function owner()
    {
        return $this->belongsTo('App\User', 'foreign_key', 'id');
    }

}
