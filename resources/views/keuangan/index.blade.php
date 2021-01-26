@extends('layout/main')

@section('title', 'Laporan Keuangan')

@section('container')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            {{-- Content --}}
            <div class="card-body">
                <center>
                    <h1>Laporan Keuangan</h1>
                </center>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#Modal">
                    Tambah Data
                </button>
            </div>

            <div class="card mt-4">

                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Laporan Keuangan
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th style="width: 12%">Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Debet</th>
                                    <th>Kredit</th>
                                    <th>Saldo</th>
                                    <th style="width: 12%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total = 0;
                                $debtotal = 0;
                                $kretotal = 0;
                                @endphp
                                @foreach ($data as $data)
                                <tr>
                                    <form action="/keuangan/{{ $data->id }}" method="post" class="d-inline">
                                        @method('patch')
                                        @csrf
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{date('d-m-Y')}}</td>
                                        <td><input type="text" class="form-control" name="keterangan"
                                                value="{{$data->keterangan}}"></td>
                                        <td><input type="text" class="form-control" name="debet"
                                                value="{{$data->debet}}">
                                        </td>
                                        <td><input type="text" class="form-control" name="kredit"
                                                value="{{$data->kredit}}">
                                        </td>

                                        @php
                                        $total += $data->debet;
                                        $total -= $data->kredit;
                                        $debtotal += $data->debet;
                                        $kretotal += $data->kredit;
                                        echo '<td>' . $total . '</td>';
                                        @endphp

                                        <td>

                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fas fa-edit"></i></button>
                                    </form>

                                    <form action="/keuangan/{{ $data->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i
                                                class="far fa-trash-alt"></i></button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                @php

                                @endphp
                                @foreach ($data as $data)
                                @php

                                @endphp
                                @endforeach
                                <tr>
                                    <th colspan="3">Jumlah</th>
                                    <th>{{$debtotal }}</th>
                                    <th>{{$kretotal}}</th>
                                    <th>{{$total}}</th>
                                    <th></th>
                                </tr>

                            </tfoot>
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

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="/keuangan" method="POST">
                    @csrf
                    <div class="form-group" hidden>
                        <label for="nama">Id</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{$id ?? ''}}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Keterangan</label>
                        <input type="text" class="form-control" id="ket" name="ket">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Jenis</label>
                        </div>
                        <select class="custom-select" name="jenis" id="inputGroupSelect01">
                            <option selected>Pilih...</option>
                            <option value="1">Debet</option>
                            <option value="2">Kredit</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>

        </div>
    </div>
</div>
</form>
<!-- End Modal -->


@endsection
