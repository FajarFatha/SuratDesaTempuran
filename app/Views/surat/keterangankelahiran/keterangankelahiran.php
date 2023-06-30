<?= $this->extend('layout/main'); ?>
<?= $this->Section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 id="judul">Surat Keterangan Kelahiran</h3>
        </div>
    </div>
    <form action="/isiketerangankelahiran" method="post" enctype="multipart/form-data">
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
            <label for="inputttl3" class="col-sm-3 col-form-label"><b>Tempat, Tanggal Lahir</b></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputttl3" value="<?= (isset($_SESSION["tempat"])) ? $_SESSION["tempat"] : "Ngawi" ?>" name="tempat" required>
            </div>
            <div class="col-sm-5">
                <input type="date" class="form-control" name="ttl" value="<?= (isset($_SESSION["ttl"])) ? $_SESSION["ttl"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Anak ke </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="anakke" value="<?= (isset($_SESSION["anakke"])) ? $_SESSION["anakke"] : "" ?>" required>
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
                    <input class="form-check-input" type="radio" name="kelamin" id="kelamin2" value="Perempuan" <?= (isset($_SESSION['kelamin'])) ? (($_SESSION['kelamin'] == "Perempuan") ? "checked" : "") : " "; ?>>
                    <label class="form-check-label" for="kelamin2">
                        Perempuan
                    </label>
                </div>
            </div>
        </fieldset>
        <div class="row mb-3">
            <label for="alamat" class="col-sm-3 col-form-label"><b>Alamat</b></label>
            <div class="col-sm-1">
                <label for="rt">RT</label>
            </div>
            <div class="col-sm-2">
                <input type="number" id="rt" placeholder="001" value="<?= (isset($_SESSION["rt"])) ? $_SESSION["rt"] : "" ?>" name="rt" required>
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
            <label for="ibu" class="col-sm-3 col-form-label">Ibu</label>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Nama </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputNama3" name="namaibu" value="<?= (isset($_SESSION["namaibu"])) ? $_SESSION["namaibu"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputttl3" class="col-sm-3 col-form-label"><b>Tempat, Tanggal Lahir</b></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputttl3" name="tempatibu" value="<?= (isset($_SESSION["tempatibu"])) ? $_SESSION["tempatibu"] : "" ?>">
            </div>
            <div class="col-sm-5">
                <input type="date" class="form-control" name="ttlibu" value="<?= (isset($_SESSION["ttlibu"])) ? $_SESSION["ttlibu"] : "" ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Bangsa/Agama </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="bangsaagamaibu" value="<?= (isset($_SESSION["bangsaagamaibu"])) ? $_SESSION["bangsaagamaibu"] : "Indonesia/Islam" ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Pekerjaan</b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="pekerjaanibu" value="<?= (isset($_SESSION["pekerjaanibu"])) ? $_SESSION["pekerjaanibu"] : "" ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Alamat</b></label>
            <div class="col-sm-9">
                <textarea type="text" class="form-control" name="alamatibu"><?= (isset($_SESSION["alamatibu"])) ? $_SESSION["alamatibu"] : "" ?></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="ayah" class="col-sm-3 col-form-label">Ayah</label>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Nama </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputNama3" name="namaayah" value="<?= (isset($_SESSION["namaayah"])) ? $_SESSION["namaayah"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputttl3" class="col-sm-3 col-form-label"><b>Tempat, Tanggal Lahir</b></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputttl3" name="tempatayah" value="<?= (isset($_SESSION["tempatayah"])) ? $_SESSION["tempatayah"] : "" ?>">
            </div>
            <div class="col-sm-5">
                <input type="date" class="form-control" name="ttlayah" value="<?= (isset($_SESSION["ttlayah"])) ? $_SESSION["ttlayah"] : "" ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Bangsa/Agama </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="bangsaagamaayah" value="<?= (isset($_SESSION["bangsaagamaayah"])) ? $_SESSION["bangsaagamaayah"] : "Indonesia/Islam" ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Pekerjaan</b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="pekerjaanayah" value="<?= (isset($_SESSION["pekerjaanayah"])) ? $_SESSION["pekerjaanayah"] : "" ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Alamat</b></label>
            <div class="col-sm-9">
                <textarea type="text" class="form-control" name="alamatayah"><?= (isset($_SESSION["alamatayah"])) ? $_SESSION["alamatayah"] : "" ?></textarea>
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