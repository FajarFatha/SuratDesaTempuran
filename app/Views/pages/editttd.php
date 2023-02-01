<?= $this->extend('layout/main'); ?>
<?= $this->Section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 id="judul">Edit</h3>
        </div>
    </div>
    <form action="/updatettd/<?= $tertanda['id']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Yang Bertanda Tangan </label>
        </div>
        <div class="row mb-3">
            <label for="ttdnama" class="col-sm-3 col-form-label"><b>Nama</b> </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="ttdnama" name="ttdnama" value="<?= $tertanda['nama']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="ttdjabatan" class="col-sm-3 col-form-label"><b>Jabatan</b> </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="ttdjabatan" name="ttdjabatan" value="<?= $tertanda['jabatan']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="ttdalamat" class="col-sm-3 col-form-label"><b>Alamat (Dusun)</b> </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="ttdalamat" name="ttdalamat" value="<?= $tertanda['alamat']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-11">
                <a href="/ttd" class="btn btn-danger">Kembali</a>
            </div>
            <div class="col-sm-1">
                <button type="submit" class="btn btn-primary">Lanjut</button>
            </div>
        </div>
    </form>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?= $this->endSection('konten'); ?>