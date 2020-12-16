<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class food extends Model
{
    protected $table = 'foods';
    
    protected $fillable = ['name','price'];

    public function orders(){
    	return $this->belongsTo('App\order');
    }
}
