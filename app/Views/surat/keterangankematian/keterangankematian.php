<?= $this->extend('layout/main'); ?>
<?= $this->Section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 id="judul">Surat Keterangan Kematian</h3>
        </div>
    </div>
    <form action="/isiketerangankematian" method="post" enctype="multipart/form-data">
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
            <label for="inputttl3" class="col-sm-3 col-form-label"><b>Tempat, Tanggal Lahir/umur</b></label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="inputttl3" value="<?= (isset($_SESSION["tempat"])) ? $_SESSION["tempat"] : "Ngawi" ?>" name="tempat" required>
            </div>
            <div class="col-sm-3">
                <input type="date" class="form-control" name="ttl" value="<?= (isset($_SESSION["ttl"])) ? $_SESSION["ttl"] : "" ?>">
            </div>
            <div class="col-sm-3">
                <input type="number" class="form-control" name="umur" value="<?= (isset($_SESSION["umur"])) ? $_SESSION["umur"] : "" ?>" placeholder="umur">
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
            <label class="col-sm-3 col-form-label"><b>Kewarganegaraan </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= (isset($_SESSION["kwn"])) ? $_SESSION["kwn"] : "Indonesia" ?>" name="kwn" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="agama" class="col-sm-3 col-form-label"><b>Agama</b></label>
            <div class="col-sm-9">
                <select class="form-select" aria-label="Default select example" id="agama" name="agama">
                    <option <?= (isset($_SESSION['agama'])) ? (($_SESSION['agama'] == "Islam") ? "selected" : "") : "";  ?> value="Islam">Islam</option>
                    <option <?= (isset($_SESSION['agama'])) ? (($_SESSION['agama'] == "Kristen") ? "selected" : "") : "";  ?> value="Kristen">Kristen</option>
                    <option <?= (isset($_SESSION['agama'])) ? (($_SESSION['agama'] == "Katolik") ? "selected" : "") : "";  ?> value="Katolik">Katolik</option>
                    <option <?= (isset($_SESSION['agama'])) ? (($_SESSION['agama'] == "Hindu") ? "selected" : "") : "";  ?> value="Hindu">Hindu</option>
                    <option <?= (isset($_SESSION['agama'])) ? (($_SESSION['agama'] == "Budha") ? "selected" : "") : "";  ?> value="Budha">Budha</option>
                    <option <?= (isset($_SESSION['agama'])) ? (($_SESSION['agama'] == "Konghucu") ? "selected" : "") : "";  ?> value="Konghucu">Konghucu</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="alamat" class="col-sm-3 col-form-label"><b>Tempat tinggal terakhir</b></label>
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
            <label class="col-sm-3 col-form-label">Telah meninggal dunia pada</label>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Tanggal </b></label>
            <div class="col-sm-9">
                <input type="date" class="form-control" name="tglkematian" value="<?= (isset($_SESSION["tglkematian"])) ? $_SESSION["tglkematian"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Meninggal dunia di </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="tempatkematian" value="<?= (isset($_SESSION["tempatkematian"])) ? $_SESSION["tempatkematian"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Disebabkan karena </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="sebabkematian" value="<?= (isset($_SESSION["sebabkematian"])) ? $_SESSION["sebabkematian"] : "" ?>" required>
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