<?= $this->extend('layout/main'); ?>
<?= $this->Section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 id="judul">Pilih Jenis Surat</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10">
            <form action="/pages" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Jenis Surat" aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword">
                    <button class="btn btn-outline-secondary" type="submit" name="submit" id="button-addon2">Cari</button>
                </div>
            </form>
        </div>
        <div class="col-sm-2">
            <form action="/pages" method="get">
                <div class="input-group mb-3">
                    <button class="btn btn-primary" type="submit" name="tampilkanSemua" id="button-addon2">Tempilkan Semua</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row card-surat">

        <?php foreach ($surat as $s) : ?>
            <div class="col-sm-4 mb-3">
                <div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $s['title']; ?></h5>
                            <p class="card-text"><?= $s['surat']; ?></p>
                            <form action="/<?= $s['slug']; ?>" method="post">
                                <input type="hidden" name="slug" value="<?= $s['slug']; ?>">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Buat Surat</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<script>
    $(document).ready(function() {
        $('#surat').DataTable({
            "lengthMenu": [
                [5, 10, 50, -1],
                [5, 10, 50, "All"]
            ]
        });
    });
</script>
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
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?= $this->endSection('konten'); ?>