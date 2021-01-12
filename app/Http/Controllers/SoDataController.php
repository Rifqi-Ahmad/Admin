<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cart;
use Session;
use DB;

class SoDataController extends Controller
{
    public function index()
    {
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
            ->where('id', $request->id)
            ->first();

        $data1 = DB::table('sodetail')
        ->select('*')
        ->where('pocode', $data->code)
        ->get();        

        $total = 0;

        foreach($data1 as $item){
            $total+= $item->sub;
            Session(['total' => $total]);    
        }

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

        $total = 0;

        foreach($data1 as $item){
            \Cart::add(array(
                'id' => $item->code,
                'desc' => $item->desc,
                'color' => $item->color,
                'unit' => $item->unit,
                'qty' => (int)($item->qty),
                'price' => (int)($item->price),
                'sub' => (int)$item->qty * (int)$item->price
            ));
        }

        foreach(\Cart::getContent() as $item){
            $total+= $item->sub;
            Session(['total' => $total]);    
        }

        Session([
            'tgl' => $data->date,
            'code' => $data->code,
            'vendor' => $data->vendor,
            'note' => $data->note
        ]);

        return view('/salesorder/so', compact('data', 'data1'));
    }

    public function edit(request $request)
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

        $total = 0;

        foreach($data1 as $item){
            \Cart::add(array(
                'id' => $item->code,
                'desc' => $item->desc,
                'color' => $item->color,
                'unit' => $item->unit,
                'qty' => (int)($item->qty),
                'price' => (int)($item->price),
                'sub' => (int)$item->qty * (int)$item->price
            ));
        }

        foreach(\Cart::getContent() as $item){
            $total+= $item->sub;
            Session(['total' => $total]);    
        }

        Session([
            'tgl' => $data->date,
            'code' => $data->code,
            'take' => $data->take,
            'finished' => $data->finished,
            'note' => $data->note
        ]);

        $br = DB::table('masterbarang')->get();

        return view('/salesorder/edit', compact('data', 'data1', 'br'));
    }

    public function add(Request $request){

        \Cart::add(array(
            'id' => $request->id,
            'desc' => $request->desc,
            'color' => $request->color,
            'unit' => $request->unit,
            'qty' => (int)($request->qty),
            'price' => (int)($request->price),
            'sub' => (int)$request->qty * (int)$request->price
        ));

        $total=0;

        foreach(\Cart::getContent() as $item){
            $total+= $item->sub;
            Session(['total' => $total]);    
        }

        return redirect()->route('sdata.edit', Session()->get('index'));

    }

    public function update(request $request)
    {
        DB::table('salesorder')
            ->where('id', Session()->get('index'))
            ->update([
                'id' => Session()->get('index'),
                'code' => Session::get('code'),
                'date' => date('d-m-y'),
                'take' => $request->take,
                'finished' => $request->finished,
                'note' => $request->note
            ]);

        foreach(\Cart::getContent() as $item){
            $iters = DB::table('sodetail')->max('id');
            $ids = (int)$iters;
            $ids++;

            DB::table('sodetail')->updateOrInsert(
                ['code' => $item->id,],
                [
                'id' => $ids,
                'pocode' => Session::get('code'),
                'code' => $item->id,
                'desc' => $item->desc,
                'color' => $item->color,
                'unit' => $item->unit,
                'qty' => $item->qty,
                'price' => $item->price,
                'sub' => $item->sub
                ]
            );
        }
        Session::flush();
        \Cart::clear();
        return redirect()->route('sdata.edit', Session()->get('index'));
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
