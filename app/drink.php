<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class drink extends Model
{
    protected $guarded = [];
    
    protected $fillable = ['name','price'];

    public function orders(){
    	return $this->belongsTo('App\order');
    }
}
