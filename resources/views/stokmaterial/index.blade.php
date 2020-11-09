@extends('layout/main')

@section('title', 'Stok Material')

@section('container')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            {{-- Content --}}

            <div class="mt-4">
                <button type="submit" class="btn btn-primary tombolTambahData" data-toggle="modal"
                    data-target="#formModal">
                    Tambah Data
                </button>
            </div>

            @if (session('status'))
            <div class="alert alert-success mt-4">
                {{ session('status') }}
            </div>
            @endif

            <div class="card mt-4">

                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Master Barang
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
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @foreach ($masterbarang as $masterbarang)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$masterbarang->code}}</td>
                                    <td>{{$masterbarang->desc}}</td>
                                    <td>{{$masterbarang->color}}</td>
                                    <td>{{$masterbarang->size}}</td>
                                    <td>{{$masterbarang->prize}}</td>
                                    <td>
                                        <a href="/masterbarang/{{$masterbarang->id}}"
                                            class="btn btn-primary tombolUbahData" data-toggle="modal"
                                            data-target="#formModal{{$masterbarang->id}}">Edit</a>

                                        <form action="/masterbarang/{{ $masterbarang->id }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>


                                        <!-- Modal -->
                                        <div class="modal fade" id="formModal{{$masterbarang->id}}" tabindex="-1"
                                            aria-labelledby="judulModal" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="judulModal">Ubah Data Master
                                                            Barang</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form action="/masterbarang/{{$masterbarang->id}}"
                                                            method="POST">
                                                            @method('patch')
                                                            @csrf
                                                            <input type="hidden" name="id" id="id">
                                                            <div class="form-group">
                                                                <label for="nama">Code</label>
                                                                <input type="text" class="form-control" id="code"
                                                                    name="code" value="{{$masterbarang->code}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="alamat">Description</label>
                                                                <input type="text" class="form-control" id="desc"
                                                                    name="desc" value="{{$masterbarang->desc}}">
                                                            </div>
                                                            <div class=" form-group">
                                                                <label for="alamat">Color</label>
                                                                <input type="text" class="form-control" id="color"
                                                                    name="color" value="{{$masterbarang->color}}">
                                                            </div>
                                                            <div class=" form-group">
                                                                <label for="alamat">Size</label>
                                                                <input type="text" class="form-control" id="size"
                                                                    name="size" value="{{$masterbarang->size}}">
                                                            </div>
                                                            <div class=" form-group">
                                                                <label for="alamat">Prize</label>
                                                                <input type="text" class="form-control" id="prize"
                                                                    name="prize" value="{{$masterbarang->prize}}">
                                                            </div>

                                                    </div>
                                                    <div class=" modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Ubah
                                                            Data</button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal -->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody> --}}
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
