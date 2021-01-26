<?php

namespace App\Http\Controllers;
use App\PurchaseOrder;
use App\Cart;
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

        $br = DB::table('masterbarang')->get();

        return view('/purchaseorder/index',compact('code', 'br'));
    }

    public function data()
    {
        return view('/purchaseorder/data');
    }

    public function add(Request $request){

        Session([
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

        $total = 0;

        foreach(\Cart::getContent() as $item){
            $total+= $item->sub;
            Session(['total' => $total]);    
        }

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
        
        foreach(\Cart::getContent() as $item){
           
            $sum = $item->qty;
            
            $sto = DB::table('stok')
            ->where('id', '=', $item->id)
            ->first();

            if($item->qty != 0){
                $sum = 0;
                (int)$stok = $sto->qty;
                (int)$jumlah = $item->qty;
                $sum = $stok + $jumlah;  
            }

            DB::table('stok')
                ->updateOrInsert(
                    ['id' => $item->id,],
                    [
                    'desc' => $item->desc, 
                    'color' => $item->color,
                     'unit' => $item->unit,
                    'price' => $item->price,
                    'qty' => $sum
                    ]
            );

            $mbid = DB::table('masterbarang')->max('id');
            $mb = (int)$mbid;
            $mb++;

            DB::table('masterbarang')
                ->updateOrInsert(
                    [
                    'code' => $item->id
                    ],
                    [
                    'id' => $mb,
                    'desc' => $item->desc,
                    'color' => $item->color,
                    'size' => $item->unit,
                    'prize' => $item->price,
                    ]
            );

            $iters = DB::table('podetail')->max('id');
            $ids = (int)$iters;
            $ids++;

            DB::table('podetail')->insert([
                'id' => $ids,
                'pocode' => Session::get('code'),
                'code' => $item->id,
                'desc' => $item->desc,
                'color' => $item->color,
                'unit' => $item->unit,
                'qty' => $item->qty,
                'price' => $item->price,
                'sub' => $item->sub
            ]);
            
        }

        $iter = DB::table('purchaseorder')->max('id');
        $id = (int)$iter;
        $id++;

        $loop = DB::table('keuangan')->max('id');
        $codes = (int)$loop;
        $codes++;

        DB::table('purchaseorder')->insert([
            'id' => $id,
            'code' => Session::get('code'),
            'date' => time(),
            'vendor' => Session::get('vendor'),
            'note' => Session::get('note'),
            'total' => Session::get('total')
        ]);

        DB::table('keuangan')->insert([
            'id' => $codes,
            'date' => time(),
            'keterangan' => Session::get('note'),
            'kredit' => Session::get('total')
        ]);


        Session::flush();
        \Cart::clear();

        return redirect()->route('po.index');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
