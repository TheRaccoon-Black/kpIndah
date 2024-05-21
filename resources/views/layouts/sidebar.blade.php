<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/dashboard" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="../../assets/img/avatars/logo dpmptsp.png" alt class="w-px-40 h-auto rounded-circle" />
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">SISKOP</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->url() === url('/dashboard') ? 'active' : '' }}">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- User Menu Item -->
        <li class="menu-item {{ request()->url() === url('/user') ? 'active' : '' }}" {{ (Auth::user()->role == 'anggota' || Auth::user()->role == 'kepala_koperasi') ? 'hidden' : '' }}>
            <a href="/user" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="user">User</div>
            </a>
        </li>

        <!-- Simpanan Menu Item -->
        <li class="menu-item {{ request()->url() === url('/simpanan') ? 'active' : '' }}">
            <a href="/simpanan" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="simpanan">Simpanan</div>
            </a>
        </li>

        <!-- Pinjaman Menu Item -->
        <li class="menu-item {{ request()->url() === url('/pinjaman') ? 'active' : '' }}" {{ (Auth::user()->role == 'kepala_koperasi') ? 'hidden' : '' }}>
            <a href="/pinjaman" class="menu-link">
                <i class="menu-icon tf-icons bx bx-add-to-queue"></i>
                <div data-i18n="pinjaman">Pinjaman</div>
            </a>
        </li>

        <!-- Cicilan Menu Item -->
        <li class="menu-item {{ request()->url() === url('/cicilan') ? 'active' : '' }}" {{ (Auth::user()->role == 'kepala_koperasi') ? 'hidden' : '' }}>
            <a href="/cicilan" class="menu-link">
                <i class="menu-icon tf-icons bx bx-right-down-arrow-circle"></i>
                <div data-i18n="cicilan">Cicilan</div>
            </a>
        </li>

        <!-- Pengajuan Menu Item -->
        <li class="menu-item {{ request()->url() === url('/pengajuan') ? 'active' : '' }}" {{ (Auth::user()->role == 'kepala_koperasi') ? 'hidden' : '' }}>
            <a href="/pengajuan" class="menu-link">
                <i class="menu-icon tf-icons bx bx-plus"></i>
                <div data-i18n="pengajuan">Pengajuan Pinjaman</div>
            </a>
        </li>

        <!-- Laporan Data Anggota Menu Item -->
        <li class="menu-item {{ request()->url() === url('/cetakuser') ? 'active' : '' }}" {{ (Auth::user()->role == 'anggota' || Auth::user()->role == 'admin') ? 'hidden' : '' }}>
            <a href="/cetakuser" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="cetak-laporan">Laporan Data Anggota</div>
            </a>
        </li>

        <!-- Gaji Menu Item -->
        <li class="menu-item {{ request()->url() === url('/gaji') ? 'active' : '' }}" {{ (Auth::user()->role != 'admin') ? 'hidden' : '' }}>
            <a href="/gaji" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="cetak-laporan">Gaji</div>
            </a>
        </li>
        <!-- Gaji Menu Item -->
        <li class="menu-item {{ request()->url() === url('/gaji/validate') ? 'active' : '' }}" {{ (Auth::user()->role != 'admin') ? 'hidden' : '' }}>
            <a href="/gaji/validate" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="cetak-laporan">validasi Gaji</div>
            </a>
        </li>

        <!-- Laporan Simpanan Menu Item -->
        <li class="menu-item {{ request()->url() === url('/cetaksimpanan') ? 'active' : '' }}" {{ (Auth::user()->role == 'anggota' || Auth::user()->role == 'admin') ? 'hidden' : '' }}>
            <a href="/cetaksimpanan" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="cetak-laporan">Laporan Simpanan</div>
            </a>
        </li>

        <!-- Laporan Pinjaman Menu Item -->
        <li class="menu-item {{ request()->url() === url('/cetakpinjaman') ? 'active' : '' }}" {{ (Auth::user()->role == 'anggota' || Auth::user()->role == 'admin') ? 'hidden' : '' }}>
            <a href="/cetakpinjaman" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="cetak-laporan">Laporan Pinjaman</div>
            </a>
        </li>

        <!-- Laporan Cicilan Menu Item -->
        <li class="menu-item {{ request()->url() === url('/cetakcicilan') ? 'active' : '' }}" {{ (Auth::user()->role == 'anggota' || Auth::user()->role == 'admin') ? 'hidden' : '' }}>
            <a href="/cetakcicilan" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="cetak-laporan">Laporan Cicilan</div>
            </a>
        </li>
    </ul>
</aside>
