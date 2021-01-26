@extends('layout/main')

@section('title', 'Dashboard')

@section('container')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <!-- card -->
            <div class="row mt-4 justify-content-md-center">
                <div class="col-md-3">
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-desktop mr-1"></i>
                            Stok Barang
                        </div>
                        <div class="card-body my-4">
                            <center>
                                <h1>{{$stok}}</h1>
                            </center>
                        </div>
                        <div class="card-footer">
                            <h4 style="font-size:15px;font-weight:700;"><a href='/stokmaterial'>Tabel Barang
                                    <i class='fa fa-angle-double-right'></i></a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-desktop mr-1"></i>
                            Penjualan
                        </div>
                        <div class="card-body my-4">
                            <center>
                                <h1>{{$penjualan}}</h1>
                            </center>
                        </div>
                        <div class="card-footer">
                            <h4 style="font-size:15px;font-weight:700;"><a href='/salesorder/data'>Tabel Laporan
                                    <i class='fa fa-angle-double-right'></i></a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-desktop mr-1"></i>
                            Varian Barang
                        </div>
                        <div class="card-body my-4">
                            <center>
                                <h1>{{$varian}}</h1>
                            </center>
                        </div>
                        <div class="card-footer">
                            <h4 style="font-size:15px;font-weight:700;"><a href='/masterbarang'>Tabel Master
                                    <i class='fa fa-angle-double-right'></i></a></h4>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Chart --}}

            <div class="row mt-4 justify-content-md-center">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area mr-1"></i>
                            Penjualan tiap Bulan
                        </div>
                        <div class="card-body" width="100%" height="40">
                            {!! $chart->render() !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Chart -->

        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2020</div>
            </div>
        </div>
    </footer>
</div>

@endsection
