<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Page</title>
    <link href="<?php echo base_url('assets/css/custom/print.css') ?>" rel="stylesheet">
</head>

<body>
    <div class="kop-surat">
        <h2>LAPORAN HASIL INVENTARISASI (LHI) ASET DESA</h2>
        <h2>BERUPA TANAH</h2>
        <div class="garis"></div>
    </div>
    <page>
        <table class="table table-bordered">
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