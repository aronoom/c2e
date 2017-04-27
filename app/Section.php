<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
   protected $fillable =['contenu','titre','chapitre_id','numero'];
   protected $table    = 'sections';
   public function chapitre(){
   		return $this->belongsTo('App\Chapitre');
   }
   public function exemples(){
   		return $this->hasMany('App\Exemple');
   }
}
