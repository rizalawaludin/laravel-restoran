<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\drink;
use App\food;

class MenuController extends Controller
{
    public function food(){
        $food = food::all();

        return view('menu.food',compact('food'));
    }
    public function createFood(Request $request){
        food::create($request->all());

        return back();
    }
    public function drink(){
        $drink = drink::all();

        return view('menu.drink',compact('drink'));
    }
    public function createDrink(Request $request){
        drink::create($request->all());

        return back();
    }
}
