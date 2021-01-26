<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
Use PDF;

class Keuangan extends Controller
{
    public function index()
    {  
        $data = DB::table('keuangan')
            ->get();

        return view('/keuangan/index', compact('data'));
    }

    public function insert(Request $request){
        $iter = DB::table('keuangan')->max('id');
        $id = (int)$iter;
        $id++;

        $jenis = $request->jenis;

        if ($jenis == 1) {
            DB::table('keuangan')->insert([
                'id' => $id,
                'date' => time(),
                'keterangan' => $request->ket,
                'debet' => $request->jumlah
            ]);
        } elseif ($jenis == 2){
            DB::table('keuangan')->insert([
                'id' => $id,
                'date' => time(),
                'keterangan' => $request->ket,
                'kredit' => $request->jumlah
            ]);
        }

        
        return redirect('/keuangan')->with('status', 'Data Berhasil di Tambahkan');
    
    }

    public function edit(Request $request){

        DB::table('keuangan')
            ->where('id', '=', $request->id)
            ->update([
                'keterangan' => $request->keterangan,
                'debet' => $request->debet,
                'kredit' => $request->kredit
            ]);
        
        return redirect('/keuangan')->with('status', 'Data Berhasil di Tambahkan');
    
    }

    public function delete(Request $request)
    {
        DB::table('keuangan')->where('id', '=', $request->id)->delete();
        return redirect('/keuangan')->with('status', 'Data Berhasil di Delete');
    }
}
