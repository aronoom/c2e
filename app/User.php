<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    public function tutoriels() 
    {
        return $this->hasMany('App\Tutoriel');
    }
    public function forums() 
    {
        return $this->hasMany('App\Forum');
    }
    public function commentaires() 
    {
        return $this->hasMany('App\Commentaire');
    }
    

    public function universites()
    {
        return $this->belongsToMany('App\universite','user_universite');
    }
    public function domain()
    {
        return $this->belongsTo('App\Domain');
    }
    public function badgets()
    {
        return $this->belongsToMany('App\badget','user_badget');
    }

    protected $fillable = [
        'name', 'email', 'password','login','telephone','adresse','Motif_insrciption','date_inscription',
        'date_activation','nombre_de_connection','mode_economique','connecter','nbr_vue','image'
    ];
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];
}
