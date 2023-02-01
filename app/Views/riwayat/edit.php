<?= $this->extend('layout/main'); ?>
<?= $this->Section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 id="judul">Edit Data</h3>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <form action="/riwayat/update/<?= $riwayat['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" id="" value="<?= $riwayat['id']; ?>">
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Pembuat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ' '; ?>" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $riwayat['nama']; ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="namasurat" class="col-sm-2 col-form-label">Nama Surat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('namasurat')) ? 'is-invalid' : ' '; ?>" id="namasurat" name="namasurat" value="<?= (old('namasurat')) ? old('namasurat') : $riwayat['namasurat']; ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('namasurat'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nourut" class="col-sm-2 col-form-label">Nomor Urut</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nourut')) ? 'is-invalid' : ' '; ?>" id="nourut" name="nourut" value="<?= (old('nourut')) ? old('nourut') : $riwayat['nourut']; ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('nourut'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-2">
                        <a href="/riwayat" class="btn btn-danger">
                            < Kembali</a>
                    </div>
                    <div class="col-sm-9">

                    </div>
                    <div class="col-sm-1">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </div>

            </form>
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