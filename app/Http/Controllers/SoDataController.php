<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cart;
use Session;
use DB;
use PDF;

class SoDataController extends Controller
{
    public function index()
    {
        if (Session::has('index')) {
            Session::flush();
            \Cart::clear();
        }

        $data = DB::table('salesorder')->get();
        return view('/salesorder/data', compact('data'));
    }

    public function pdf(request $request)
    {
        Session([
            'index' => $request->id
        ]);
        $data = DB::table('salesorder')
            ->select('*')
            ->where('id', '=',$request->id)
            ->first();

        $data1 = DB::table('sodetail')
        ->select('*')
        ->where('pocode', '=',$data->code)
        ->get();        

        $pdf = PDF::loadview('/salesorder/pdf',compact('data', 'data1'));
        return $pdf->stream();
    }

    public function show(request $request)
    {
        Session([
            'index' => $request->id
        ]);
        $data = DB::table('salesorder')
            ->select('*')
            ->where('id', $request->id)
            ->first();

        $data1 = DB::table('sodetail')
        ->select('*')
        ->where('pocode', $data->code)
        ->get();        

        return view('/salesorder/so', compact('data', 'data1'));
    }

    public function remove(Request $request){
        \Cart::remove($request->code);
        return redirect()->route('sdata.edit', Session()->get('index'));
    }

    public function delete(request $request)
    {
        $code = DB::table('salesorder')->where('id', '=', $request->id)->value('code');

        DB::table('salesorder')->where('id', '=', $request->id)->delete();
        DB::table('sodetail')->where('pocode', '=', $code)->delete();

        return redirect()->route('sdata.index');
    }
}
