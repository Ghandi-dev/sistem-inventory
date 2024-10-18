<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/head');?>
</head>

<body>
    <?php $this->load->view('templates/sidebar');?>
    <div id="right-panel" class="right-panel">
        <?php $this->load->view('templates/header');?>
        <?php $this->load->view('templates/breadcrumbs');?>
        <div id="content" class="content">
            <div class="animated">
                <div class="container-xl">
                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header">Foto aset</div>
                                <div
                                    class="card-body d-flex flex-column align-items-center justify-content-center text-center">
                                    <!-- Profile picture image-->
                                    <div style="width: 370px; height: 370px; border: 1px solid #ddd; overflow: hidden;">
                                        <img class="img-account-profile mb-2"
                                            src="<?php echo base_url('assets/upload/foto/') . $aset->gambar ?>" alt=""
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="card pb-2">
                                <div class="card-header">Data aset</div>
                                <div class="card-body">
                                    <form>
                                        <div class="mb-3">
                                            <label class="small mb-1" for="nama_aset">Nama aset</label>
                                            <input class="form-control" name="nama_aset" type="text"
                                                value="<?php echo $aset->nama_aset ?>" readonly>
                                        </div>
                                        <!-- Form Row-->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (first name)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="kode_aset">Kode</label>
                                                <input class="form-control" name="kode_aset" type="text"
                                                    value="<?php echo $aset->kode_aset ?>" readonly>
                                            </div>
                                            <!-- Form Group (last name)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="nup">NUP</label>
                                                <input class="form-control" name="nup" type="text"
                                                    value="<?php echo $aset->nup ?>" readonly>
                                            </div>
                                        </div>
                                        <!-- Form Row        -->
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="tahun">Tahun peroleh</label>
                                                <input class="form-control" name="tahun" type="text"
                                                    value="<?php echo $aset->tahun_peroleh ?>" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="merk">Merk</label>
                                                <input class="form-control" name="merk" type="text"
                                                    value="<?php echo $aset->merk ?>" readonly>
                                            </div>
                                        </div>
                                        <!-- Form Row-->
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="nilai">Nilai</label>
                                                <input class="form-control" name="nilai" type="text"
                                                    value="<?php echo rupiah($aset->nilai) ?>" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="keterangan">Keterangan</label>
                                                <input class="form-control" name="keterangan" type="text"
                                                    name="keterangan" value="<?php echo $aset->keterangan ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="no_polisi">No Polisi</label>
                                                <input class="form-control" name="no_polisi" type="text"
                                                    value="<?php echo $aset->no_polisi ?>" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="no_mesin">No Mesin</label>
                                                <input class="form-control" name="no_mesin" type="text"
                                                    value="<?php echo $aset->no_mesin ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="no_rangka">No Rangka</label>
                                                <input class="form-control" name="no_rangka" type="text"
                                                    value="<?php echo $aset->no_rangka ?>" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="no_bpkb">No BPKB</label>
                                                <input class="form-control" name="no_bpkb" type="text"
                                                    value="<?php echo $aset->no_bpkb ?>" readonly>
                                            </div>
                                        </div>
                                        <!-- Save changes button-->
                                    </form>
                                    <div class="d-flex justify-content-end">
                                        <button onclick="window.history.back();"
                                            class="btn btn-secondary">Kembali</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('templates/footer');?>
    </div>
    <?php $this->load->view('templates/script');?>

</body>

</html>