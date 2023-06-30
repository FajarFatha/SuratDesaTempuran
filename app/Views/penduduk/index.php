<?= $this->extend('layout/main'); ?>
<?= $this->Section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 id="judul">Data Penduduk</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="/tambahpenduduk"><button class="btn btn-primary">Tambah Data Penduduk</button></a>
        </div>
    </div>
    <br>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col">
            <table class="table" id="datapenduduk">
                <thead>
                    <tr>
                        <!-- <th scope="col">#</th> -->
                        <th scope="col">NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($penduduk as $r) : ?>
                        <tr>
                            <!-- <th scope="row"><?= $i++; ?></th> -->
                            <td><?= $r['nik']; ?></td>
                            <td><?= $r['nama']; ?></td>
                            <td><?= $r['tempatlahir']; ?></td>
                            <td><?= $r['tanggallahir']; ?></td>
                            <td><?= $r['kelamin']; ?></td>
                            <td><?= $r['alamat']; ?></td>
                            <td>
                                <a href="/penduduk/<?= $r['id']; ?>" class="btn btn-success">Detail</a>
                                <a href="/pendudukedit/<?= $r['id']; ?>" class="btn btn-warning">Edit</a>
                                <form action="/pendudukdelete/<?= $r['id']; ?>" method="post" class="d-inline">
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
                    $('#datapenduduk').DataTable();
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