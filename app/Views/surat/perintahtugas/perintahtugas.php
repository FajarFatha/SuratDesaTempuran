<?= $this->extend('layout/main'); ?>
<?= $this->Section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 id="judul">Surat Perintah Tugas</h3>
        </div>
    </div>
    <form action="/isiperintahtugas" method="post" enctype="multipart/form-data">
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
            <label class="col-sm-3 col-form-label">Yang Bertanda Tangan </label>
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
            <label class="col-sm-3 col-form-label"><b>Nama </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputNama3" name="nama" value="<?= (isset($_SESSION["nama"])) ? $_SESSION["nama"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Alamat </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= (isset($_SESSION["alamat"])) ? $_SESSION["alamat"] : "Tempuran" ?>" name="alamat" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Jabatan </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="jabatan" value="<?= (isset($_SESSION["jabatan"])) ? $_SESSION["jabatan"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="keterangan" class="col-sm-3 col-form-label"><b>Keterangan</b></label>
            <div class="col-sm-9">
                <textarea type="text" class="form-control" id="keterangan" style="height: 100px;" name="keterangan" required><?= (isset($_SESSION["keterangan"])) ? $_SESSION["keterangan"] : "Untuk mengikuti ....." ?></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Mulai </b></label>
            <div class="col-sm-9">
                <input type="date" class="form-control" name="mulai" value="<?= (isset($_SESSION["mulai"])) ? $_SESSION["mulai"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Sampai </b></label>
            <div class="col-sm-9">
                <input type="date" class="form-control" name="selesai" value="<?= (isset($_SESSION["selesai"])) ? $_SESSION["selesai"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Tempat </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="tempat" value="<?= (isset($_SESSION["tempat"])) ? $_SESSION["tempat"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Jam </b></label>
            <div class="col-sm-9">
                <input type="time" class="form-control" name="jam" value="<?= (isset($_SESSION["jam"])) ? $_SESSION["jam"] : "" ?>" required>
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