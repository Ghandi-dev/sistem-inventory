<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white ">
                <h2 class="modal-title font-weight-bold">Tambah data aset</h2>
            </div>
            <div class="modal-body">
                <form id="assetForm" action="<?php echo site_url('aset_kendaraan/create'); ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="nama_aset" class="form-label">Nama Aset</label>
                                <input type="text" class="form-control" name="nama_aset"
                                    placeholder="Masukkan nama aset" required>
                            </div>
                            <div class="mb-3">
                                <label for="kode_aset" class="form-label">Kode</label>
                                <input type="text" pattern="([0-9]+(\.[0-9]+)*)+" class="form-control" name="kode_aset"
                                    placeholder="Masukkan kode" required>
                            </div>
                            <div class="mb-3">
                                <label for="nup" class="form-label">NUP</label>
                                <input type="text" pattern="[0-9]+" class="form-control" name="nup"
                                    placeholder="Masukkan NUP" required>
                            </div>
                            <div class="mb-3">
                                <label for="tahun" class="form-label">Tahun Peroleh</label>
                                <input type="text" pattern="[0-9]{4}" class="form-control" name="tahun"
                                    placeholder="Masukkan tahun" required>
                            </div>
                            <div class="mb-3">
                                <label for="merk" class="form-label">Merk/Type</label>
                                <input type="text" class="form-control" name="merk" placeholder="Masukkan merk"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="nilai" class="form-label">Nilai Aset</label>
                                <input type="text" pattern="Rp\s\d{1,3}(.\d{3})*" oninput="formatCurrency(this)"
                                    class="form-control" name="nilai" placeholder="Rp 0" required>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan"
                                    placeholder="Masukkan keterangan" required>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Foto</label>
                                <div class="custom-file">
                                    <input type="file" class="form-control" id="inputImage" name="image"
                                        accept="image/*" onchange="previewImage()" required>
                                    <label class="custom-file-label" for="inputImage">Pilih file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 ">
                            <div class="d-flex justify-content-center">
                                <div id="imagePreview"
                                    style="width: 258px; height: 258px; border: 1px solid #ddd; overflow: hidden;">
                                    <img id="preview" src="<?php echo base_url('assets') ?>/images/default-image.jpg"
                                        alt="Preview Gambar" style="width: 100%; height: 100%; object-fit: cover;" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="no_polisi" class="form-label">No. Polisi</label>
                                <input type="text" class="form-control" name="no_polisi"
                                    placeholder="Masukkan no. polisi" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_mesin" class="form-label">No. Mesin</label>
                                <input type="text" class="form-control" name="no_mesin" placeholder="Masukkan no. mesin"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="no_rangka" class="form-label">No. Rangka</label>
                                <input type="text" class="form-control" name="no_rangka"
                                    placeholder="Masukkan no. rangka" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_bpkb" class="form-label">No. BPKB</label>
                                <input type="text" class="form-control" name="no_bpkb" placeholder="Masukkan no. BPKB"
                                    required>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button id="submitButton" type="submit" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('submitButton').addEventListener('click', function() {
    // Ambil elemen form berdasarkan ID
    var form = document.getElementById('assetForm');
    if (form.checkValidity()) {
        form.submit();
    } else {
        event.preventDefault(); // Prevent form submission
        event.stopPropagation(); // Stop propagation
        form.reportValidity(); // Show validation errors
    }
});

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