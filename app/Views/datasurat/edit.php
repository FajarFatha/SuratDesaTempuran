<?= $this->extend('layout/main'); ?>
<?= $this->Section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 id="judul">Edit Data <?= $surat['surat']; ?></h3>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <form action="/surat/update/<?= $surat['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" id="" value="<?= $surat['slug']; ?>">
                <input type="hidden" name="title" id="" value="<?= $surat['title']; ?>">

                <div class="row mb-3">
                    <label for="surat" class="col-sm-2 col-form-label">Nama Surat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('surat')) ? 'is-invalid' : ' '; ?>" id="surat" name="surat" value="<?= (old('surat')) ? old('surat') : $surat['surat']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('surat'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="klasifikasi" class="col-sm-2 col-form-label">Klasifikasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('klasifikasi')) ? 'is-invalid' : ' '; ?>" id="klasifikasi" name="klasifikasi" value="<?= (old('klasifikasi')) ? old('klasifikasi') : $surat['klasifikasi']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('klasifikasi'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nourut" class="col-sm-2 col-form-label">Nomor Urut</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nourut')) ? 'is-invalid' : ' '; ?>" id="nourut" name="nourut" value="<?= (old('nourut')) ? old('nourut') : $surat['nourut']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nourut'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-2">
                        <a href="/surat" class="btn btn-danger">
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