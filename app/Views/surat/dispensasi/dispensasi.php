<?= $this->extend('layout/main'); ?>
<?= $this->Section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 id="judul">Surat Keterangan Dispensasi</h3>
        </div>
    </div>
    <form action="/isidispensasi" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= $surat['id']; ?>">
        <input type="hidden" name="surat" value="<?= $surat['surat']; ?>">
        <input type="hidden" name="title" value="<?= $surat['title']; ?>">
        <input type="hidden" name="slug" value="<?= $surat['slug']; ?>">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Klasifikasi Surat </b></label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="klasifikasi" name="klasifikasi" value="<?= $surat['klasifikasi']; ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Nomor Urut Surat </b></label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="nourut" name="nourut" value="<?= (isset($_SESSION["nourut"])) ? $_SESSION["nourut"] : $surat['nourut']; ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="kepada" class="col-sm-3 col-form-label"><b>Kepada</b></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="kepada" value="<?= (isset($_SESSION["kepada"])) ? $_SESSION["kepada"] : "Yth. "; ?>" name="kepada" required>
            </div>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Jabatan" value="<?= (isset($_SESSION["jabatan"])) ? $_SESSION["jabatan"] : " "; ?>" name="jabatan" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Nama </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputNama3" name="nama" value="<?= (isset($_SESSION["nama"])) ? $_SESSION["nama"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>NIP </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="nip" name="nip" value="<?= (isset($_SESSION["nip"])) ? $_SESSION["nip"] : "" ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Pekerjaan </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= (isset($_SESSION["pekerjaan"])) ? $_SESSION["pekerjaan"] : "" ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Unit kerja </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="unitkerja" name="unitkerja" value="<?= (isset($_SESSION["unitkerja"])) ? $_SESSION["unitkerja"] : "" ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Pada </b></label>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Tanggal</b></label>
            <div class="col-sm-9">
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= (isset($_SESSION["tanggal"])) ? $_SESSION["tanggal"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Tempat </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="tempat" value="<?= (isset($_SESSION["tempat"])) ? $_SESSION["tempat"] : "" ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Keperluan </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="keperluan" value="<?= (isset($_SESSION["keperluan"])) ? $_SESSION["keperluan"] : "" ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="pekerjaan" class="col-sm-3 col-form-label">Yang Bertanda Tangan </label>
        </div>
        <div class="row mb-3">
            <label for="ttdnama" class="col-sm-3 col-form-label"><b>Nama</b> </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="ttdnama" name="ttdnama" value="<?= (isset($_SESSION["ttdnama"])) ? $_SESSION["ttdnama"] : $tertanda['nama']; ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="ttdjabatan" class="col-sm-3 col-form-label"><b>Jabatan</b> </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="ttdjabatan" name="ttdjabatan" value="<?= (isset($_SESSION["ttdjabatan"])) ? $_SESSION["ttdjabatan"] : $tertanda['jabatan']; ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-11">
                <a href="/pages" class="btn btn-danger">Kembali</a>
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
<?= $this->endSection('konten'); ?>