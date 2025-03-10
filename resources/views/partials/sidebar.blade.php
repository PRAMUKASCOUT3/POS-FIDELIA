<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <span class="app-brand-text demo menu-text fw-semibold ms-2"
            style="font-family: 'Times New Roman', Times, serif">JOJO PETSHOP</span>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="menu-toggle-icon d-xl-block align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item">
            <a href="/" class="menu-link">
                <i class="menu-icon tf-icons ri-home-smile-line"></i>
                <div data-i18n="Dashboards">Dashboard</div>
            </a>
        </li>
        @if (Auth()->user()->isAdmin == 1)
            <!-- Layouts -->
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ri-layout-2-line"></i>
                    <div data-i18n="Layouts">Master Data</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('pengguna.index') }}" class="menu-link">
                            <div data-i18n="Without menu">Data Pengguna</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('product.index') }}" class="menu-link">
                            <div data-i18n="Fluid">Data Produk</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('category.index') }}" class="menu-link">
                            <div data-i18n="Container">Data Kategori</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('supplier.index') }}" class="menu-link">
                            <div data-i18n="Without navbar">Data Supplier</div>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Front Pages -->
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ri-file-copy-line"></i>
                    <div data-i18n="Front Pages">Laporan</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('pengguna.laporan') }}" class="menu-link">
                            <div data-i18n="Landing">Laporan Pengguna</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('product.report') }}" class="menu-link">
                            <div data-i18n="Pricing">Laporan Produk</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cashier.report') }}" class="menu-link">
                            <div data-i18n="Payment">Laporan Transaksi</div>
                        </a>
                    </li>
                </ul>
            </li>
        @elseif (Auth()->user()->isAdmin == 2)
            <!-- Layouts -->
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ri-layout-2-line"></i>
                    <div data-i18n="Layouts">Master Data</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('pengguna.index') }}" class="menu-link">
                            <div data-i18n="Without menu">Data Pengguna</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('product.index') }}" class="menu-link">
                            <div data-i18n="Fluid">Data Produk</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('category.index') }}" class="menu-link">
                            <div data-i18n="Container">Data Kategori</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('supplier.index') }}" class="menu-link">
                            <div data-i18n="Without navbar">Data Supplier</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ri-layout-left-line"></i>
                    <div data-i18n="Account Settings">Transaksi</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('expenditures.index') }}" class="menu-link">
                            <div data-i18n="Account">Pengeluaran</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cashier.index') }}" class="menu-link">
                            <div data-i18n="Notifications">Transaksi</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cashier.riwayat') }}" class="menu-link">
                            <div data-i18n="Connections">Riwayat Transaksi</div>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Front Pages -->
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ri-file-copy-line"></i>
                    <div data-i18n="Front Pages">Laporan</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('pengguna.laporan') }}" class="menu-link">
                            <div data-i18n="Landing">Laporan Pengguna</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('product.report') }}" class="menu-link">
                            <div data-i18n="Pricing">Laporan Produk</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cashier.report') }}" class="menu-link">
                            <div data-i18n="Payment">Laporan Transaksi</div>
                        </a>
                    </li>
                </ul>
            </li>
        @elseif (Auth()->user()->isAdmin == 0)
            <!-- Pages -->
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ri-layout-left-line"></i>
                    <div data-i18n="Account Settings">Transaksi</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('expenditures.index') }}" class="menu-link">
                            <div data-i18n="Account">Pengeluaran</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cashier.index') }}" class="menu-link">
                            <div data-i18n="Notifications">Transaksi</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cashier.riwayat') }}" class="menu-link">
                            <div data-i18n="Connections">Riwayat Transaksi</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ri-file-copy-line"></i>
                    <div data-i18n="Front Pages">Laporan</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('cashier.report') }}" class="menu-link">
                            <div data-i18n="Payment">Laporan Transaksi</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif





    </ul>
</aside>
<!-- / Menu -->
