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

        $total = 0;

        foreach($data1 as $item){
            $total+= $item->sub;
            Session(['total' => $total]);    
        }

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

        return view('/purchaseorder/po', compact('data', 'data1'));
    }

    public function edit(request $request)
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

        return view('/purchaseorder/edit', compact('data', 'data1'));
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

        return redirect()->route('data.edit', Session()->get('index'));

    }

    public function update(request $request)
    {
        DB::table('purchaseorder')
            ->where('id', Session()->get('index'))
            ->update([
                'id' => Session()->get('index'),
                'code' => Session::get('code'),
                'date' => date('d-m-y'),
                'vendor' => $request->vendor,
                'note' => $request->note
            ]);

        foreach(\Cart::getContent() as $item){
            $iters = DB::table('podetail')->max('id');
            $ids = (int)$iters;
            $ids++;

            DB::table('podetail')->updateOrInsert(
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
        return redirect()->route('data.edit', Session()->get('index'));
    }

    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('data.edit', Session()->get('index'));
    }

    public function delete(request $request)
    {
        $code = DB::table('purchaseorder')->where('id', '=', $request->id)->value('code');

        DB::table('purchaseorder')->where('id', '=', $request->id)->delete();
        DB::table('podetail')->where('pocode', '=', $code)->delete();

        return redirect()->route('data.index');
    }
}
