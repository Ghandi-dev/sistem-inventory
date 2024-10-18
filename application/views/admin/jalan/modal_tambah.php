<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white ">
                <h2 class="modal-title font-weight-bold">Tambah data aset</h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <form id="assetForm" action="<?php echo site_url('aset_jalan/create'); ?>" method="post"
                            enctype="multipart/form-data">
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
                                <label for="ukuran" class="form-label">Ukuran</label>
                                <input type="text" class="form-control" name="ukuran" placeholder="Masukkan ukuran"
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
                                <div class="custom-file">
                                    <input type="file" class="form-control" id="inputImage" name="image"
                                        accept="image/*" onchange="previewImage()" required>
                                    <label class="custom-file-label" for="inputImage">Pilih file</label>
                                </div>
                                <!-- <label for="inputImage" class="form-label">Upload Gambar</label>
                                <input type="file" class="form-control" id="inputImage" name="image" accept="image/*"
                                    onchange="previewImage()" required> -->
                            </div>
                        </form>
                    </div>
                    <div class="col d-flex justify-content-center align-items-center">
                        <div id="imagePreview"
                            style="width: 370px; height: 370px; border: 1px solid #ddd; overflow: hidden;">
                            <img id="preview" src="<?php echo base_url('assets') ?>/images/default-image.jpg"
                                alt="Preview Gambar" style="width: 100%; height: 100%; object-fit: cover;" />
                        </div>
                    </div>

                </div>
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