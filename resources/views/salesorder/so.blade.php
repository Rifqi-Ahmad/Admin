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
                    <h5>{{$data->code}}</h5>
                </center>

            </div>

            <div class="mt-4">
                <div class="my-2" style="">
                    <a href="/purchaseorder/data" class="btn btn-primary" style="float: right">Kembali</a>

                    <a href="/purchaseorder/data/{{$data->id}}/pdf" class="btn btn-danger">Cetak PDF</a>
                </div>
                <table border="0" width=400px>
                    <tr>
                        <th>
                            Date
                        </th>
                        <th>
                            <input type="text" name="tgl" value="{{ date('l, d-m-Y', $data->date) }}" readonly>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Take Order
                        </th>
                        <th>
                            <input type="text" name="take" value="{{ date('l, d-m-Y', $data->take) }}" readonly>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Finished
                        </th>
                        <th>
                            <input type="text" name="finished" value="{{ date('l, d-m-Y', $data->finished) }}" readonly>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Note
                        </th>
                        <th>
                            <textarea name="note" id="" cols="30" rows="3" readonly>{{$data->note}}</textarea>
                        </th>
                    </tr>
                </table>


            </div>
            <table border="0" class="table table-striped" style="text-align: center">

                <tr>
                    <th>Id</th>
                    <th>Desc</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Sub Price</th>
                </tr>
                @foreach ($data1 as $item)

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
                </tr>
                @endforeach
                <tr>
                    <th colspan="8">Grand Price : Rp {{$data->total}}</th>
                </tr>
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
