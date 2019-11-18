<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Laporan-Pembayaran.xls");
?>
<table border="1" class="table basic-datatables">
    <thead class="thead-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nik</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal Bayar</th>
            <th scope="col">Total Bayar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($data as $d) {
            ?>

            <tr>
                <th scope="row"><?= $no ?></th>
                <td><?= $d->nik ?></td>
                <td><?= $d->nama ?></td>
                <td><?= $d->tanggalBayar ?></td>
                <td><?= $d->totalBayar ?></td>
            </tr>
        <?php
            $no++;
        }
        ?>
    </tbody>
</table>