<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cart;
use Session;
use PDF;

class PoDataController extends Controller
{
    public function index()
    {
        if (Session::has('index')) {
            Session::flush();
            \Cart::clear();
        }
        
        $data = DB::table('purchaseorder')->get();
        return view('/purchaseorder/data', compact('data'));
    }

    public function pdf(request $request)
    {
        Session([
            'index' => $request->id
        ]);
        $data = DB::table('purchaseorder')
            ->select('*')
            ->where('id', $request->id)
            ->first();

        $data1 = DB::table('podetail')
        ->select('*')
        ->where('pocode', $data->code)
        ->get();        

        $pdf = PDF::loadview('/purchaseorder/pdf',compact('data', 'data1'));
        return $pdf->stream();
    }

    public function show(request $request)
    {
        Session([
            'index' => $request->id
        ]);
        $data = DB::table('purchaseorder')
            ->select('*')
            ->where('id', $request->id)
            ->first();

        $data1 = DB::table('podetail')
        ->select('*')
        ->where('pocode', $data->code)
        ->get();        

        

        return view('/purchaseorder/po', compact('data', 'data1'));
    }

    public function delete(request $request)
    {
        $code = DB::table('purchaseorder')->where('id', '=', $request->id)->value('code');

        DB::table('purchaseorder')->where('id', '=', $request->id)->delete();
        DB::table('podetail')->where('pocode', '=', $code)->delete();

        return redirect()->route('data.index');
    }
}
