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
                            <div class="card pb-5 mb-xl-0">
                                <div class="card-header">Foto aset</div>
                                <div
                                    class="card-body d-flex flex-column align-items-center justify-content-center text-center">
                                    <!-- Profile picture image-->
                                    <div id="imagePreview"
                                        style="width: 370px; height: 370px; border: 1px solid #ddd; overflow: hidden;">
                                        <img id="preview" class="img-account-profile mb-2"
                                            src="<?php echo base_url('assets/upload/foto/') . $aset->gambar ?>" alt=""
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="card pb-1">
                                <div class="card-header">Data aset</div>
                                <div class="card-body">
                                    <form id="assetForm" action="<?php echo site_url('aset_kendaraan/update'); ?>"
                                        method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label class="small mb-1" for="nama_aset">Nama aset</label>
                                            <input class="form-control" type="text" name="id"
                                                value="<?php echo $aset->id_aset ?>" hidden>
                                            <input class="form-control" name="nama_aset" type="text"
                                                placeholder="Enter your username"
                                                value="<?php echo $aset->nama_aset ?>">
                                        </div>
                                        <!-- Form Row-->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (first name)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="kode_aset">Kode</label>
                                                <input type="text" pattern="([0-9]+(\.[0-9]+)*)+" class="form-control"
                                                    name="kode_aset" placeholder="Masukkan kode" required
                                                    value="<?php echo $aset->kode_aset ?>">
                                            </div>
                                            <!-- Form Group (last name)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="nup">NUP</label>
                                                <input type="text" pattern="[0-9]+" class="form-control" name="nup"
                                                    placeholder="Masukkan NUP" required
                                                    value="<?php echo $aset->nup ?>">
                                            </div>
                                        </div>
                                        <!-- Form Row        -->
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="tahun">Tahun peroleh</label>
                                                <input type="text" pattern="[0-9]{4}" class="form-control" name="tahun"
                                                    placeholder="Masukkan tahun" required
                                                    value="<?php echo $aset->tahun_peroleh ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="merk">Merk</label>
                                                <input type="text" class="form-control" name="merk"
                                                    placeholder="Masukkan merk" required
                                                    value="<?php echo $aset->merk ?>">
                                            </div>
                                        </div>
                                        <!-- Form Row-->
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="nilai">Nilai</label>
                                                <input type="text" pattern="Rp\s\d{1,3}(.\d{3})*"
                                                    oninput="formatCurrency(this)" class="form-control" name="nilai"
                                                    placeholder="Masukkan nilai aset"
                                                    value="<?php echo rupiah($aset->nilai) ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="keterangan">Keterangan</label>
                                                <input type="text" class="form-control" name="keterangan"
                                                    placeholder="Masukkan keterangan"
                                                    value="<?php echo $aset->keterangan ?>">
                                            </div>
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="no_polisi">No Polisi</label>
                                                <input class="form-control" name="no_polisi" type="text"
                                                    value="<?php echo $aset->no_polisi ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="no_mesin">No Mesin</label>
                                                <input class="form-control" name="no_mesin" type="text"
                                                    value="<?php echo $aset->no_mesin ?>">
                                            </div>
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="no_rangka">No Rangka</label>
                                                <input class="form-control" name="no_rangka" type="text"
                                                    value="<?php echo $aset->no_rangka ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="no_bpkb">No BPKB</label>
                                                <input class="form-control" name="no_bpkb" type="text"
                                                    value="<?php echo $aset->no_bpkb ?>">
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="form-control" id="inputImage" name="image"
                                                    accept="image/*" onchange="previewImage()">
                                                <input type="hidden" name="old_image" class="form-control"
                                                    value="<?php echo $aset->gambar; ?>">
                                                <label class="custom-file-label" for="inputImage">Pilih file</label>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button onclick="window.history.back();"
                                                class="btn btn-secondary">Kembali</button>
                                            <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                                        </div>
                                        <!-- Save changes button-->
                                    </form>
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
    <script>
    function previewImage() {
        var file = document.getElementById("inputImage").files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            var preview = document.getElementById("preview");
            preview.src = e.target.result;
            preview.style.display = "block";
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }
    </script>
</body>

</html>