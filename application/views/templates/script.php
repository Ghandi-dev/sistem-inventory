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


<!-- Data Tables -->
<script>
window.onload = function() {
    document.getElementById('loading-overlay').style.display = 'none';
    // document.getElementsByClassName('container').style.animation = 'fadeIn 1s ease-in-out';
}

$('#print').click(function() {
    var min = $('#min').val();
    var max = $('#max').val();
    var search = $('#search').val();
    var jenis = $('#jenis').val();
    window.open('<?php echo base_url('/admin/print') ?>?min=' + min + '&max=' + max + '&nama_aset=' + search +
        '&type=' + jenis,
        '_blank');
})
$('#pdf').click(function() {
    var min = $('#min').val();
    var max = $('#max').val();
    var search = $('#search').val();
    var jenis = $('#jenis').val();
    window.location.href = '<?php echo base_url('/admin/export') ?>?min=' + min + '&max=' + max +
        '&nama_aset=' + search + '&type=' + jenis;
});


$(document).ready(function() {
    var table = $('#myTable').DataTable({
        columnDefs: [{
            width: 500, // Mengatur lebar kolom kedua menjadi 200px
            targets: 1
        }],
        fixedColumns: true,
        // scrollX: 390,
        autoWidth: false,
        dom: "tp", // Menampilkan table dan pagination
    });

    // Tambahkan CSS untuk mencegah wrapping text
    $('#myTable').css('width', '100%');


    table.buttons().container().find('.btn').removeClass('btn-primary btn-secondary btn-danger');

    $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
        var searchText = $('#search').val().toLowerCase();
        var columnText = data[1].toLowerCase(); // Mengambil teks dari kolom ke-5

        if (searchText === '' || columnText.includes(searchText)) {
            return true;
        }
        return false;
    });

    $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
        var min = parseFloat($('#min').val(), 10);
        var max = parseFloat($('#max').val(), 10);
        var year = parseFloat(data[4]) || 0;

        if (
            (isNaN(min) && isNaN(max)) ||
            (isNaN(min) && year <= max) ||
            (min <= year && isNaN(max)) ||
            (min <= year && year <= max)
        ) {
            return true;
        }
        return false;
    });


    $('#filter').on('click', function() {
        $('#min').val($('#min-input').val())
        $('#max').val($('#max-input').val())
        table.draw();
    });
    $('#search').on('input', function() {
        table.draw();
    });
});

function formatCurrency(input) {
    // Mendapatkan nilai input dan menghapus semua karakter kecuali angka
    let value = input.value.replace(/[^,\d]/g, '');
    // Format ke dalam bentuk angka dengan koma sebagai pemisah ribuan
    let formatted = new Intl.NumberFormat('id-ID').format(value);
    input.value = 'Rp ' + formatted;
}

function stripCurrency(input) {
    // Menghapus semua karakter kecuali angka
    input.value = input.value.replace(/[^,\d]/g, '');
}
</script>
<!-- script alert -->
<script type="text/javascript">
$('.delete').on('click', function(e) {
    e.preventDefault();
    let id = $(this).data('id');

    Swal.fire({
        title: "Anda yakin?",
        text: "Apakah anda yakin menghapus data ini?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus data ini!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `<?php echo site_url('admin/delete/'); ?>${id}<?php echo '?type=' . $title ?>`,
                type: 'POST',
                data: {
                    id: id
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'Data Berhasil dihapus',
                        icon: 'success'
                    }).then(() => {
                        // Optionally reload or update the page content
                        location.reload();
                    });
                },
                error: function() {
                    Swal.fire({
                        title: 'Error!',
                        text: 'There was an issue deleting the item.',
                        icon: 'error'
                    });
                }
            });
        }
    });
});

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