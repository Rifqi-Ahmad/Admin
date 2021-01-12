@extends('layout/main')

@section('title', 'Data Sales Order')

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
                                <th>Code</th>
                                <th>Date</th>
                                <th>Take Order</th>
                                <th>Finished</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->code}}</td>
                                <td>{{$data->date}}</td>
                                <td>{{$data->take}}</td>
                                <td>{{$data->finished}}</td>
                                <td>{{$data->note}}</td>
                                <td>
                                    <a href="/salesorder/data/{{$data->id}}/so" class="btn btn-success"><i
                                            class="fas fa-table"></i></a>

                                    <a href="/salesorder/data/{{$data->id}}/edit" class="btn btn-primary"><i
                                            class="far fa-edit"></i></a>

                                    <form action="{{route('sdata.delete', $data->id)}}" method="post" class="d-inline">
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
