<?= $this->extend('layout/main'); ?>
<?= $this->Section('konten'); ?>
<style>
    .container1 {
        align-self: center;
    }

    .container2 {
        background-color: white;
        padding: 20px;
        width: 500px;
    }
</style>
<div class="position-absolute top-50 start-50 translate-middle">
    <div class="container2" style="background-color: #435d7d; margin-top: 30px;">
        <h2 style="color:white; text-align:center">Login</h2>
    </div>
    <div class="container2">
        <?php if (session()->getFlashdata('error')) { ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php } ?>
        <form action="/ceklogin" method="POST">
            <div class="mb-3">
                <label for="inputusername" class="form-label">Username</label>
                <input type="text" class="form-control" id="inputusername" name="username" required>
            </div>
            <div class="mb-3">
                <label for="inputpassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputpassword" name="password" required>
            </div>
            <div style="text-align: center;">
                <button type="submit" class="btn btn-primary" value="LOGIN" name="login">login</button>
            </div>
            <!-- <div style="text-align: center; margin-top:20px">
                <p>Belum Punya Akun? <a href="/daftar">Daftar</a></p>
            </div> -->
        </form>
    </div>
</div>
<?= $this->endSection('konten'); ?>