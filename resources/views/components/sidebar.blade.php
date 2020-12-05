<div>
    <!-- Sidebar outter -->
    <div class="main-sidebar sidebar-style-2">
        <!-- sidebar wrapper -->
        <aside id="sidebar-wrapper">
            <!-- sidebar brand -->
            <div class="sidebar-brand">
                <a href="{{ route('welcome') }}">{{ config('app.name', 'Laravel') }}</a>
            </div>
            <!-- sidebar menu -->
            <ul class="sidebar-menu">
                <!-- menu item -->
                <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-fire"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="menu-header">Produk</li>
                <li class="">
                    <a href="{{ route('categories.index') }}">
                        <i class="fas fa-boxes"></i>
                        <span>Kategori Produk</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}">
                        <i class="fas fa-box"></i>
                        <span>Daftar Produk</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.create') }}">
                        <i class="fas fa-truck-loading"></i>
                        <span>Tambah Data Produk</span>
                    </a>
                </li>
                <li class="menu-header">Foto Barang</li>
                <li>
                    <a href="{{ route('product-galleries.index') }}">
                        <i class="fas fa-images"></i>
                        <span>Daftar Foto Barang</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('product-galleries.create') }}">
                        <i class="fas fa-camera"></i>
                        <span>Tambah Foto Barang</span>
                    </a>
                </li>
                <li class="menu-header">Transaksi</li>
                <li>
                    <a href="{{ route('transactions.index') }}">
                        <i class="fas fa-hand-holding-usd"></i>
                        <span>Daftar Transaksi</span>
                    </a>
                </li>
            </ul>
        </aside>
    </div>
</div>