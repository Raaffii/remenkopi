<nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #F8F5F2;">
    <ul class="nav">
        <li class="nav-item nav-profile border-bottom">
            <a href="#" class="nav-link flex-column">
                <div class="nav-profile-image">
                    <img src="<?= base_url('assets/img_remen/remenkopi.svg') ?>" alt="profile" />

                    <!--change to offline or busy as needed-->
                    <?php $akun = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(); ?>
                </div>
                <div class="nav-profile-text d-flex ms-0 mb-3 flex-column">
                    <span class="font-weight-semibold mb-1 mt-2 text-center"><?= $akun['nama_user'] ?></span>
                    <span class="font-weight-semibold mb-1 mt-2 text-center">Admin</span>
                </div>
            </a>
        </li>

        <li class="pt-2 pb-1">
            <span class="nav-item-head">List</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/vendor') ?>">
                <i class="mdi mdi-contacts menu-icon"></i>
                <span class="menu-title">Vendor</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/event') ?>">
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                <span class="menu-title">Event</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/pesan') ?>">
                <i class="mdi mdi mdi-message menu-icon"></i>
                <span class="menu-title">Pesan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/stokbarang') ?>">
                <i class="mdi mdi-elevator menu-icon"></i>
                <span class="menu-title">Stok Barang</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/historipenjualans') ?>">
                <i class="mdi mdi-file-document-box menu-icon"></i>
                <span class="menu-title">Histori Penjualan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('pegawai/laporanpenjualan') ?>">
                <i class="mdi mdi-chart-line menu-icon"></i>
                <span class="menu-title">Laporan Penjualan</span>
            </a>
        </li>

    </ul>

    <ul class="nav">

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                <i class="mdi mdi-keyboard-return menu-icon"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>
    </ul>
</nav>