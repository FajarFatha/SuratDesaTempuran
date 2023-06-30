<?= $this->extend('layout/main'); ?>
<?= $this->Section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 id="judul">Surat Permohonan Izin Mendirikan Terop di Jalan</h3>
        </div>
    </div>
    <form action="/isiizinterop" method="post" enctype="multipart/form-data">
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
            <label class="col-sm-3 col-form-label"><b>Nama </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputNama3" name="nama" value="<?= (isset($_SESSION["nama"])) ? $_SESSION["nama"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Umur </b></label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="inputNama3" name="umur" value="<?= (isset($_SESSION["umur"])) ? $_SESSION["umur"] : "" ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="pekerjaan" class="col-sm-3 col-form-label"><b>Pekerjaan</b> </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= (isset($_SESSION["pekerjaan"])) ? $_SESSION["pekerjaan"] : "" ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="alamat" class="col-sm-3 col-form-label"><b>Alamat rumah</b></label>
            <div class="col-sm-1">
                <label for="rt">RT</label>
            </div>
            <div class="col-sm-2">
                <input type="number" id="rt" placeholder="001" name="rt" value="<?= (isset($_SESSION["rt"])) ? $_SESSION["rt"] : "" ?>" required>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-1">
                <label for="rw">RW </label>
            </div>
            <div class="col-sm-2">
                <input type="number" id="rw" placeholder="001" name="rw" value="<?= (isset($_SESSION["rw"])) ? $_SESSION["rw"] : "" ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="macamkeramaian" class="col-sm-3 col-form-label"><b>Macam keramaian</b> </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="macamkeramaian" name="keramaian" value="<?= (isset($_SESSION["keramaian"])) ? $_SESSION["keramaian"] : "" ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="Keperluan" class="col-sm-3 col-form-label"><b>Keperluan</b> </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="Keperluan" name="keperluan" value="<?= (isset($_SESSION["keperluan"])) ? $_SESSION["keperluan"] : "" ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="Mulai" class="col-sm-3 col-form-label"><b>Mulai</b> </label>
            <div class="col-sm-9">
                <input type="date" class="form-control" id="Mulai" name="mulai" value="<?= (isset($_SESSION["mulai"])) ? $_SESSION["mulai"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="Sampai" class="col-sm-3 col-form-label"><b>Sampai</b> </label>
            <div class="col-sm-9">
                <input type="date" class="form-control" id="Sampai" name="selesai" value="<?= (isset($_SESSION["selesai"])) ? $_SESSION["selesai"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="Tempat" class="col-sm-3 col-form-label"><b>Tempat</b> </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="Tempat" value="<?= (isset($_SESSION["tempat"])) ? $_SESSION["tempat"] : "Rumah Sendiri" ?>" name="tempat">
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