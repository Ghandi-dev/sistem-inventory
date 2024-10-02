<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/head');?>
</head>

<body>
    <?php $this->load->view('templates/sidebar');?>
    <div id="right-panel" class="right-panel">
        <?php $this->load->view('templates/header');?>
        <div class="content mb-5">
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <strong class="card-title mb-3">Profile Card</strong>
                            </div>
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <div class="mx-auto d-block text-center">
                                    <div id="imagePreview"
                                        style="width: 370px; height: 370px; border: 1px solid #ddd; overflow: hidden;">
                                        <img id="preview"
                                            src="<?php echo base_url('assets/upload/foto/') . $profile->image ?>"
                                            alt="Preview Gambar"
                                            style="width: 100%; height: 100%; object-fit: cover;" />
                                    </div>
                                    <h2 class="mt-2 mb-1" id="username_profile">
                                        <?php echo $profile->username ?>
                                    </h2>
                                    <div>
                                        <?php echo ($profile->role == 2) ? 'Super Admin' : 'Admin' ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">&nbsp;</div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><strong class="card-title mb-3">Ubah Profile</strong>
                            </div>
                            <div class="card-body">
                                <form id="profile_form" action="<?php echo site_url('admin/update_profile') ?>"
                                    method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label class="small mb-1" for="username">Username</label>
                                        <input class="form-control" id="username" name="username" type="text"
                                            oninput="document.getElementById('username_profile').innerHTML = this.value"
                                            placeholder="Enter your username" value="<?php echo $profile->username ?>"
                                            recuired>
                                    </div>
                                    <label class="small mb-1" for="image">Foto</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="form-control" id="image" name="image"
                                                accept="image/*" onchange="previewImage()">
                                            <input type="hidden" name="old_image" class="form-control"
                                                value="<?php echo $profile->image; ?>">
                                            <label class="custom-file-label" for="image">Pilih file</label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                                    </div>
                                    <!-- Save changes button-->
                                </form>
                            </div>
                            <div class="card-footer">&nbsp;</div>
                        </div>
                        <div class="card">
                            <div class="card-header"><strong class="card-title mb-3">Ubah Password</strong>
                            </div>
                            <div class="card-body">
                                <form id="password_form" action="<?php echo site_url('auth/update_password') ?>"
                                    method="post" enctype="multipart/form-data"
                                    oninput='password_confirm.setCustomValidity(password_confirm.value != password_new.value ? "Passwords tidak sama" : "")'>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="password_old">Password Lama</label>
                                        <input class="form-control" name="password_old" type="password"
                                            placeholder="Masukkan Password Lama" pattern=".{5,}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="password_new">Password Baru</label>
                                        <input class="form-control" name="password_new" type="password"
                                            placeholder="Masukkan Password Baru" pattern=".{5,}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="password_confirm">Konfirmasi Password</label>
                                        <input class="form-control" name="password_confirm" type="password"
                                            placeholder="Konfirmasi Password" pattern=".{5,}" required>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                                    </div>
                                    <!-- Save changes button-->
                                </form>
                            </div>
                            <div class="card-footer">&nbsp;</div>
                        </div>
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
    <script src="<?php echo base_url('assets/sweet-alert/sweetalert2.min.js') ?>"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> -->

    <!-- Ini harus ada setelah jQuery dan Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="<?php echo base_url('assets/js/main.js') ?>"></script>
    <script>
    function previewImage() {
        var file = document.getElementById("image").files[0];
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
    document.addEventListener('DOMContentLoaded', function() {
        <?php if ($this->session->flashdata('success')): ?>
        Swal.fire({
            title: 'Success!',
            text: '<?php echo $this->session->flashdata('success'); ?>',
            icon: 'success',
            confirmButtonText: 'OK'
        });
        <?php elseif ($this->session->flashdata('error')): ?>
        Swal.fire({
            title: 'Error!',
            text: '<?php echo $this->session->flashdata('error'); ?>',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        <?php endif;?>
    });
    </script>
</body>

</html>