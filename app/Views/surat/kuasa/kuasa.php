<?= $this->extend('layout/main'); ?>
<?= $this->Section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 id="judul">Surat Kuasa</h3>
        </div>
    </div>
    <form action="/isikuasa" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Nama </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputNama3" name="nama" value="<?= (isset($_SESSION["nama"])) ? $_SESSION["nama"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputttl3" class="col-sm-3 col-form-label"><b>Tempat, Tanggal Lahir</b></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputttl3" value="<?= (isset($_SESSION["tempat"])) ? $_SESSION["tempat"] : "Ngawi" ?>" name="tempat" required>
            </div>
            <div class="col-sm-5">
                <input type="date" class="form-control" name="ttl" value="<?= (isset($_SESSION["ttl"])) ? $_SESSION["ttl"] : "" ?>" required>
            </div>
        </div>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-3 pt-0"><b>Jenis Kelamin</b></legend>
            <div class="col-sm-9">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kelamin" id="kelamin1" value="Laki-Laki" <?= (isset($_SESSION['kelamin'])) ? (($_SESSION['kelamin'] == "Laki-laki") ? "checked" : "") : "checked"; ?>>
                    <label class="form-check-label" for="kelamin1">
                        Laki-Laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kelamin" id="kelamin2" value="Perempuan" <?= (isset($_SESSION['kelamin'])) ? (($_SESSION['kelamin'] == "Perempuan") ? "checked" : "") : ""; ?>>
                    <label class="form-check-label" for="kelamin2">
                        Perempuan
                    </label>
                </div>
            </div>
        </fieldset>
        <div class="row mb-3">
            <label for="pekerjaan" class="col-sm-3 col-form-label"><b>Pekerjaan</b> </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= (isset($_SESSION["pekerjaan"])) ? $_SESSION["pekerjaan"] : "" ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="telpon" class="col-sm-3 col-form-label"><b>No. Telpon</b> </label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="telpon" name="nohp" value="<?= (isset($_SESSION["nohp"])) ? $_SESSION["nohp"] : "" ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="alamat" class="col-sm-3 col-form-label"><b>Alamat</b></label>
            <div class="col-sm-1">
                <label for="rt">RT</label>
            </div>
            <div class="col-sm-2">
                <input type="number" id="rt" placeholder="001" name="rt" value="<?= (isset($_SESSION["rt"])) ? $_SESSION["rt"] : "" ?>" required>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-1">
                <label for="rw">RW</label>
            </div>
            <div class="col-sm-2">
                <input type="number" id="rw" placeholder="001" name="rw" value="<?= (isset($_SESSION["rw"])) ? $_SESSION["rw"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Memberi Kuasa Kepada </label>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Nama </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputNama3" name="nama2" value="<?= (isset($_SESSION["nama2"])) ? $_SESSION["nama2"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputttl3" class="col-sm-3 col-form-label"><b>Tempat, Tanggal Lahir</b></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputttl3" value="<?= (isset($_SESSION["tempat2"])) ? $_SESSION["tempat2"] : "Ngawi" ?>" name="tempat2" required>
            </div>
            <div class="col-sm-5">
                <input type="date" class="form-control" name="ttl2" value="<?= (isset($_SESSION["ttl2"])) ? $_SESSION["ttl2"] : "" ?>" required>
            </div>
        </div>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-3 pt-0"><b>Jenis Kelamin</b></legend>
            <div class="col-sm-9">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kelamin2" id="kelamin2" value="Laki-Laki" <?= (isset($_SESSION['kelamin2'])) ? (($_SESSION['kelamin2'] == "Laki-laki") ? "checked" : "") : "checked"; ?>>
                    <label class="form-check-label" for="kelamin1">
                        Laki-Laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kelamin2" id="kelamin2" value="Perempuan" <?= (isset($_SESSION['kelamin'])) ? (($_SESSION['kelamin'] == "Perempuan") ? "checked" : "") : ""; ?>>
                    <label class="form-check-label" for="kelamin2">
                        Perempuan
                    </label>
                </div>
            </div>
        </fieldset>
        <div class="row mb-3">
            <label for="pekerjaan" class="col-sm-3 col-form-label"><b>Pekerjaan</b> </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan2" value="<?= (isset($_SESSION["pekerjaan2"])) ? $_SESSION["pekerjaan2"] : "" ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="telpon" class="col-sm-3 col-form-label"><b>No. Telpon</b> </label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="telpon" name="nohp2" value="<?= (isset($_SESSION["nohp2"])) ? $_SESSION["nohp2"] : "" ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="alamat" class="col-sm-3 col-form-label"><b>Alamat</b></label>
            <div class="col-sm-1">
                <label for="rt">RT</label>
            </div>
            <div class="col-sm-2">
                <input type="number" id="rt" placeholder="001" name="rt2" value="<?= (isset($_SESSION["rt2"])) ? $_SESSION["rt2"] : "" ?>" required>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-1">
                <label for="rw">RW</label>
            </div>
            <div class="col-sm-2">
                <input type="number" id="rw" placeholder="001" name="rw2" value="<?= (isset($_SESSION["rw2"])) ? $_SESSION["rw2"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="keterangan" class="col-sm-3 col-form-label"><b>Keterangan</b></label>
            <div class="col-sm-9">
                <textarea type="text" class="form-control" id="keterangan" style="height: 100px;" name="keterangan" required><?= (isset($_SESSION["keterangan"])) ? $_SESSION["keterangan"] : "Surat Kuasa ini dipergunakan untuk ..." ?></textarea>
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