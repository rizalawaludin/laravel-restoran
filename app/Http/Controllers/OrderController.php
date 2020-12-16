<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use App\food;
use App\drink;
use Carbon\Carbon;
use DB;

class OrderController extends Controller
{
    public function index(){
        $product = order::all();
        $food = food::all();
        $drink = drink::all();

        return view('order',compact('product','food','drink'));
    }
    public function create(Request $request){
        $validatedData = $request->validate([
            'no_meja' => 'required',
            'pelanggan' => 'required',
            'id_food' => 'required',
            'id_drink' => 'required',
        ]);
        $kode = $this->no_pesanan();
        $project = order::create([
            'no_meja' => $validatedData['no_meja'],
            'pelanggan' => $validatedData['pelanggan'],
            'id_food' => $validatedData['id_food'],
            'id_drink' => $validatedData['id_drink'],
            'no_pesanan' => $kode,
            'status' => 'aktif'
        ]);
        return back();
    }
    public function edit($id){
        $a = order::find($id);
        $b= food::find($id);
        $c = drink::find($id);

        return view('update',compact('a','b','c'));
    }
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'no_meja' => 'required',
            'pelanggan' => 'required',
            'id_food' => 'required',
            'id_drink' => 'required',
        ]);
        $posts = order::first();
        $posts->no_meja = $request->no_meja;
        $posts->pelanggan = $request->pelanggan;
        $posts->id_food = $request->id_food;
        $posts->id_drink = $request->id_drink;
        $posts->no_pesanan = $request->no_pesanan;
        $posts->status = $request->status;
        $posts->save();
        return redirect('/order');
    }
    public function delete($id){
        $product = order::find($id)->delete();
        return redirect()->back();
    }
    public function no_pesanan()
    {
        $kd="";
        $query = DB::table('orders')->select(DB::raw('MAX(RIGHT(no_pesanan,4)) as kd_max'))->whereDate('created_at',Carbon::today());
        if ($query->count()>0) {
          foreach ($query->get() as $key ) {
          $tmp = ((int)$key->kd_max)+1;
          $kd = sprintf("%03s", $tmp);
          }
        }else {
          $kd = "001";
        }
        return  "ABC".date('dmY-').$kd;
    }
}
