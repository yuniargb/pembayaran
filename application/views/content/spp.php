<div class="container shadow-lg p-3">
    <h1 class="float-left"><?= $this->title ?></h1>
    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-dark float-right mr-3 mt-2">Tambah</button>
    <div class="clearfix"></div>
    <hr>
    <?php
    if ($this->session->flashdata('sukses')) {
        echo '<div class="alert alert-success" role="alert">
            ' . $this->session->flashdata('sukses') . '
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }
    if ($this->session->flashdata('gagal')) {
        echo '<div class="alert alert-danger" role="alert">
            ' . $this->session->flashdata('gagal') . '
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    } else {
        echo "";
    }
    ?>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nik</th>
                <th scope="col">Tanggal Bayar</th>
                <th scope="col">Total Bayar</th>
                <th scope="col">Aksi</th>
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
                    <td><?= $d->tanggalBayar ?></td>
                    <td><?= $d->totalBayar ?></td>
                    <td>
                        <button type="button" data-id="<?= $d->idSpp ?>" data-nik="<?= $d->nik ?>" data-tgl="<?= $d->tanggalBayar ?>" data-total="<?= $d->totalBayar ?>" data-toggle="modal" data-target="#editModal" class="btn btn-primary spp-edit">Edit</button>
                        <a href="<?= base_url('deletespp/' . $d->idSpp) ?>" onclick="javascript: return confirm('Anda yakin hapus ?')" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah SPP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('storespp') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mahasiswa</label>
                        <select name="nik" class="form-control">
                            <?php foreach ($mahasiswa as $d) { ?>
                                <option value="<?= $d->nik ?>"><?= $d->nama ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Bayar</label>
                        <input type="date" name="tgl" class="form-control" id="exampleInputPassword1" placeholder="Tanggal">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Total Bayar</label>
                        <input type="number" name="total" class="form-control" id="exampleInputPassword1" placeholder="Total">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit SPP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('updatespp') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mahasiswa</label>
                        <input type="text" name="id" class="form-control" id="id" hidden>
                        <select name="nik" id="nik" class="form-control">
                            <?php foreach ($mahasiswa as $d) { ?>
                                <option value="<?= $d->nik ?>"><?= $d->nama ?></option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Bayar</label>
                        <input type="date" name="tgl" class="form-control" id="tgl" placeholder="Tanggal">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Total Bayar</label>
                        <input type="number" name="total" class="form-control" id="total" placeholder="Total">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>