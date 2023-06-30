<?php

use function PHPUnit\Framework\isNull;
?>
<?= $this->extend('layout/main'); ?>
<?= $this->Section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 id="judul">Edit Data Penduduk</h3>
        </div>
    </div>

    <form action="/pendudukupdate/<?= $penduduk['id']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>NIK </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ' '; ?>" id="nik" name="id" value="<?= (old('nik')) ? old('nik') : $penduduk['nik']; ?>" required>
                <div class="invalid-feedback">
                    <?= $validation->getError('nik'); ?>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Nama </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $penduduk['nama']; ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputttl3" class="col-sm-3 col-form-label"><b>Tempat, Tanggal Lahir</b></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputttl3" name="tempatlahir" value="<?= (old('tempatlahir')) ? old('tempatlahir') : $penduduk['tempatlahir']; ?>">
            </div>
            <div class="col-sm-5">
                <input type="date" class="form-control" name="tanggallahir">
            </div>
        </div>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-3 pt-0"><b>Jenis Kelamin</b></legend>
            <div class="col-sm-9">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kelamin" id="kelamin1" value="Laki-laki" <?= (($penduduk['kelamin'] == "Laki-laki") ? "checked" : ""); ?>>
                    <label class="form-check-label" for="kelamin1">
                        Laki-Laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kelamin" id="kelamin2" value="Perempuan" <?= (($penduduk['kelamin'] == "Perempuan") ? "checked" : ""); ?>>
                    <label class="form-check-label" for="kelamin2">
                        Perempuan
                    </label>
                </div>
            </div>
        </fieldset>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Golongan Darah </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="darah" name="darah" value="<?= (old('darah')) ? old('darah') : $penduduk['darah']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Alamat </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= (old('alamat')) ? old('alamat') : $penduduk['alamat']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="alamat" class="col-sm-3 col-form-label"><b>RT/RW</b></label>
            <div class="col-sm-1">
                <label for="rt">RT : </label>
            </div>
            <div class="col-sm-2">
                <input type="number" id="rt" name="rt" placeholder="001" value="<?= (old('rt')) ? old('rt') : $penduduk['rt']; ?>" required>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-1">
                <label for="rw">RW : </label>
            </div>
            <div class="col-sm-2">
                <input type="number" id="rw" name="rw" placeholder="001" value="<?= (old('rw')) ? old('rw') : $penduduk['rw']; ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Desa </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="desa" name="desa" value="<?= (old('desa')) ? old('desa') : $penduduk['desa']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Kecamatan</b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= (old('kecamatan')) ? old('kecamatan') : $penduduk['kecamatan']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="agama" class="col-sm-3 col-form-label"><b>Agama</b></label>
            <div class="col-sm-9">
                <select class="form-select" aria-label="Default select example" id="agama" name="agama">
                    <option <?= (($penduduk['agama'] == "Islam") ? "selected" : ""); ?> value="Islam">Islam</option>
                    <option <?= (($penduduk['agama'] == "Kristen") ? "selected" : ""); ?> value="Kristen">Kristen</option>
                    <option <?= (($penduduk['agama'] == "Katolik") ? "selected" : ""); ?> value="Katolik">Katolik</option>
                    <option <?= (($penduduk['agama'] == "Hindu") ? "selected" : ""); ?> value="Hindu">Hindu</option>
                    <option <?= (($penduduk['agama'] == "Budha") ? "selected" : ""); ?> value="Budha">Budha</option>
                    <option <?= (($penduduk['agama'] == "Konghuchu") ? "selected" : ""); ?> value="Konghucu">Konghucu</option>
                </select>
            </div>
        </div>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-3 pt-0"><b>Status Perkawinan</b></legend>
            <div class="col-sm-9">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status1" value="Kawin" <?= (($penduduk['status'] == "Kawin") ? "checked" : ""); ?>>
                    <label class="form-check-label" for="status1">
                        Kawin
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status2" value="Belum Kawin" <?= (($penduduk['status'] == "Belum Kawin") ? "checked" : ""); ?>>
                    <label class="form-check-label" for="status2">
                        Belum Kawin
                    </label>
                </div>
            </div>
        </fieldset>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Pekerjaan</b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= (old('pekerjaan')) ? old('pekerjaan') : $penduduk['pekerjaan']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Kewarganegaraan</b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" value="<?= (old('kewarganegaraan')) ? old('kewarganegaraan') : $penduduk['kewarganegaraan']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-11">
                <a href="/penduduk" class="btn btn-danger">Kembali</a>
            </div>
            <div class="col-sm-1">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
<br>
<br>
<br>
<?= $this->endSection('konten'); ?>