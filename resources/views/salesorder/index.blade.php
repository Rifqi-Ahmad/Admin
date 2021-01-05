@extends('layout/main')

@section('title', 'Sales Order')

@section('container')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            {{-- Content --}}
            <div class="mt-4">
                <center>
                    <h1>Sales Order</h1>
                    <h5>Code</h5>
                </center>

            </div>

            <div class="mt-4">
                <form action="/salesorder" method="POST">
                    @method('patch')
                    @csrf
                    <div class="my-2">
                        <a href="/salesorder/data" class="btn btn-primary" style="float: right">Lihat
                            Data</a>
                        <button type="submit" name="save" class="btn btn-outline-success">Save</button>
                        <button type="submit" name="clear" class="btn btn-outline-success">Clear</button>
                    </div>
                </form>

                <form action="{{route('so.add')}}" method="post">
                    @csrf

                    <table border="0" width=400px>
                        <tr>
                            <th>
                                Date
                            </th>
                            <th>
                                <input type="text" name="tgl" value="{{ date('l, d-m-Y') }}" readonly>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                vendor
                            </th>
                            <th>
                                @if (Session::has('vendor'))
                                    <input type="text" name="vendor" value="{{Session::get('vendor')}}">
                                @else
                                    <input type="text" name="vendor" value="">
                                @endif
                            </th>
                        </tr>
                        <tr>
                            <th>
                                Note
                            </th>
                            <th>
                                @if (Session::has('vendor'))
                                    <textarea name="note" id="" cols="30" rows="3">{{Session::get('note')}}</textarea>
                                @else
                                    <textarea name="note" id="" cols="30" rows="3"></textarea>
                                @endif
                                
                            </th>
                        </tr>
                    </table>

                    <div class="form-group control-group row mt-4 after-add-more">
                        <div class="col">
                            <input type="text" class="form-control" name="id" placeholder="Id">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="desc" placeholder="Desc">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="color" placeholder="Color">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="unit" placeholder="Unit">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="qty" placeholder="Qty">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="price" placeholder="Unit Price">
                        </div>
                        <div class="col">
                            <input type="submit" class="btn btn-success" name="tambah" value="Tambah">
                        </div>

                    </div>

                    <hr>
                </form>             
            </div>

                
                    <table border="0" class="table table-striped">
                        @foreach (Cart::getContent() as $item)
                        <tr>
                            <th>
                                {{$item->id}}
                            </th>
                            <td>
                                {{$item->desc}}
                            </td>
                            <td>
                                {{$item->color}}
                            </td>
                            <td>
                                {{$item->unit}}
                            </td>
                            <td>
                                {{$item->qty}}
                            </td>
                            <td>
                                {{$item->price}}
                            </td>
                            <td>
                                {{$item->sub}}
                            </td>
                            <td>
                                <form action="/salesorder/{{$item->id}}" method="post">
                                @csrf
                                    <button type="submit" class="btn btn-danger">X</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach 
                    </table>
                 

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