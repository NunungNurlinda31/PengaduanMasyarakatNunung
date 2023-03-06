<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
<b><i class="fas fa-fw-solid fa-user-lock"></i>Pengaduan</b>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-primary">
                <a href="#" data-pengaduan="" class="btn btn-outline-light" data-target="#modalPengaduan" data-toggle="modal"><i class="fas fa-fw fa-solid fa-user-plus"></i>Pengaduan Baru</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="pengaduan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>tgl pengaduan</th>
                            <th>isi laporan</th>
                            <th>foto</th>
                            <th>status</th>
                            <th>aksi</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($pengaduan as $row) {
                            $no++;
                            $data = $row['tgl_pengaduan'].",".$row['nik'] .",".$row['foto'] . "," . $row['aksi'] . "," . base_url('pengaduan/edit/' . $row['id_pengaduan']);
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['tgl_pengaduan'] ?></td>
                                <td><?= $row['isi_laporan'] ?></td>
                                <td><?= $row['foto'] ?></td>
                                <td><?= $row['status'] ?></td>
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

<div class="modal fade" id="modalPengaduan" tabindex="-1" aria-labelledby="modalPengaduanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModellLabel">Tambah Data Pengaduan</h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frmPengaduan" action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Isi Laporan</label>
                        <textarea class="form-control" name="isi laporan" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn sussess"></i>Simpan</button>
                       
                    </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->Section("script") ?>
<script>
    $(document).ready(function() {
        $("#modalPengaduan").on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var data = button.data('pengaduan');
            alert(data);
            if (data != "") {
                alert(data);
                const barisdata = data.split(",");
                $('#tgl_pengaduan').val(barisdata[0]);
                $('#isi laporan').val(barisdata[1]);
                $('#foto').val(barisdata[2]);
                $('#status').val(barisdata[3]).change();
                $('#frmPengaduan').attr('action', barisdata[4]);
            } else {
                $('#tgl_pengaduan').val('');
                $('#isi laporan').val('');
                $('#foto').val('');
                $('#status').val('').change();
                $('#frmPengaduan').attr('action', 'pengaduan');
            }
        });
        $("#pengaduan").dataTable();
    })
</script>
<?= $this->endSection() ?>