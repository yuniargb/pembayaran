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
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
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
                    <td><?= $d->nama ?></td>
                    <td><?= $d->alamat ?></td>
                    <td>
                        <button type="button" data-nik="<?= $d->nik ?>" data-nama="<?= $d->nama ?>" data-alamat="<?= $d->alamat ?>" data-toggle="modal" data-target="#editModal" class="btn btn-primary mahasiswa-edit">Edit</button>
                        <a href="<?= base_url('deletemahasiswa/' . $d->nik) ?>" onclick="javascript: return confirm('Anda yakin hapus ?')" class="btn btn-danger">Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('storemahasiswa') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIK</label>
                        <input type="text" name="nik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIK">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputPassword1" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Alamat</label>
                        <textarea name="alamat" id="" cols="30" rows="5" class="form-control" placeholder="Alamat"></textarea>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('updatemahasiswa') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" class="form-control" id="nik" aria-describedby="emailHelp" placeholder="NIK" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Alamat</label>
                        <textarea name="alamat" id="alamat" id="" cols="30" rows="5" class="form-control" placeholder="Alamat"></textarea>
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