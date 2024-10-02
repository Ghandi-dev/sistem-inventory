<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header d-flex align-items-center justify-content-between">
            <a class="navbar-brand d-flex flex-row align-items-center justify-content-left" href="./">
                <img src="<?php echo base_url('assets/images/') ?>logo-desa-cigelam.png" alt="Logo" width="40">
                <p class="m-0 ml-2 font-weight-bold" style="line-height: 1;">ASET BARANG<br>DESA CIGELAM</p>
            </a>
            <a id="menuToggle" class="menutoggle d-flex align-items-center justify-content-center"><i
                    class="fa fa-bars"></i></a>
        </div>

    </div>
    <div class="top-right">
        <div class="header-menu">

            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="user-avatar rounded-circle" height="40"
                        src="<?php echo base_url('assets/upload/foto/') . $this->session->userdata('image') ?>"
                        alt="User Avatar" style="object-fit: cover;">
                </a>


                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="<?php echo site_url('admin/profile') ?>"><i class="fa fa- user"></i>My
                        Profile</a>
                    <a class="nav-link" href="<?php echo site_url('auth/logout') ?>"><i
                            class="fa fa-power -off"></i>Logout</a>
                </div>
            </div>

        </div>
    </div>
</header>