<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payment;
use App\order;

class PaymentController extends Controller
{
    public function index(){
        $order = order::all();

        return view('payment',compact('order'));
    } 
    public function store(){
        
    }
}
