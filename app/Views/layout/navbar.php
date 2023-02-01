<!-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link <?= $active; ?>" href="/pages">Home</a>
                <a class="nav-link <?= $active1; ?>" href="/pages-about">About</a>
            </div>
        </div>
    </div>
</nav> -->

<nav class="navbar fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="/img/ngawi.svg" alt="Bootstrap" width="50">
        </a>
        <a class="navbar-brand" href="#">
            <div>
                <p>Aplikasi Pembuatan Surat-Surat Desa</p>
                <p style="margin-top: -20px;">Desa Tempuran, Kecamatan Paron, Kabupaten Ngawi</p>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link <?= $active; ?>" href="/pages">Buat Surat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $active1; ?>" href="/ttd">Yang Bertanda Tangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $active2; ?>" href="/surat">Data Surat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $active2; ?>" href="/riwayat">Riwayat Pembuatan</a>
                    </li>
                    <br>
                    <br>
                    <li class="nav-item">
                        <a class="btn btn-danger" href="/logout" onclick="return confirm('apakah anda yakin akan logout dari aplikasi ini?')">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>