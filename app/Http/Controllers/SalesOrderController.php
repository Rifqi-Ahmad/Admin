<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cart;
use Session;
use DB;

class SalesOrderController extends Controller
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
        $max = DB::table('salesorder')->max('code');
        $count = (int) substr($max, 11, 3);
        $count++;
        $code = 'SO/'.$t.'/'.$b.'/'.sprintf("%03s", $count);

        Session(['code' => $code]);

        $br = DB::table('masterbarang')->get();

        return view('/salesorder/index',compact('code', 'br'));
    }

    public function add(Request $request){

        Session([
            'tgl' => $request->tgl,
            'take' => $request->take,
            'finished' => $request->finished,
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

        return redirect()->route('so.index');

    }

    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('so.index');
    }

    public function clear(Request $request){
        Session::flush();
        \Cart::clear();
        return redirect()->route('so.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $sisa = 0;

        foreach(\Cart::getContent() as $item){

            $sto = DB::table('stok')
            ->where('id', '=', $item->id)
            ->first();

            (int)$stok = $sto->qty;
            (int)$jumlah = $item->qty;

            $sisa = $stok - $jumlah;

            if($stok < $jumlah || $stok == 0 ){
                return redirect()->route('so.index')->with('status', 'Stok Kurang');
            }

            DB::table('stok')
                ->where('id', '=', $item->id)
                ->update([
                    'qty' => $sisa
                ]);


            $iters = DB::table('sodetail')->max('id');
            $ids = (int)$iters;
            $ids++;

            DB::table('sodetail')->insert([
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

        $iter = DB::table('salesorder')->max('id');
        $id = (int)$iter;
        $id++;

        $loop = DB::table('keuangan')->max('id');
        $codes = (int)$loop;
        $codes++;

        DB::table('salesorder')->insert([
            'id' => $id,
            'code' => Session::get('code'),
            'date' => time(),
            'take' => strtotime(Session::get('take')),
            'finished' => strtotime(Session::get('finished')),
            'note' => Session::get('note'),
            'total' => Session::get('total')
        ]);

        DB::table('keuangan')->insert([
            'id' => $codes,
            'date' => time(),
            'keterangan' => Session::get('note'),
            'debet' => Session::get('total'),
        ]);

        Session::flush();
        \Cart::clear();

        return redirect()->route('so.index');
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
