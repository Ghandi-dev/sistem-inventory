<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Page</title>
    <link href="<?php echo base_url('assets/css/custom/print.css') ?>" rel="stylesheet">
    <style>
    .kop-surat {
        width: 100%;
        overflow: hidden;
        text-align: center;
        gap: -100px;
    }

    .kop-surat img {
        float: left;
        width: 80px;
        /* Adjust the width */
        height: auto;
        /* margin-left: 300px; */
    }

    .kop-surat div {
        text-align: center;
    }

    .garis {
        border-bottom: 4px solid black;
        margin-top: 5px;
        margin-bottom: 15px;
    }

    .content {
        margin-top: 20px;
    }
    </style>
</head>

<body>
    <div class="kop-surat">
        <img src="<?php echo base_url('assets/images/logo-kabupaten-purwakarta.png') ?>" alt="Logo Desa">
        <div>
            <h2>PEMERINTAH KABUPATEN PURWAKARTA</h2>
            <h2>KECAMATAN BABAKANCIKAO</h2>
            <h2>DESA CIGELAM</h2>
            <p>Jalan Raya Cigelam Alternatif Cikopak - Kota Bukit Indah, Email: admin@cigelam.desa.id</p>
            <p>Kode Pos: 41151</p>
        </div>
    </div>
    <div class="garis"></div>
    <div class="kop-surat">
        <h3>LAPORAN HASIL INVENTARISASI (LHI) ASET DESA BERUPA TANAH</h3>
        <!-- <div class="garis"></div> -->
    </div>
    <page>
        <table class="table table-bordered" style="margin-top: 10px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Aset</th>
                    <th>Kode Aset</th>
                    <th>NUP</th>
                    <th>Tahun Perolehan</th>
                    <th>Luas (m<sup>2</sup>)</th>
                    <th>Nilai(Rp)</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;foreach ($aset as $as): ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $as->nama_aset; ?></td>
                    <td><?php echo $as->kode_aset; ?></td>
                    <td><?php echo $as->nup; ?></td>
                    <td><?php echo $as->tahun_peroleh; ?></td>
                    <td><?php echo $as->merk; ?></td>
                    <td><?php echo rupiah($as->nilai); ?></td>
                    <td><?php echo $as->keterangan; ?></td>
                </tr>
                <?php $no++;endforeach;?>
            </tbody>
        </table>
    </page>
    <script type="text/javascript">
    window.onload = function() {
        window.print();
    }
    </script>
</body>

</html>