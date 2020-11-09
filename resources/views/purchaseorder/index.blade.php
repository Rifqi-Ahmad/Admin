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
                <form action="" method="GET">
                    <div class="my-2">
                        <a href="/purchaseorder/data" class="btn btn-primary" style="float: right">Lihat
                            Data</a>
                        <input type="submit" name="simpan" class="btn btn-outline-success" value="Simpan">
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
                            <select name="code" id="code" class="form-control">
                                <option value="">Pilih :</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
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
                        <div class="col">
                            <button class="btn btn-danger remove d-none" type="button"><i
                                    class="glyphicon glyphicon-remove"></i>
                                Remove</button>
                        </div>

                    </div>
                    <div class="col">
                        <button class="btn btn-success add-more" type="button">
                            <i class="glyphicon glyphicon-plus"></i> Add
                        </button>
                    </div>
                </form>

                <div class="copy d-none">
                    <div class="form-group control-group row mt-4">
                        <div class="col">
                            <select name="code" id="code" class="form-control">
                                <option value="">Pilih :</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
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
                        <div class="col">
                            <button class="btn btn-danger remove" type="button"><i
                                    class="glyphicon glyphicon-remove"></i>
                                Remove</button>
                        </div>
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

{{-- Script --}}

<script type="text/javascript">
    $(document).ready(function() {
          $(".add-more").click(function(){ 
              var html = $(".copy").html();
              $(".after-add-more").after(html);
          });
    
          // saat tombol remove dklik control group akan dihapus 
          $("body").on("click",".remove",function(){ 
              $(this).parents(".control-group").remove();
          });
        });
</script>

{{-- End Script --}}

@endsection