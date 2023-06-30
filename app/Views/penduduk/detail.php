<?= $this->extend('layout/main'); ?>
<?= $this->Section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 id="judul">Detail Penduduk</h3>
        </div>
    </div>
    <a href="/penduduk" class="btn btn-danger">Kembali</a>
    <br>
    <br>
    <div class="card mb-3">
        <div class="card-body">
            <h3 class="card-title"><?= $penduduk['nik']; ?></h3>
            <h3 class="card-title"><?= $penduduk['nama']; ?></h3>
            <br>
            <p class="card-text"><b> Tempat, Tanggal Lahir: </b><?= $penduduk['tempatlahir'] . "," . $penduduk['tanggallahir']; ?></p>
            <p class="card-text"><b> Jenis Kelamin: </b><?= $penduduk['kelamin']; ?></p>
            <p class="card-text"><b> Golongan Darah: </b><?= $penduduk['darah']; ?></p>
            <p class="card-text"><b> Alamat: </b><?= $penduduk['alamat']; ?></p>
            <p class="card-text"><b> RT: </b><?= $penduduk['rt']; ?><b> RW: </b><?= $penduduk['rw']; ?></p>
            <p class="card-text"><b> Desa: </b><?= $penduduk['desa']; ?></p>
            <p class="card-text"><b> Kecamatan: </b><?= $penduduk['kecamatan']; ?></p>
            <p class="card-text"><b> Agama: </b><?= $penduduk['agama']; ?></p>
            <p class="card-text"><b> Status Perkawinan: </b><?= $penduduk['status']; ?></p>
            <p class="card-text"><b> Pekerjaan: </b><?= $penduduk['pekerjaan']; ?></p>
            <p class="card-text"><b> Kewarganegaraan: </b><?= $penduduk['kewarganegaraan']; ?></p>
        </div>
    </div>
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
<br>
<br>
<br>
<br>
<?= $this->endSection('konten'); ?>