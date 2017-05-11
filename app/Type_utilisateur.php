<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_utilisateur extends Model
{
    protected $table = 'types_utilisateurs';
    protected $fillable = ['terme'];
    function users()
    {
    	return $this->hasMany('App\User');
    }
}
