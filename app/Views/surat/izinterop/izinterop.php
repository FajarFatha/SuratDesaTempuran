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
                <input type="number" class="form-control" id="nourut" name="nourut" value="<?= $surat['nourut']; ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Nama </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputNama3" name="nama" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Umur </b></label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="inputNama3" name="umur">
            </div>
        </div>
        <div class="row mb-3">
            <label for="pekerjaan" class="col-sm-3 col-form-label"><b>Pekerjaan</b> </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
            </div>
        </div>
        <div class="row mb-3">
            <label for="alamat" class="col-sm-3 col-form-label"><b>Alamat rumah</b></label>
            <div class="col-sm-1">
                <label for="rt">RT</label>
            </div>
            <div class="col-sm-2">
                <input type="number" id="rt" placeholder="001" name="rt" required>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-1">
                <label for="rw">RW </label>
            </div>
            <div class="col-sm-2">
                <input type="number" id="rw" placeholder="001" name="rw" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="macamkeramaian" class="col-sm-3 col-form-label"><b>Macam keramaian</b> </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="macamkeramaian" name="keramaian">
            </div>
        </div>
        <div class="row mb-3">
            <label for="Keperluan" class="col-sm-3 col-form-label"><b>Keperluan</b> </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="Keperluan" name="keperluan">
            </div>
        </div>
        <div class="row mb-3">
            <label for="Mulai" class="col-sm-3 col-form-label"><b>Mulai</b> </label>
            <div class="col-sm-9">
                <input type="date" class="form-control" id="Mulai" name="mulai" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="Sampai" class="col-sm-3 col-form-label"><b>Sampai</b> </label>
            <div class="col-sm-9">
                <input type="date" class="form-control" id="Sampai" name="selesai" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="Tempat" class="col-sm-3 col-form-label"><b>Tempat</b> </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="Tempat" value="Rumah Sendiri" name="tempat">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Yang Bertanda Tangan </label>
        </div>
        <div class="row mb-3">
            <label for="ttdnama" class="col-sm-3 col-form-label"><b>Nama</b> </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="ttdnama" name="ttdnama" value="<?= $tertanda['nama']; ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="ttdjabatan" class="col-sm-3 col-form-label"><b>Jabatan</b> </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="ttdjabatan" name="ttdjabatan" value="<?= $tertanda['jabatan']; ?>" required>
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