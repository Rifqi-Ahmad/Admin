@extends('layout/main')

@section('title', 'Sales Order')



@section('container')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            {{-- Content --}}
            <div class="mt-4">
                <h5>Edit</h5>
                <center>
                    <h1>Sales Order</h1>
                    <h5>{{$data->code}}</h5>
                </center>

            </div>

            <div class="mt-4">

                <div class="my-2" style="">
                    <a href="/salesorder/data" class="btn btn-primary" style="float: right">Lihat
                        Data</a>

                    <form action="{{route('sdata.update', $data->id)}}" method="post" style="display: inline">
                        @method('put')
                        @csrf
                        <button type="submit" name="save" class="btn btn-outline-success">Save</button>

                </div>

                <table border="0" width=400px>
                    <tr>
                        <th>
                            Date
                        </th>
                        <th>
                            <input type="text" name="tgl" value="{{ date('l, d-m-Y', strtotime($data->date)) }}"
                                readonly>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Take Order
                        </th>
                        <th>
                            <input type="date" name="take" value="{{ $data->take }}">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Finished
                        </th>
                        <th>
                            <input type="date" name="finished" value="{{ $data->finished }}">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Note
                        </th>
                        <th>
                            <textarea name="note" id="" cols="30" rows="3">{{$data->note}}</textarea>
                        </th>
                    </tr>
                </table>
                </form>

                <form action="{{route('sdata.edit', $data->id)}}" method="post">
                    @csrf
                    <div class="form-group control-group row mt-4 after-add-more">
                        <div class="col">
                            <select class="btn btn-secondary" name="id" onchange="changeValue(this.value)">
                                <option value="">-Pilih-</option>
                                @php

                                $jsArray = "var barang = new Array();\n";

                                foreach ($br as $br) {
                                echo '<option value="' . $br->code . '">' . $br->code . '</option>';
                                $jsArray .= "barang['" . $br->code . "'] = {desc:'" . addslashes($br->desc) .
                                "',color:'".addslashes($br->color) . "',size:'".addslashes($br->size) .
                                "',price:'".addslashes($br->prize)."'};\n";
                                }

                                @endphp

                            </select>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="desc" id="desc" value="" placeholder="Desc">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="color" id="color" value=""
                                placeholder="Color">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="unit" id="unit" value="" placeholder="Size">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="price" id="price" value=""
                                placeholder="Unit Price">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="qty" id="qty" value="" placeholder="Qty">
                        </div>
                        <div class="col">
                            <input type="submit" class="btn btn-success" name="tambah" value="Tambah">
                        </div>
                    </div>
                    <hr>
                </form>
            </div>

            @php
            echo "<script type=\"text/javascript\">
                ";
                echo $jsArray;
                echo "function changeValue(id) {";
                echo "document.getElementById('desc').value = barang[id].desc;";
                echo "document.getElementById('color').value = barang[id].color;";
                echo "document.getElementById('unit').value = barang[id].size;";
                echo "document.getElementById('price').value = barang[id].price;";
                echo "};";
                echo "

            </script>";
            @endphp

            <table border="0" class="table table-striped">

                <tr>
                    <th>Id</th>
                    <th>Desc</th>
                    <th>Color</th>
                    <th>Unit</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Sub Price</th>
                    <th>Action</th>
                </tr>
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
                        <form action="/salesorder/data/{{$data->id}}/edit/{{$item->id}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">X</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="8">Grand Price : Rp {{Session::get('total')}}</th>
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
