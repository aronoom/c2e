<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    protected $table ='Annonces';
    protected $fillable =['text','titre'];
    public function user() 
    {
        return $this->belongsTo('App\User');
    }
}
