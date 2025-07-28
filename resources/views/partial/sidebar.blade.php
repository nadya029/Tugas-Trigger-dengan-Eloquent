<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ url('/') }}">
            <span class="align-middle">Inventarisasi</span>
        </a>
        <ul class="sidebar-nav">
            <!-- Master Data Section -->
            <li class="sidebar-header">
                <i class="align-middle" data-feather="sliders"></i>
                <span class="align-middle">Master Data</span>
            </li>

            <!-- New Barang Section -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ URL('/barang') }}">
                    <i class="align-middle" data-feather="box"></i> <span class="align-middle">Barang</span>
                </a>
            </li>

            <!-- Merk Section -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ URL('/merk') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Merk</span>
                </a>
            </li>

            <!-- Lokasi Section -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ URL('/lokasi') }}">
                    <i class="align-middle" data-feather="map-pin"></i> <span class="align-middle">Lokasi</span>
                </a>
            </li>

            <!-- Kategori Section -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ URL('/kategori') }}">
                    <i class="align-middle" data-feather="tag"></i> <span class="align-middle">Kategori</span>
                </a>
            </li>

            <!-- Pembelian Section -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ URL('/pembelian') }}">
                    <i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Pembelian</span>
                </a>
            </li>

            <!-- Penjualan Section -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ URL('/penjualan') }}">
                    <i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Penjualan</span>
                </a>
            </li>

             <!-- supplier Section -->
             <li class="sidebar-item">
                <a class="sidebar-link" href="{{ URL('/supplier') }}">
                    <i class="align-middle" data-feather="package"></i> <span class="align-middle">Supplier</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ URL('/chart') }}">
                    <i class="align-middle" data-feather="package"></i> <span class="align-middle">Chart</span>
                </a>
            </li>
        

            <!-- Pages Section -->
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="index.html">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-profile.html">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-sign-in.html">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Sign In</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-sign-up.html">
                    <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Sign Up</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-blank.html">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Blank</span>
                </a>
            </li>
            
        </ul>
    </div>
</nav>