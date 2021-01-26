<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <link href="{{asset('css/style.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>

<body class="sb-nav-fixed">

    <!-- Navbar-->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="{{'/dashboard'}}">Admin</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>

        <!-- Menu Setting -->
        <ul class="navbar-nav d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </li>
        </ul>
        <!-- End Menu Setting -->

    </nav>
    <!-- END Navbar -->


    <div id="layoutSidenav">

        <!-- Sidebar -->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">

                    <!-- Navbar Menu -->
                    <div class="nav mt-3">
                        <a class="nav-link mt-auto" href="{{url('/')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                    </div>

                    <div class="nav mt-2">
                        <a class="nav-link mt-auto" href="{{url('/purchaseorder')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                            Purchase Order
                        </a>
                    </div>

                    {{-- <div class="nav mt-2">
                        <a class="nav-link mt-auto" href="{{url('/stokbarang')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-archive"></i></div>
                    Stok Barang Jadi
                    </a>
                </div> --}}

                <div class="nav mt-2">
                    <a class="nav-link mt-auto" href="{{url('/stokmaterial')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-toolbox"></i></div>
                        Stok
                    </a>
                </div>

                {{-- <div class="nav mt-2">
                        <a class="nav-link mt-auto" href="{{url('/aset')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-hand-holding-usd"></i></div>
                Aset
                </a>
        </div> --}}

        {{-- <div class="nav mt-2">
                        <a class="nav-link mt-auto" href="{{url('/aruskas')}}">
        <div class="sb-nav-link-icon"><i class="fas fa-coins"></i></div>
        Arus Kas
        </a>
    </div> --}}

    <div class="nav mt-2">
        <a class="nav-link mt-auto" href="{{url('/salesorder')}}">
            <div class="sb-nav-link-icon"><i class="far fa-file-alt"></i></div>
            Sales Order
        </a>
    </div>

    <div class="nav mt-2">
        <a class="nav-link mt-auto" href="{{url('/masterbarang')}}">
            <div class="sb-nav-link-icon"><i class="far fa-file-alt"></i></div>
            Master Barang
        </a>
    </div>

    <div class="nav mt-2">
        <a class="nav-link mt-auto" href="{{url('/keuangan')}}">
            <div class="sb-nav-link-icon"><i class="fas fa-coins"></i></div>
            Laporan Keuangan
        </a>
    </div>
    <!-- End Navbar Menu -->

    </div>

    <!-- Sidebar Footer -->
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
    <!-- End Sidebar Footer -->

    </nav>
    </div>
    <!-- End Sidebar -->

    <!-- Content -->
    @yield('container')

    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulModal">Tambah Data Master Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="/masterbarang" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="nama">Code</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{$code ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Description</label>
                            <input type="text" class="form-control" id="desc" name="desc">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Color</label>
                            <input type="text" class="form-control" id="color" name="color">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Size</label>
                            <input type="text" class="form-control" id="size" name="size">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Prize</label>
                            <input type="text" class="form-control" id="prize" name="prize">
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
    <!-- End Modal -->


    <!-- End Content -->
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('demo/chart-area-demo.js') }} "></script>
    <script src="{{asset('demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('demo/datatables-demo.js') }}"></script>
</body>

</html>
