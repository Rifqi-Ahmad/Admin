<?php

namespace App\Http\Controllers;

use App\MasterBarang;
use Illuminate\Http\Request;

class MasterBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $max = MasterBarang::max('code');
        $count = (int) substr($max, 2, 3);
        $count++;
        $code = 'CP' . sprintf("%03s", $count);

        $iter = MasterBarang::max('id');
        $id = (int)$iter
        $id++;

        $masterbarang = MasterBarang::all();
        return view('/masterbarang/index', ['masterbarang' => $masterbarang], ['code' => $code, 'id' => $id]);
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
        MasterBarang::create($request->all());
        return redirect('/masterbarang')->with('status', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MasterBarang  $masterBarang
     * @return \Illuminate\Http\Response
     */
    public function show(MasterBarang $masterbarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MasterBarang  $masterBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterBarang $masterbarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MasterBarang  $masterBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterBarang $masterbarang)
    {
        MasterBarang::where('id', $masterbarang->id)
            ->update([
                'code' => $request->code,
                'desc' => $request->desc,
                'color' => $request->color,
                'size' => $request->size,
                'prize' => $request->prize,
            ]);

        return redirect('/masterbarang')->with('status', 'Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MasterBarang  $masterBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterBarang $masterbarang)
    {
        MasterBarang::destroy($masterbarang->id);
        return redirect('/masterbarang')->with('status', 'Data Berhasil di Delete');
    }
}
