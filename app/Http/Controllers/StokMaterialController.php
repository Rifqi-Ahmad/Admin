<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StokMaterialController extends Controller
{
    public function index()
    {
        $data = DB::table('stok')->get();

        return view('/stokmaterial/index', compact('data'));
    }

    
}
