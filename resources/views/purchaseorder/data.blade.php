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
                                <th>Id</th>
                                <th>Tanggal</th>
                                <th>Vendor</th>
                                <th>Note</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->code}}</td>
                                <td>{{$data->date}}</td>
                                <td>{{$data->vendor}}</td>
                                <td>{{$data->note}}</td>
                                <td>
                                    <a href="/purchaseorder/data/{{$data->id}}/po" class="btn btn-success"><i
                                            class="fas fa-table"></i></a>

                                    <a href="/purchaseorder/data/{{$data->id}}/edit" class="btn btn-primary"><i
                                            class="far fa-edit"></i></a>

                                    <form action="{{route('data.delete', $data->id)}}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i
                                                class="far fa-trash-alt"></i></button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
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
