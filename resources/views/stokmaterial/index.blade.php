@extends('layout/main')

@section('title', 'Stok')

@section('container')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            {{-- Content --}}

            <div class="card mt-4">

                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Stok
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Deskripsi</th>
                                    <th>Warna</th>
                                    <th>Ukuran</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->desc}}</td>
                                    <td>{{$data->color}}</td>
                                    <td>{{$data->unit}}</td>
                                    <td>{{$data->qty}}</td>
                                    <td>{{$data->price}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- End Content --}}

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
