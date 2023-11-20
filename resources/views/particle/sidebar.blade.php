<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    {{-- <hr class="sidebar-divider"> --}}

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Interface
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li> --}}


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu Utama
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ request()->is('nasabah') ? 'active' : '' }}">
        <a class="nav-link" href="/nasabah">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Nasabah</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ request()->is('rekening') ? 'active' : '' }}">
        <a class="nav-link" href="/rekening">
            <i class="fas fa-fw fa-table"></i>
            <span>Rekening</span></a>
    </li>

    <li class="nav-item {{ request()->is('transakasi') ? 'active' : '' }}">
        <a class="nav-link" href="/transaksi">
            <i class="fas fa-money-bill-wave"></i>
            <span>Transaksi</span></a>
    </li>
    <hr class="sidebar-divider">
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" id="link"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-archive" aria-hidden="true"></i>
            <span>Arsip</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Arsip</h6>
                <a class="collapse-item" href="/archieve/nasabah">Nasabah</a>
                <a class="collapse-item" href="/archieve/rekening">Rekening</a>
                <a class="collapse-item" href="/archieve/transaksi">Transaksi</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" id="link"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Jenis</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Jenis</h6>
                <a class="collapse-item" href="/jenisrekening">Jenis Rekening</a>
                <a class="collapse-item" href="/jenistransaksi">Jenis Transaksi</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


    <!-- Heading -->


</ul>
<!-- End of Sidebar -->

<script>
    $('#link').click(function(e) {
    $('#collapseThree   ').collapse('hide');
    $('#collapseTwo').collapse('show');        
});
</script>