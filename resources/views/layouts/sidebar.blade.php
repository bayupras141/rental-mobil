<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-left justify-content-left" href="#">
        <div class="sidebar-brand-text"></div>Rental Mobil
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Menu Utama
    </div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{route('mobil.index')}}">
            <i class="fas fa-fw fa-car"></i>
            <span>Mobil</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('paket.index')}}">
            <i class="fas fa-fw fa-tags"></i>
            <span>Paket</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('pelanggan.index')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Customer</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#transaksi" aria-expanded="true" aria-controls="transaksi">
            <i class="fas fa-fw fa-book"></i>
            <span>Transaksi</span>
        </a>
        <div id="transaksi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="#">Transaksi</a>
            <a class="collapse-item" href="#">List Transaksi</a>
            <a class="collapse-item" href="#">Riwayat Transaksi</a>
            </div>
        </div>
    </li>
    {{-- <li class="nav-item {{active('transaction.create')}}">
        <a class="nav-link" href="{{route('transaction.create')}}">
            <i class="fas fa-fw fa-book"></i>
            <span>Transaksi</span>
        </a>
    </li>
    <li class="nav-item {{active('transaction.index')}}">
        <a class="nav-link" href="{{route('transaction.index')}}">
            <i class="fas fa-fw fa-book"></i>
            <span>List Transaksi</span>
        </a>
    </li>
    <li class="nav-item {{active('transaction.history')}}">
        <a class="nav-link" href="{{route('transaction.history')}}">
            <i class="fas fa-fw fa-book"></i>
            <span>Riwayat Transaksi</span>
        </a>
    </li> --}}
</ul>
<!-- End of Sidebar -->
