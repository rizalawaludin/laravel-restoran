<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $guarded = [];
    
    protected $fillable = ['no_meja','pelanggan','id_food','id_drink','no_pesanan','status'];

    public function foods(){
	    return $this->hasMany('App\food','id','id_food');
    }
    public function drinks(){
	    return $this->hasMany('App\drink','id','id_drink');
	}
}
