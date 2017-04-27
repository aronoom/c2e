<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['phrase','visualiser'];
    protected $table ='notifications';
    public function ()
    {
    	return ;
    }
    
}
