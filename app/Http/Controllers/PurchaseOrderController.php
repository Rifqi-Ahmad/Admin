<?php

namespace App\Http\Controllers;
use App\PurchaseOrder;
use App\cart;
use Session;
use DB;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $t = date('Y');
        $b = date('m');
        $max = DB::table('purchaseorder')->max('code');
        $count = (int) substr($max, 11, 3);
        $count++;
        $code = 'PO/'.$t.'/'.$b.'/'.sprintf("%03s", $count);

        Session(['code' => $code]);

        return view('/purchaseorder/index',['code' => $code]);
    }

    public function data()
    {
        return view('/purchaseorder/data');
    }

   

    public function add(Request $request){

        Session([
            'tgl' => $request->tgl,
            'vendor' => $request->vendor,
            'note' => $request->note
        ]);

        \Cart::add(array(
            'id' => $request->id,
            'desc' => $request->desc,
            'color' => $request->color,
            'unit' => $request->unit,
            'qty' => (int)($request->qty),
            'price' => (int)($request->price),
            'sub' => (int)$request->qty * (int)$request->price
        ));
        return redirect()->route('po.index');

    }

    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('po.index');
    }

    public function clear(Request $request){
        Session::flush();
        \Cart::clear();
        return redirect()->route('po.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseOrder $purchaseOrder)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        //
    }
}
