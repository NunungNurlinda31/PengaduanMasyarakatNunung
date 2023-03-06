<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
<b><i class="fas fa-fw-solid fa-user-lock"></i>Petugas</b>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-primary">
                <a href="#" data-petugas="" class="btn btn-outline-light" data-target="#modalPetugas" data-toggle="modal"><i class="fas fa-fw fa-solid fa-user-plus"></i>Petugas Baru</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="petugas">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>nama petugas</th>
                            <th>username</th>
                            <th>password</th>
                            <th>telp</th>
                            <th>level</th>
                            <th>aksi</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($petugas as $row) {
                            $no++;
                            $data = $row['id_petugas'].",".$row['nama_petugas'] . "," . $row['username'] . "," . $row['telp'] . "," . $row['level'] . "," . base_url('petugas/edit/' . $row['id_petugas']);
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['nama_petugas'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['password'] ?></td>
                                <td><?= $row['telp'] ?></td>
                                <td><?= $row['level'] ?></td>
                                <td>
                                    <a href="" data-petugas="<?= $data ?>" data-target="#modalPetugas" data-toggle="modal" class="btn btn-warning">Edit</a>
                                    <a href="<?= base_url('petugas/delete/' . $row['id_petugas']) ?>" onclick="return confirm('yakin mau hapus?')" class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="modalPetugas" tabindex="-1" aria-labelledby="modalPetugasLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModellLabel">Input Data Petugas</h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frmPetugas" action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_petugas">Nama Petugas</label>
                        <input type="text" name="nama_petugas" class="form-control" id="nama_petugas">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="telp">telp</label>
                        <input type="number" name="telp" class="form-control" id="telp">
                    </div>

                    <div class="form-group">
                        <label for="level">level</label>
                        <select name="level" id="level" class="form-control" required>
                            <option value="">== pilih hak akses ==</option>
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">ubahpassword</label>
                        <input type="checkbox" name="ubahpassword" class="form-control" aria-label="mau ubah password" id="ubahpassword">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->Section("script") ?>
<script>
    $(document).ready(function() {
        $("#modalPetugas").on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var data = button.data('petugas');
            alert(data);
            if (data != "") {
                alert(data);
                const barisdata = data.split(",");
                $('#nama_petugas').val(barisdata[0]);
                $('#username').val(barisdata[1]);
                $('#telp').val(barisdata[2]);
                $('#level').val(barisdata[3]).change();
                $('#frmPetugas').attr('action', barisdata[4]);
            } else {
                $('#nama_petugas').val('');
                $('#username').val('');
                $('#telp').val('');
                $('#level').val('').change();
                $('#frmPetugas').attr('action', 'petugas');
            }
        });
        $("#petugas").dataTable();
    })
</script>
<?= $this->endSection() ?>