@extends('layout/main')

@section('title', 'Purchase Order')

@section('container')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            {{-- Content --}}
            <div class="mt-4">
                <center>
                    <h1>Purchase Order</h1>
                    <h5>PO/THN/BLN/001</h5>
                </center>

            </div>

            <div class="mt-4">
                <form action="" method="POST">
                    @csrf
                    <div class="my-2">
                        <a href="/purchaseorder/data" class="btn btn-primary" style="float: right">Lihat
                            Data</a>
                        <button type="submit" name="simpan" class="btn btn-outline-success">Simpan</button>
                        <input type="submit" name="hapus" class="btn btn-outline-danger" value="hapus">
                    </div>

                    <table border="0" width=400px>
                        <tr>
                            <th>
                                Date
                            </th>
                            <th>
                                <input type="text" value="{{ date('l, d-m-y') }}" readonly>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                vendor
                            </th>
                            <th>
                                <input type="text">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                Note
                            </th>
                            <th>
                                <textarea name="" id="" cols="30" rows="3"></textarea>
                            </th>
                        </tr>
                    </table>


                    <div class="form-group control-group row mt-4 after-add-more">
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
                            <button class="btn btn-success" type="button" name="tambah">Tambah</button>
                        </div>

                    </div>

                    <hr>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="purchase">
                            <thead>
                                <tr>
                                    <th>Desc</th>
                                    <th>Color</th>
                                    <th>Unit</th>
                                    <th>Qty</th>
                                    <th>Unit Price</th>
                                    <th>Sub Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <input type="text" class="form-control total" name="total" id="total" placeholder="Total">
                                    </td>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
            
                </form>
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