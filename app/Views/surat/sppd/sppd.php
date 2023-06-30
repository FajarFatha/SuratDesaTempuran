<?= $this->extend('layout/main'); ?>
<?= $this->Section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 id="judul">Surat Perintah Perjalanan Dinas</h3>
        </div>
    </div>
    <form action="/isisppd" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= $surat['id']; ?>">
        <input type="hidden" name="surat" value="<?= $surat['surat']; ?>">
        <input type="hidden" name="title" value="<?= $surat['title']; ?>">
        <input type="hidden" name="slug" value="<?= $surat['slug']; ?>">
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label"><b>Klasifikasi Surat </b></label>
            <div class="col-sm-8">
                <input type="number" class="form-control" id="klasifikasi" name="klasifikasi" value="<?= $surat['klasifikasi']; ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label"><b>Nomor Urut Surat </b></label>
            <div class="col-sm-8">
                <input type="number" class="form-control" id="nourut" name="nourut" value="<?= (isset($_SESSION["nourut"])) ? $_SESSION["nourut"] : $surat['nourut']; ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label"><b>Nama </b></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="inputNama3" name="nama" value="<?= (isset($_SESSION["nama"])) ? $_SESSION["nama"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label"><b>Jabatan </b></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="jabatan" value="<?= (isset($_SESSION["jabatan"])) ? $_SESSION["jabatan"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label"><b>Pengikut</b></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="pengikut" value="<?= (isset($_SESSION["pengikut"])) ? $_SESSION["pengikut"] : "" ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label"><b>Dari</b></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" value="<?= (isset($_SESSION["dari"])) ? $_SESSION["dari"] : "Kantor Desa Tempuran" ?>" name="dari">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label"><b>Ke</b></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="ke" value="<?= (isset($_SESSION["ke"])) ? $_SESSION["ke"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label"><b>Transportasi yang digunakan</b></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="transportasi" value="<?= (isset($_SESSION["transportasi"])) ? $_SESSION["transportasi"] : "" ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label"><b>Selama</b></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" value="<?= (isset($_SESSION["selama"])) ? $_SESSION["selama"] : "1 (Satu) hari" ?>" name="selama">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label"><b>Dari Tanggal</b></label>
            <div class="col-sm-8">
                <input type="date" class="form-control" name="daritanggal" value="<?= (isset($_SESSION["daritanggal"])) ? $_SESSION["daritanggal"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label"><b>Maksud mengadakan perjalanan dinas</b></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="maksud" value="<?= (isset($_SESSION["maksud"])) ? $_SESSION["maksud"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label"><b>Atas beban Anggaran </b></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" value="<?= (isset($_SESSION["atasbebananggaran"])) ? $_SESSION["atasbebananggaran"] : "PADES 2022" ?>" name="atasbebananggaran">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label"><b>Berangkat dari</b></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" value="<?= (isset($_SESSION["berangkatdari"])) ? $_SESSION["berangkatdari"] : "Kantor Desa Tempuran" ?>" name="berangkatdari">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label"><b>Tempat kedudukan </b></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" value="<?= (isset($_SESSION["tempatkedudukan"])) ? $_SESSION["tempatkedudukan"] : "Kantor Desa Tempuran" ?>" name="tempatkedudukan">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label"><b>Tempat tujuan </b></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="tepattujuan" value="<?= (isset($_SESSION["tempattujuan"])) ? $_SESSION["tempattujuan"] : "Kantor Desa Tempuran" ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label"><b>Kecamatan/Kabupaten Tujuan</b> </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="kecamatankabupaten" value="<?= (isset($_SESSION["kecamatankabupaten"])) ? $_SESSION["kecamatankabupaten"] : "" ?>">
            </div>
        </div>
        <div class="row mb-4">
            <label class="col-sm-3 col-form-label">Yang Bertanda Tangan </label>
        </div>
        <div class="row mb-3">
            <label for="ttdnama" class="col-sm-4 col-form-label"><b>Nama</b> </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="ttdnama" name="ttdnama" value="<?= (isset($_SESSION["ttdnama"])) ? $_SESSION["ttdnama"] : $tertanda['nama']; ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="ttdjabatan" class="col-sm-4 col-form-label"><b>Jabatan</b> </label>
            <div class="col-sm-8">
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