<?php

use App\Models\PendudukModel;

$this->PendudukModel = new PendudukModel();

use function PHPUnit\Framework\isNull;
?>
<?= $this->extend('layout/main'); ?>
<?= $this->Section('konten'); ?>
<script>
    // Mendapatkan semua cookie
    var cookies = document.cookie;
    // Menampilkan semua cookie
    console.log(cookies);
    // Mendapatkan nilai cookie berdasarkan namanya
    function getCookieValue(cookieName) {
        var name = cookieName + "=";
        var decodedCookies = decodeURIComponent(cookies);
        var cookieArray = decodedCookies.split(';');
        for (var i = 0; i < cookieArray.length; i++) {
            var cookie = cookieArray[i].trim();
            if (cookie.indexOf(name) === 0) {
                return cookie.substring(name.length, cookie.length);
            }
        }
        return "";
    }

    // Contoh penggunaan

    function isidata() {
        var nama = document.querySelector('#pilihannama').value;
        document.cookie = "nama=" + nama;
        <?php
        if (isset($_COOKIE['nama'])) {
            $nama = $_COOKIE['nama'];
            $datapenduduk = $this->PendudukModel->getPendudukName($nama);
            $test = $datapenduduk['nik'];
            $test2 = $datapenduduk['nama'];
        } else {
            $test = 'test';
            $test2 = 'test2';
        }
        echo "console.log(document.cookie);";
        echo "var nik = '$test';";
        echo "console.log(nik);";
        echo "var nama = '$test2';";
        echo "console.log(nama);";
        // echo "console.log(document.cookie);";
        // setcookie("id", $datapenduduk['nama']);
        // setcookie("tempatlahir", $datapenduduk['tempatlahir']);
        // $datatanggallahir = $datapenduduk['tanggallahir'];
        // $datatanggallahir = explode(" ", $datatanggallahir);
        // $monthList = array(
        //     'Januari' => '01',
        //     'Februari' => '02',
        //     'Maret' => '03',
        //     'April' => '04',
        //     'Mei' => '05',
        //     'Juni' => '06',
        //     'Juli' => '07',
        //     'Agustus' => '08',
        //     'September' => '09',
        //     'Oktober' => '10',
        //     'November' => '11',
        //     'Desember' => '12',
        // );
        // $datatanggallahirY = $datatanggallahir[2];
        // $datatanggallahirM = $datatanggallahir[1];
        // $datatanggallahirD = $datatanggallahir[0];
        // $datatanggallahir = "$datatanggallahirY-$monthList[$datatanggallahirM]-$datatanggallahirD";
        // setcookie("tanggallahir", $datatanggallahir);
        // setcookie("kelamin", $datapenduduk['kelamin']);
        // setcookie("darah", $datapenduduk['darah']);
        // setcookie("alamat", $datapenduduk['alamat']);
        // setcookie("rt", $datapenduduk['rt']);
        // setcookie("rw", $datapenduduk['rw']);
        // setcookie("desa", $datapenduduk['desa']);
        // setcookie("kecamatan", $datapenduduk['kecamatan']);
        // setcookie("agama", $datapenduduk['agama']);
        // setcookie("status", $datapenduduk['status']);
        // setcookie("pekerjaan", $datapenduduk['pekerjaan']);
        // setcookie("kewarganegaraan", $datapenduduk['kewarganegaraan']);
        ?>





        // // Menggunakan fungsi getCookieValue untuk mendapatkan nilai cookie
        // var tempatlahirid = document.querySelector('#tempatlahir')
        // var tempatlahir = getCookieValue("tempatlahir");
        // tempatlahirid.value = tempatlahir

        // var tanggallahirid = document.querySelector('#tanggallahir')
        // var tanggallahir = getCookieValue("tanggallahir");
        // tanggallahirid.value = tanggallahir

        // var kelamin = getCookieValue("kelamin");
        // if (kelamin == "Laki-laki") {
        //     var kelaminid = document.querySelector('#kelaminL')
        // } else {
        //     var kelaminid = document.querySelector('#kelaminP')
        // }
        // kelaminid.setAttribute("checked", "");

        // var darahid = document.querySelector('#darah')
        // var darah = getCookieValue("darah");
        // darahid.value = darah

        // var alamatid = document.querySelector('#alamat')
        // var alamat = getCookieValue("alamat");
        // alamatid.value = alamat

        // var rtid = document.querySelector('#rt')
        // var rt = getCookieValue("rt");
        // rtid.value = rt

        // var rwid = document.querySelector('#rw')
        // var rw = getCookieValue("rw");
        // rwid.value = rw

        // var pekerjaanid = document.querySelector('#pekerjaan')
        // var pekerjaan = getCookieValue("pekerjaan");
        // pekerjaanid.value = pekerjaan

        // var desaid = document.querySelector('#desa')
        // var desa = getCookieValue("desa");
        // desaid.value = desa

        // var kecamatanid = document.querySelector('#kecamatan')
        // var kecamatan = getCookieValue("kecamatan");
        // kecamatanid.value = kecamatan

        // var agamaid = document.querySelector('#agama')
        // var agama = getCookieValue("agama");
        // agamaid.value = agama

        // var statusid = document.querySelector('#status')
        // var status = getCookieValue("status");
        // statusid.value = status

        // var pekerjaanid = document.querySelector('#pekerjaan')
        // var pekerjaan = getCookieValue("pekerjaan");
        // pekerjaanid.value = pekerjaan

        // var kewarganegaraanid = document.querySelector('#kewarganegaraan')
        // var kewarganegaraan = getCookieValue("kewarganegaraan");
        // kewarganegaraanid.value = kewarganegaraan
    }
</script>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 id="judul">Surat Keterangan Identitas</h3>
        </div>
    </div>

    <form action="/isiidentitas" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= $surat['id']; ?>">
        <input type="hidden" name="surat" value="<?= $surat['surat']; ?>">
        <input type="hidden" name="title" value="<?= $surat['title']; ?>">
        <input type="hidden" name="slug" value="<?= $surat['slug']; ?>">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Klasifikasi Surat </b></label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="klasifikasi" name="klasifikasi" value="<?= $surat['klasifikasi']; ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Nomor Urut Surat </b></label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="nourut" name="nourut" value="<?= (isset($_SESSION["nourut"])) ? $_SESSION["nourut"] : $surat['nourut']; ?>" required>
            </div>
        </div>
        <!-- <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><b>Nama </b></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputNama3" name="nama" value="<?= (isset($_SESSION["nama"])) ? $_SESSION["nama"] : "" ?>">
            </div>
        </div> -->
        <div class="row mb-3">
            <label for="nama" class="col-sm-3 col-form-label"><b>Nama</b></label>
            <div class="col-sm-9">
                <select class="form-select" aria-label="Default select example" id="pilihannama" name="nama" onchange="isidata()">
                    <option selected disabled>Pilih Nama</option>
                    <?php foreach ($penduduk as $r) : ?>
                        <option value="<?= $r['nama']; ?>"><?= $r['nama']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputttl3" class="col-sm-3 col-form-label"><b>Tempat, Tanggal Lahir</b></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="tempatlahir" value="<?= (isset($_SESSION["tempat"])) ? $_SESSION["tempat"] : "Ngawi" ?>" name="tempat">
            </div>
            <div class="col-sm-5">
                <input type="date" class="form-control" id="tanggallahir" name="ttl" value="<?= (isset($_SESSION["ttl"])) ? $_SESSION["ttl"] : "" ?>">
            </div>
        </div>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-3 pt-0"><b>Jenis Kelamin</b></legend>
            <div class="col-sm-9">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kelamin" id="kelaminL" value="Laki-laki" <?= (isset($_SESSION['kelamin'])) ? (($_SESSION['kelamin'] == "Laki-laki") ? "checked" : "") : "checked"; ?>>
                    <label class="form-check-label" for="kelamin1">
                        Laki-Laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kelamin" id="kelaminP" value="Perempuan" <?= (isset($_SESSION['kelamin'])) ? (($_SESSION['kelamin'] == "Perempuan") ? "checked" : "") : "";  ?>>
                    <label class="form-check-label" for="kelamin2">
                        Perempuan
                    </label>
                </div>
            </div>
        </fieldset>
        <div class="row mb-3">
            <label for="agama" class="col-sm-3 col-form-label"><b>Agama</b></label>
            <div class="col-sm-9">
                <select class="form-select" aria-label="Default select example" id="agama" name="agama">
                    <option <?= (isset($_SESSION['agama'])) ? (($_SESSION['agama'] == "Islam") ? "selected" : "") : "";  ?> value="Islam">Islam</option>
                    <option <?= (isset($_SESSION['agama'])) ? (($_SESSION['agama'] == "Kristen") ? "selected" : "") : "";  ?> value="Kristen">Kristen</option>
                    <option <?= (isset($_SESSION['agama'])) ? (($_SESSION['agama'] == "Katolik") ? "selected" : "") : "";  ?> value="Katolik">Katolik</option>
                    <option <?= (isset($_SESSION['agama'])) ? (($_SESSION['agama'] == "Hindu") ? "selected" : "") : "";  ?> value="Hindu">Hindu</option>
                    <option <?= (isset($_SESSION['agama'])) ? (($_SESSION['agama'] == "Budha") ? "selected" : "") : "";  ?> value="Budha">Budha</option>
                    <option <?= (isset($_SESSION['agama'])) ? (($_SESSION['agama'] == "Konghuchu") ? "selected" : "") : "";  ?> value="Konghucu">Konghucu</option>
                </select>
            </div>
        </div>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-3 pt-0"><b>Status Perkawinan</b></legend>
            <div class="col-sm-9">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status1" value="Kawin" <?= (isset($_SESSION['status'])) ? (($_SESSION['status'] == "Kawin") ? "checked" : "") : "checked";  ?>>
                    <label class="form-check-label" for="status1">
                        Kawin
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status2" value="Belum Kawin" <?= (isset($_SESSION['status'])) ? (($_SESSION['status'] == "Belum Kawin") ? "checked" : "") : "";  ?>>
                    <label class="form-check-label" for="status2">
                        Belum Kawin
                    </label>
                </div>
            </div>
        </fieldset>
        <div class="row mb-3">
            <label for="pekerjaan" class="col-sm-3 col-form-label"><b>Pekerjaan</b> </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= (isset($_SESSION["pekerjaan"])) ? $_SESSION["pekerjaan"] : "" ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="alamat" class="col-sm-3 col-form-label"><b>Alamat</b></label>
            <div class="col-sm-1">
                <label for="rt">RT : </label>
            </div>
            <div class="col-sm-2">
                <input type="number" id="rt" name="rt" placeholder="001" value="<?= (isset($_SESSION["rt"])) ? $_SESSION["rt"] : "" ?>" required>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-1">
                <label for="rw">RW : </label>
            </div>
            <div class="col-sm-2">
                <input type="number" id="rw" name="rw" placeholder="001" value="<?= (isset($_SESSION["rw"])) ? $_SESSION["rw"] : "" ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="keterangan" class="col-sm-3 col-form-label"><b>Keterangan</b></label>
            <div class="col-sm-9">
                <textarea type="text" class="form-control" id="keterangan" style="height: 100px;" name="keterangan"><?= (isset($_SESSION["keterangan"])) ? $_SESSION["keterangan"] : "Orang tersebut benar-benar penduduk Dusun ....., Desa Tempuran, Kecamatan Paron, Kab. Ngawi. Bahwa nama ..." ?> </textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Yang Bertanda Tangan </label>
        </div>
        <div class="row mb-3">
            <label for="ttdnama" class="col-sm-3 col-form-label"><b>Nama</b> </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="ttdnama" name="ttdnama" value="<?= (isset($_SESSION["ttdnama"])) ? $_SESSION["ttdnama"] : $tertanda['nama']; ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="ttdjabatan" class="col-sm-3 col-form-label"><b>Jabatan</b> </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="ttdjabatan" name="ttdjabatan" value="<?= (isset($_SESSION["ttdjabatan"])) ? $_SESSION["ttdjabatan"] : $tertanda['jabatan']; ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-11">
                <a href="/pages" class="btn btn-danger">Kembali</a>
            </div>
            <div class="col-sm-1">
                <button type="submit" class="btn btn-primary">Lanjut</button>
            </div>
        </div>
    </form>

</div>
<br>
<br>
<br>

<?= $this->endSection('konten'); ?>