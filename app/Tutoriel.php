<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutoriel extends Model
{
    protected $fillable = ['nom','description','introduction','valider','nbr_vue','user_id','niveau_id'];
    public $timestamps = true;
    public function user() 
    {
        return $this->belongsTo('App\User');
    }
    public function types()
    {
    	return $this->belongsToMany('App\Type','tutoriel_type');
    }
    public function chapitres()
    {
        return $this->hasMany('App\Chapitre');
    }
    public function commentaire_tutoriels()
    {
        return $this->hasMany('App\Commentaire_tutoriel');
    }
    public function niveau()
    {
        return $this->belongsTo('App\Niveau');
    }
}
