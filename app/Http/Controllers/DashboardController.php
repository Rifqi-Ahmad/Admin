<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function home()
    {
        $stok = DB::table('stok')
            ->sum('qty');

        $penjualan = DB::table('salesorder')
            ->count();

        $varian = DB::table('masterbarang')
            ->count();

        for ($i=1; $i < 13; $i++) { 
            $data[] = DB::table('salesorder')
            ->whereRaw('MONTH(date(date::text)) = ?', [$i])
            ->count();
        }

        
            

            // Chart
        $chart = app()->chartjs
            ->name('lineChart')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober','November', 'Desember'])
            ->datasets([
                [
                    "label" => "Penjualan",
                    'backgroundColor' => "rgba(63, 42, 255, 0.5)",
                    'borderColor' => "rgba(63, 42, 255, 0.8)",
                    "pointBorderColor" => "rgba(63, 42, 255, 0.2)",
                    "pointBackgroundColor" => "rgba(63, 42, 255, 1)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $data,
                ]
            ])
            ->optionsRaw([
                'legend' => [
                    'display' => true,
                    'labels' => [
                        'fontColor' => '#000'
                    ]
                ],
                'scales' => [
                    'xAxes' => [
                        [
                            'stacked' => true,
                            'gridLines' => [
                                'display' => true
                            ]
                        ]
                    ]
                ]
            ]);
            
        
        return view('/dashboard/index', compact('stok', 'penjualan', 'varian', 'chart', 'data'));
    }

    public function chart(){
        $service = app()->chartjs
        ->name()
        ->type()
        ->size()
        ->labels()
        ->datasets()
        ->options();
    }
}
