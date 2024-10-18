<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/head');?>
</head>

<body>
    <?php $this->load->view('templates/sidebar');?>
    <div id="right-panel" class="right-panel">
        <?php $this->load->view('templates/header');?>
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="ti-world"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span
                                                    class="count"><?php echo $count['jumlah_aset']['tanah']; ?></span>
                                            </div>
                                            <div class="stat-heading">Aset Tanah</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="ti-mobile"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span
                                                    class="count"><?php echo $count['jumlah_aset']['elektronik']; ?></span>
                                            </div>
                                            <div class="stat-heading">Aset Elektronik</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="ti-car"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span
                                                    class="count"><?php echo $count['jumlah_aset']['kendaraan']; ?></span>
                                            </div>
                                            <div class="stat-heading">Aset Kendaraan</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="ti-agenda"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span
                                                    class="count"><?php echo $count['jumlah_aset']['jalan']; ?></span>
                                            </div>
                                            <div class="stat-heading">Aset Jalan</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">
                                                <span><?php echo rupiah(($count['total_nilai']['tanah'])) ?></span>
                                            </div>
                                            <div class="stat-heading">Total Nilai Aset Tanah</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">
                                                <span><?php echo rupiah($count['total_nilai']['elektronik']); ?></span>
                                            </div>
                                            <div class="stat-heading">Total Nilai Aset Elektronik</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">
                                                <span><?php echo rupiah($count['total_nilai']['kendaraan']); ?></span>
                                            </div>
                                            <div class="stat-heading">Total Nilai Aset Kendaraan</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">
                                                <span><?php echo rupiah($count['total_nilai']['jalan']); ?></span>
                                            </div>
                                            <div class="stat-heading">Total Nilai Aset Jalan</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Aset terbaru</h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Nama Aset</th>
                                                    <th class="text-center">Kode Aset</th>
                                                    <th class="text-center">NUP</th>
                                                    <th class="text-center">Tahun Perolehan</th>
                                                    <th class="text-center">Nilai(Rp)</th>
                                                    <th class="text-center">Kategori</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;foreach ($aset as $as): ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo $no; ?></td>
                                                    <td class="text-center align-middle"><?php echo $as->nama_aset; ?>
                                                    </td>
                                                    <td class="text-center align-middle"><?php echo $as->kode_aset; ?>
                                                    </td>
                                                    <td class="text-center align-middle"><?php echo $as->nup; ?></td>
                                                    <td class="text-center align-middle">
                                                        <?php echo $as->tahun_peroleh; ?></td>
                                                    <td class="text-center align-middle">
                                                        <?php echo rupiah($as->nilai); ?></td>
                                                    <td class="text-center align-middle"><?php echo $as->jenis; ?></td>
                                                </tr>
                                                <?php $no++;endforeach;?>
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div> <!-- /.col-lg-8 -->
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('templates/footer');?>
    </div>
    <script src="<?php echo base_url('assets/jquery/jquery-3.7.1.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <!-- sweet alert -->
    <script src="<?php echo base_url('assets/sweet-alert/sweetalert2.all.js') ?>"></script>
    <script>

    </script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> -->

    <!-- Ini harus ada setelah jQuery dan Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="<?php echo base_url('assets/js/main.js') ?>"></script>
    <script src="<?php echo base_url('assets/') ?>DataTables/datatables.min.js"></script>
    <script>
    var table = $('#myTable').DataTable({
        columnDefs: [{
            width: 500, // Mengatur lebar kolom kedua menjadi 200px
            targets: 1
        }],
        fixedColumns: true,
        autoWidth: false,
        paging: false,
        dom: "tp", // Menampilkan table dan pagination
    });
    </script>

</body>

</html>