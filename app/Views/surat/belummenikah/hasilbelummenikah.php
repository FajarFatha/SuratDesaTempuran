<?= $this->extend('layout/main'); ?>
<?= $this->Section('konten'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <br>
            <br>
            <br>
            <br>
            <center>
                <h1>Surat Berhasil Dibuat dan Didownload Silahkan Cek menu download pada browser anda</h1>
            </center>
            <br>
            <br>
            <div class="d-grid gap-2">
                <a href="/pages" class="btn btn-primary" type="button">Kembali ke Halaman awal</a>
            </div>
        </div>
    </div>
</div>
<div class="ratio" style="--bs-aspect-ratio: 50%;">
    <iframe src='/hasil/hasil_belummenikah.docx' width='100%' height='650px' frameborder='0'></iframe>
</div>
<!-- <script>
    window.location.href = "/pages";
</script> -->
<?= $this->endSection('konten'); ?>