<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="<?php echo (strtolower($title) == "dashboard") ? 'active' : ''; ?>">
                    <a href="<?=base_url('admin/')?>"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">KATEGORI ASET</li><!-- /.menu-title -->
                <li class="<?php echo (strtolower($title) == "tanah") ? 'active' : ''; ?>">
                    <a href="<?=base_url('admin/tanah')?>"> <i class="menu-icon ti-world"></i>Aset Tanah</a>
                </li>
                <li class="<?php echo (strtolower($title) == "elektronik") ? 'active' : ''; ?>">
                    <a href="<?=base_url('admin/elektronik')?>"> <i class="menu-icon ti-mobile"></i>Aset
                        Elektronik</a>
                </li>
                <li class="<?php echo (strtolower($title) == "kendaraan") ? 'active' : ''; ?>">
                    <a href="<?=base_url('admin/kendaraan')?>"> <i class="menu-icon ti-car"></i>Aset Kendaraan</a>
                </li>
                <li class="<?php echo (strtolower($title) == "jalan") ? 'active' : ''; ?>">
                    <a href="<?=base_url('admin/jalan')?>"> <i class="menu-icon ti-agenda"></i>Aset Jalan</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>