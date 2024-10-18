<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/head');?>
</head>


<body>
    <div class="loading-overlay" id="loading-overlay">
        <div class="loader"></div>
    </div>
    <?php $this->load->view('templates/sidebar');?>
    <div id="right-panel" class="right-panel">
        <?php $this->load->view('templates/header');?>
        <?php $this->load->view('templates/breadcrumbs');?>
        <div id="content" class="content">
            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-between align-items-end mb-2">
                            <div class="col-md-3" style="gap: .5rem;">
                                <button type="button" id="refresh" class="btn btn-primary" data-toggle="modal"
                                    data-target="#addModal"><i class="fa fa-plus"></i>Tambah</button>
                                <button type="button" id="print" class="btn btn-warning"
                                    <?php echo sizeof($aset) == 0 ? 'disabled' : '' ?>><i class="fa fa-print"></i>
                                    Print</button>
                                <!-- <button type="button" id="pdf" class="btn btn-danger"
                                    <?php //echo sizeof($aset) == 0 ? 'disabled' : '' ?>><i class="fa fa-file-pdf-o"></i>
                                    PDF</button> -->
                            </div>
                            <div class="col-md-5">
                                <div class="filter-group" style="gap: .5rem;">
                                    <div class="d-flex align-items-center">
                                        <h5 class="mb-0" style="flex-shrink: 0;">Filter Tahun:</h5>
                                        <input type="text" id="min-input" class="form-control ml-2"
                                            placeholder="Tahun mulai" style="max-width: 120px;">
                                        <input type="text" id="min" class="form-control ml-2" placeholder="Tahun mulai"
                                            style="max-width: 120px;" hidden>
                                        <h5 class="mx-2 mb-0" style="flex-shrink: 0;">-</h5>
                                        <input type="text" id="max-input" class="form-control mr-2"
                                            placeholder="Tahun akhir" style="max-width: 120px;">
                                        <input type="text" id="max" class="form-control mr-2" placeholder="Tahun akhir"
                                            style="max-width: 120px;" hidden>
                                        <button type="button" id="filter" class="btn btn-primary">Terapkan</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex justify-content-end" style="gap: .5rem;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text ti-search"></span>
                                    </div>
                                    <input id="jenis" type="text" class="form-control" value="<?php echo $title ?>"
                                        hidden>
                                    <input id="search" type="text" class="form-control" placeholder="Cari nama aset"
                                        aria-label="Cari" aria-describedby="cari data">
                                </div>
                            </div>

                        </div>
                        <table id="myTable" class="table table-striped table-hover table-bordered display nowrap"
                            cellspacing="0" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Aset</th>
                                    <th class="text-center">Kode Aset</th>
                                    <th class="text-center">NUP</th>
                                    <th class="text-center">Tahun Perolehan</th>
                                    <th class="text-center">Ukuran</th>
                                    <th class="text-center">Nilai(Rp)</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;foreach ($aset as $as): ?>
                                <tr>
                                    <td class="text-center align-middle"><?php echo $no; ?></td>
                                    <td class="text-center align-middle"><?php echo $as->nama_aset; ?></td>
                                    <td class="text-center align-middle"><?php echo $as->kode_aset; ?></td>
                                    <td class="text-center align-middle"><?php echo $as->nup; ?></td>
                                    <td class="text-center align-middle"><?php echo $as->tahun_peroleh; ?></td>
                                    <td class="text-center align-middle"><?php echo $as->ukuran; ?></td>
                                    <td class="text-center align-middle"><?php echo rupiah($as->nilai); ?></td>
                                    <td class="text-center align-middle"><?php echo $as->keterangan; ?></td>
                                    <td class="text-center align-middle">
                                        <span><?php echo anchor('aset_jalan/detail/' . $as->id_aset, '<div  class="btn btn-success btn-sm"><i class="fa fa-eye"></i></div>') ?>
                                        </span>|
                                        <span><?php echo anchor('aset_jalan/edit/' . $as->id_aset, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?>
                                        </span>|
                                        <span>
                                            <div class="btn  btn-danger btn-sm delete"
                                                data-id="<?php echo $as->id_aset; ?>">
                                                <i class=" fa fa-trash"></i>
                                            </div>
                                        </span>
                                    </td>
                                </tr>
                                <?php $no++;endforeach;?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <?php $this->load->view('admin/jalan/modal_tambah');?>
        </div>
        <?php $this->load->view('templates/footer');?>
    </div>
    <?php $this->load->view('templates/script');?>
    <script>
    $('#print').click(function() {
        var min = $('#min').val();
        var max = $('#max').val();
        var search = $('#search').val();
        var jenis = $('#jenis').val();
        window.open('<?php echo base_url('/aset_jalan/print') ?>?min=' + min + '&max=' + max +
            '&nama_aset=' +
            search +
            '&type=' + jenis,
            '_blank');
    })
    </script>
    </script>
</body>

</html>