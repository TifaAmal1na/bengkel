<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>PAL BENGKEL</title>
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/gauge.js@1.3.7/dist/gauge.min.js"></script>

    <style>
        /* Sidebar styles */
        #accordionSidebar.toggled {
            width: 80px;
            overflow: hidden;
        }
        #toggleSidebar {
            outline: none;
            color: #ffffff;
            background-color: transparent;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .arrow:hover {
            background-color: rgba(128, 128, 128, 0.8);
        }
        .demo {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .arrow svg {
            width: 15px;
            height: 15px;
            transition: transform 0.3s;
        }
        .rotated {
            transform: rotate(180deg);
        }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Conditional Sidebar -->
        @auth
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <img src="/img/PALTransparan.png" style="width: 100%;">
            </a>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('notifikasi.index') }}">
                    <i class="fas fa-star"></i>
                    <span>Data Notifikasi</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('aktivitas.index') }}">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Data Aktivitas</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pekerjaan.index') }}">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Data Pekerjaan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('personel.index') }}">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Data Personel</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('proyek.index') }}">
                    <i class="fas fa-fw fa-file-archive"></i>
                    <span>Data Proyek</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('revisi_gambar.index') }}">
                    <i class="fas fa-images"></i>
                    <span>Revisi Gambar</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tools.index') }}">
                    <i class="fas fa-tools"></i>
                    <span>Tools</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('standard.index') }}">
                    <i class="fas fa-industry"></i>
                    <span>Standard</span></a>
            </li>

            <!-- Responsive Toggle Button -->
            <li class="nav-item">
                <div class="demo">
                    <button class="arrow" id="toggleSidebar" href="javascript:void(0);">
                        <div class="circle-background"></div>
                        <svg viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12 4l-1.41 1.41L16.17 11H2v2h14.17l-5.59 5.59L12 20l8-8-8-8z"></path>
                        </svg>
                    </button>
                </div>
            </li>
        </ul>
        @endauth
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        @auth
                        <!-- If the user is logged in, show the user dropdown -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                        @endauth

                        @guest
                        <!-- If the user is not logged in, show the login button -->
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                        </li>
                        @endguest

                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- End of Page Content -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PAL 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function () {
            document.getElementById('accordionSidebar').classList.toggle('toggled');
            this.querySelector('svg').classList.toggle('rotated');
        });
    </script>
</body>

</html>
