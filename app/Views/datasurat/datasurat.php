<?= $this->extend('layout/main'); ?>
<?= $this->Section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 id="judul">Daftar Surat</h3>
        </div>
    </div>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col">
            <table class="table" id="datasurat">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Surat</th>
                        <th scope="col">Klasifikasi</th>
                        <th scope="col">Nomor Urut</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($surat as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $s['surat']; ?></td>
                            <td><?= $s['klasifikasi']; ?></td>
                            <td><?= $s['nourut']; ?></td>
                            <td>
                                <a href="/surat/edit/<?= $s['slug']; ?>" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <script>
                $(document).ready(function() {
                    $('#datasurat').DataTable();
                });
            </script>
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