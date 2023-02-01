<?= $this->extend('layout/main'); ?>
<?= $this->Section('konten'); ?>
<div class="container">
    <br>
    <br>
    <br>
    <br>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <br>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col">
            <h2 id="judul">Yang Bertanda Tangan</h2>
        </div>
    </div>
    <
        <div class="card mb-3" style="max-width: 340px;">
            <div class="row g-0">
                <div class="col-md-12">
                    <div class="card-body">
                        <h4 class="card-title"><?= $tertanda['nama']; ?></h4>
                        <p class="card-text"><b>Jabatan : </b> <?= $tertanda['jabatan']; ?></p>
                        <p class="card-text"><b>Alamat : </b> <?= $tertanda['alamat']; ?></p>

                        <a href="/editttd/<?= $tertanda['id']; ?>" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </center>
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
<?= $this->endSection('konten'); ?>