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
                        <h5>Code</h5>
                    </center>
                </div>

                <div class="mt-4">
                    <form action="" method="post">
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

                        <div class="form-group row mt-4">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Code">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Desc">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Color">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Qty">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Unit Price">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Total Price">
                            </div>

                        </div>
                        <div class="col">
                            <input type="submit" class="btn btn-success tambah" style="border-radius:100%" value="+">
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
