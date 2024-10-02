<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/head');?>
    <title>Document</title>
</head>

<body class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="sufee-login d-flex align-content-center flex-wrap ">
        <div class="container">
            <div class="login-content">
                <div class="login-form rounded shadow p-3 mb-5 bg-white rounded " style="width: 400px">
                    <form action="<?php echo site_url('auth/login'); ?>" method="post">
                        <div class="login-logo">
                            <img class="align-content"
                                src="<?php echo base_url('assets/') ?>images/logo-desa-cigelam.png" alt="" width="100">
                        </div>
                        <div class="form-group mt-5 ">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/jquery/jquery-3.7.1.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <!-- sweet alert -->
    <script src="<?php echo base_url('assets/sweet-alert/sweetalert2.all.js') ?>"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> -->

    <!-- Ini harus ada setelah jQuery dan Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="<?php echo base_url('assets/js/main.js') ?>"></script>
    <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        <?php if ($this->session->flashdata('success')): ?>
        Swal.fire({
            title: 'Success!',
            text: '<?php echo $this->session->flashdata('success'); ?>',
            icon: 'success', // Jangan lupa aktifkan ikon
            timer: 2000,
            timerProgressBar: true,
            showConfirmButton: false, // Ini agar tombol tidak menghentikan progress bar
        });
        <?php elseif ($this->session->flashdata('error')): ?>
        Swal.fire({
            title: 'Error!',
            text: '<?php echo $this->session->flashdata('error'); ?>',
            icon: 'error', // Jangan lupa aktifkan ikon
            timer: 2000,
            timerProgressBar: true,
            showConfirmButton: false, // Ini agar tombol tidak menghentikan progress bar
        });
        <?php endif;?>
    });
    </script>
</body>

</html>