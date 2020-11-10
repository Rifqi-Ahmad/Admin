<?php

namespace App\Http\Controllers;

use App\PurchaseOrder;
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

        return view('/purchaseorder/index',);
    }

    public function data()
    {
        return view('/purchaseorder/data');
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
        $iter = PurchaseOrder::max('id');
        $id = (int)$iter;
        $id++;

        $date = $request->date;
        $desc = $request->desc;
        $color = $request->color;
        $unit = $request->unit;
        $qty = $request->qty;
        $prize = $request->prize;
        $sub = $request->sub;


        PurchaseOrder::create([
            'id' => $id,
            'code' => $request->code,
            'date' => $date,
            'desc' => $desc,
            'color' => $color,
            'unit' => $unit,
            'qty' => $qty,
            'prize' => $prize,
            'sub' => $sub,
            'total' => $request->total
        ]);
        return redirect('/purchaseorder')->with('status', 'Data Berhasil di Tambahkan');
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
