<?= $this->section('layouts/admin') ?>
<?= $this->section('title') ?>
masyarakat
<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h3>Form Input Masyarakat</form></h3>
    </div>
    <form action="addmasyarakat" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="nik">Nik</label>
                <input type="number" name="nik" id="nik" class="form-control">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="telp">Telp</label>
                <input type="number" name="telp" id="telp" class="form-control">
            </div>
            </div>
              <div class="card-header">
                <input type="submit" value="simpan" class="btn btn-primary"><i class="fas fa-save"></i><input type="reset" value="cancel" class="btn btn-secondary">
            </div>
            </form>
        </div>
        <?= $this->endSection()?>            
