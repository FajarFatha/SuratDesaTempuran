<?= $this->extend('layout/main'); ?>
<?= $this->Section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 id="judul">Riwayat Pembuatan Surat</h3>
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
                        <th scope="col">Nama</th>
                        <th scope="col">Surat yang dibuat</th>
                        <th scope="col">Nomor Urut</th>
                        <th scope="col">Dibuat Pada</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($riwayat as $r) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $r['nama']; ?></td>
                            <td><?= $r['namasurat']; ?></td>
                            <td><?= $r['nourut']; ?></td>
                            <td><?= $r['created_at']; ?></td>
                            <td>
                                <a href="/riwayat/edit/<?= $r['id']; ?>" class="btn btn-warning">Edit</a>
                                <form action="/riwayat/delete/<?= $r['id']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin akan menghapus data ini?')">Hapus</button>
                                </form>
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