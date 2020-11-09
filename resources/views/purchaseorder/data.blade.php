@extends('layout/main')

@section('title', 'Data Purchase Order')

@section('container')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            {{-- Content --}}
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
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
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