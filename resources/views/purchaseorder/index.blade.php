@extends('layout/main')

@section('title', 'Purchase Order')

@section('container')

<?php

    session_start();

?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            {{-- Content --}}
            <div class="mt-4">
                <center>
                    <h1>Purchase Order</h1>
                    <h5>{{$code}}</h5>
                </center>

            </div>

            <div class="mt-4">
                <form action="/purchaseorder" method="POST">
                    @csrf
                    <div class="my-2">
                        <a href="/purchaseorder/data" class="btn btn-primary" style="float: right">Lihat
                            Data</a>
                        <button type="submit" name="save" class="btn btn-outline-success">Save</button>
                        <button type="submit" name="clear" class="btn btn-outline-success">Clear</button>
                    </div>

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
                                <input type="text" name="vendor">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                Note
                            </th>
                            <th>
                                <textarea name="note" id="" cols="30" rows="3"></textarea>
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

                <?php
                if(isset($_SESSION["data"])){
                    print_r($_SESSION["data"]);
                    echo "<Table border=\"1\">";
                    echo "<tr><td>Id</td><td>desc</td><td>color</td><td>unit</td><td>qty</td><td>prize</td><td>Sub</td></tr>";
                    $total=0;
                    foreach($_SESSION["data"] as $y => $y_value)
                    {
                        echo "<tr><form action=\"\" method=\"POST\"><input type=\"text\" name=\"ids\" value=\"$y\" hidden>";
                        echo "<td>";
                        echo $_SESSION["data"][$y]["id"];
                        echo "</td>";
                        echo "<td>";
                        echo $_SESSION["data"][$y]["desc"];
                        echo "</td>";
                        echo "<td>";
                        echo $_SESSION["data"][$y]["color"];
                        echo "</td>";
                        echo "<td>";
                        echo $_SESSION["data"][$y]["unit"];
                        echo "</td>";
                        echo "<td>";
                        echo $_SESSION["data"][$y]["qty"];
                        echo "</td>";
                        echo "<td>";
                        echo $_SESSION["data"][$y]["price"];
                        echo "</td>";
                        echo "<td>";
                        echo $_SESSION["data"][$y]["qty"]*$_SESSION["data"][$y]["price"];
                        $total=$total+$_SESSION["data"][$y]["qty"]*$_SESSION["data"][$y]["price"];
                        echo "</td>";
                        echo "<td><input type=\"submit\" name=\"delete\" value=\"X\" ></td>";
                        echo "</form>";
                    }
                    $_SESSION["total"]=$total;
                    setlocale(LC_ALL, 'en_IN');
                    echo "<tr><td></td><td></td></td><td><td></td><td></td><td>";
                    echo "Total :</td><td>Rp ";
                    echo number_format($_SESSION["total"],2,",",".");
                    echo "</td></tr>";
        
                    echo "<tr><td></td><td></td></td><td><td></td><td></td><td>";
                    echo "Grand Total :</td><td>Rp ";
                    $grand = $_SESSION["total"];
                    echo number_format($grand,2,",",".");
                    echo "</td></tr>";
                    echo "</table>";
                }
            ?>
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

<?php

        // unset($_SESSION["data"]);
        // unset($_SESSION["dcode"]);
        // unset($_SESSION["dtgl"]);
        // unset($_SESSION["dven"]);
        // unset($_SESSION["dnote"]);

    if(isset($_POST['tambah'])){
        $_SESSION['dcode'] = $code;
        $_SESSION['dtgl'] = $_POST['tgl'];
        $_SESSION['dven'] = $_POST['vendor'];
        $_SESSION['dnote'] = $_POST['note'];

        $x=$_POST['id'];
        $_SESSION['data'][$x]['id'] = $_POST['id'];
        $_SESSION['data'][$x]['desc'] = $_POST['desc'];
        $_SESSION['data'][$x]['color'] = $_POST['color'];
        $_SESSION['data'][$x]['unit'] = $_POST['unit'];
        $_SESSION['data'][$x]['qty'] = $_POST['qty'];
        $_SESSION['data'][$x]['price'] = $_POST['price'];
    }

    if(isset($_POST["hapus"])){
        $xx=$_POST["ids"];
        unset($_SESSION["data"][$xx]);
        $_POST["hapus"]='0';
    }

    if(isset($_POST["clear"])){
        unset($_SESSION["data"]);
        unset($_SESSION["dcode"]);
        unset($_SESSION["dtgl"]);
        unset($_SESSION["dven"]);
        unset($_SESSION["dnote"]);
        $_POST["clear"]='0';
    }

?>

    

@endsection