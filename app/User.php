<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'birthdate', 'email', 'twitter', 'password',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getFullNameAttribute(){
        return $this->first_name . ' ' . $this->last_name;
    }


    public function getAgeAttribute(){
        return \Carbon\Carbon::parse($this->birthdate)->age;
    }


    // Relación
    public function vehicles()
    {
        return $this->hasMany('App\Vehicle', 'owner_id');
    }
}
