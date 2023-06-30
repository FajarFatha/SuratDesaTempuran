<?php

namespace App\Controllers;

use App\Models\TertandaModel;
use App\Models\SuratModel;
use App\Models\RiwayatModel;
use App\Models\PendudukModel;

// session_start();

class Surat extends BaseController
{
    protected $TertandaModel;
    protected $SuratModel;
    protected $RiwayatModel;
    protected $PendudukModel;
    public function __construct()
    {
        $this->TertandaModel = new TertandaModel();
        $this->SuratModel = new SuratModel();
        $this->RiwayatModel = new RiwayatModel();
        $this->PendudukModel = new PendudukModel();
    }
    public function identitas()
    {
        $slug = $this->request->getVar('slug');
        $data = [
            'title' => 'identitas',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda(),
            'surat' => $this->SuratModel->getSurat($slug),
            'penduduk'=> $this->PendudukModel->getPenduduk(),
        ];
        return view('surat/identitas/identitas', $data);
    }
    public function isiidentitas()
    {
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        // dd($this->request->getVar());
        $klasifikasi = $this->request->getVar('klasifikasi');
        $nourut = $this->request->getVar('nourut');
        $nama = $this->request->getVar('nama');
        $tempat = $this->request->getVar('tempat');
        $ttl = $this->request->getVar('ttl');
        $_SESSION['ttl'] = $ttl;
        $ttld = date('d', strtotime($ttl));
        $ttlm = date('m', strtotime($ttl));
        $ttly = date('Y', strtotime($ttl));
        $ttl = "$ttld $monthList[$ttlm] $ttly";
        $kelamin = $this->request->getVar('kelamin');
        $agama = $this->request->getVar('agama');
        $status = $this->request->getVar('status');
        $pekerjaan = $this->request->getVar('pekerjaan');
        $rt = $this->request->getVar('rt');
        $rw = $this->request->getVar('rw');
        if ($rw == '001' or $rw == '002') {
            $dusun = 'Tempuran';
        } else if ($rw == '003') {
            $dusun = 'Bulakan';
        } else if ($rw == '004' or $rw == '005') {
            $dusun = 'Munggur';
        } else if ($rw == '006' or $rw == '007') {
            $dusun = 'Tempurejo';
        } else if ($rw == '008' or $rw == '009') {
            $dusun = 'Melikan';
        } else if ($rw == '010' or $rw == '011') {
            $dusun = 'Bendo';
        } else if ($rw == '012' or $rw == '013') {
            $dusun = 'Jegolan';
        } else {
            $dusun = '...';
        }
        $keterangan = $this->request->getVar('keterangan');
        date_default_timezone_set('Asia/Jakarta');
        $d = date("d");
        $m = date("m");
        $y = date("Y");
        $date = "$d $monthList[$m] $y";
        $tahun = date("Y");
        $ttdnama = $this->request->getVar('ttdnama');
        $ttdjabatan = $this->request->getVar('ttdjabatan');
        if ($ttdjabatan != 'Kepala Desa Tempuran') {
            $ttdjabatan = "An. Kepala Desa Tempuran, $ttdjabatan";
        }

        $_SESSION["klasifikasi"] = $klasifikasi;
        $_SESSION["nourut"] = $nourut;
        $_SESSION["nama"] = $nama;
        $_SESSION['tempat'] = $tempat;
        $_SESSION['kelamin'] = $kelamin;
        $_SESSION['agama'] = $agama;
        $_SESSION['status'] = $status;
        $_SESSION['pekerjaan'] = $pekerjaan;
        $_SESSION['rt'] = $rt;
        $_SESSION['rw'] = $rw;
        $_SESSION['dusun'] = $dusun;
        $_SESSION['keterangan'] = $keterangan;
        $_SESSION['date'] = $date;
        $_SESSION['ttdjabatan'] = $ttdjabatan;
        $_SESSION['ttdnama'] = $ttdnama;

        require_once '../vendor/autoload.php';


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/template/identitas.docx');
        $templateProcessor->setValues(
            [
                'klasifikasi' => $klasifikasi,
                'nourut' => $nourut,
                'tahun' => $tahun,
                'nama' => $nama,
                'tempat' => $tempat,
                'ttl' => $ttl,
                'kelamin' => $kelamin,
                'agama' => $agama,
                'status' => $status,
                'pekerjaan' => $pekerjaan,
                'rt' => $rt,
                'rw' => $rw,
                'dusun' => $dusun,
                'keterangan' => $keterangan,
                'date' => $date,
                'ttdjabatan' => $ttdjabatan,
                'ttdnama' => $ttdnama,
            ]
        );

        $pathToSave = '../public/hasil/hasil_identitas.docx';
        $templateProcessor->saveAs($pathToSave);

        $nourutbaru = $nourut + 1;
        $nourutbaru = "0$nourutbaru";

        $save = $this->SuratModel->save([
            'id' => $this->request->getVar('id'),
            'surat' => $this->request->getVar('surat'),
            'slug' => $this->request->getVar('slug'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'nourut' => $nourutbaru
        ]);
        $saveRiwayat = $this->RiwayatModel->save([
            'nama' => $nama,
            'namasurat' => $this->request->getVar('surat'),
            'nourut' => $nourutbaru
        ]);
        $data = [
            'title' => 'identitas',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        if ($save) {
            return view('surat/identitas/hasilidentitas', $data);
        }
    }



    public function dispensasi()
    {
        $slug = $this->request->getVar('slug');
        $data = [
            'title' => 'dispensasi',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda(),
            'surat' => $this->SuratModel->getSurat($slug)
        ];
        return view('surat/dispensasi/dispensasi', $data);
    }
    public function isidispensasi()
    {
        // dd($this->request->getVar());
        $klasifikasi = $this->request->getVar('klasifikasi');
        $nourut = $this->request->getVar('nourut');
        $kepada = $this->request->getVar('kepada');
        $jabatan = $this->request->getVar('jabatan');
        $nama = $this->request->getVar('nama');
        $nip = $this->request->getVar('nip');
        $pekerjaan = $this->request->getVar('pekerjaan');
        $unitkerja = $this->request->getVar('unitkerja');
        $tanggal = $this->request->getVar('tanggal');
        $_SESSION["tanggal"] = $tanggal;
        date_default_timezone_set('Asia/Jakarta');
        $day = date('D', strtotime($tanggal));
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        $hari = $dayList[$day];
        $tgl = date('d', strtotime($tanggal));
        $month = date('m', strtotime($tanggal));
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        $bulan = $monthList[$month];
        $tahun2 = date('Y', strtotime($tanggal));
        $tanggal = "$tgl $bulan $tahun2";
        $d = date("d");
        $m = date("m");
        $tahun = date("Y");
        $date = "$d $monthList[$m] $tahun";
        $tempat = $this->request->getVar('tempat');
        $keperluan = $this->request->getVar('keperluan');
        $ttdnama = $this->request->getVar('ttdnama');
        $ttdjabatan = $this->request->getVar('ttdjabatan');
        if ($ttdjabatan != 'Kepala Desa Tempuran') {
            $ttdjabatan = "An. Kepala Desa Tempuran, $ttdjabatan";
        }

        $_SESSION["klasifikasi"] = $klasifikasi;
        $_SESSION["nourut"] = $nourut;
        $_SESSION["nama"] = $nama;
        $_SESSION["tahun"] = $tahun;
        $_SESSION["kepada"] = $kepada;
        $_SESSION["jabatan"] = $jabatan;
        $_SESSION["nip"] = $nip;
        $_SESSION['pekerjaan'] = $pekerjaan;
        $_SESSION["unitkerja"] = $unitkerja;
        $_SESSION["hari"] = $hari;
        $_SESSION['tempat'] = $tempat;
        $_SESSION["keperluan"] = $keperluan;
        $_SESSION['date'] = $date;
        $_SESSION['ttdjabatan'] = $ttdjabatan;
        $_SESSION['ttdnama'] = $ttdnama;

        require_once '../vendor/autoload.php';


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/template/dispensasi.docx');
        $templateProcessor->setValues(
            [
                'klasifikasi' => $klasifikasi,
                'nourut' => $nourut,
                'tahun' => $tahun,
                'kepada' => $kepada,
                'jabatan' => $jabatan,
                'nama' => $nama,
                'nip' => $nip,
                'pekerjaan' => $pekerjaan,
                'unitkerja' => $unitkerja,
                'hari' => $hari,
                'tanggal' => $tanggal,
                'tempat' => $tempat,
                'keperluan' => $keperluan,
                'date' => $date,
                'ttdjabatan' => $ttdjabatan,
                'ttdnama' => $ttdnama,
            ]
        );

        $pathToSave = '../public/hasil/hasil_dispensasi.docx';
        $templateProcessor->saveAs($pathToSave);
        $nourutbaru = $nourut + 1;
        $nourutbaru = "0$nourutbaru";

        $save = $this->SuratModel->save([
            'id' => $this->request->getVar('id'),
            'surat' => $this->request->getVar('surat'),
            'slug' => $this->request->getVar('slug'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'nourut' => $nourutbaru
        ]);

        $nourutbaru = $nourut + 1;
        $nourutbaru = "0$nourutbaru";

        $save = $this->SuratModel->save([
            'id' => $this->request->getVar('id'),
            'surat' => $this->request->getVar('surat'),
            'slug' => $this->request->getVar('slug'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'nourut' => $nourutbaru
        ]);
        $saveRiwayat = $this->RiwayatModel->save([
            'nama' => $nama,
            'namasurat' => $this->request->getVar('surat'),
            'nourut' => $nourutbaru
        ]);
        $data = [
            'title' => 'Dispensasi',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('surat/dispensasi/hasildispensasi', $data);
    }




    public function belibbm()
    {
        $slug = $this->request->getVar('slug');
        $data = [
            'title' => 'beli BBM',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda(),
            'surat' => $this->SuratModel->getSurat($slug)
        ];
        return view('surat/belibbm/belibbm', $data);
    }
    public function isibelibbm()
    {
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        $klasifikasi = $this->request->getVar('klasifikasi');
        $nourut = $this->request->getVar('nourut');
        $nama = $this->request->getVar('nama');
        $tempat = $this->request->getVar('tempat');
        $ttl = $this->request->getVar('ttl');
        $_SESSION['ttl'] = $ttl;
        $ttld = date('d', strtotime($ttl));
        $ttlm = date('m', strtotime($ttl));
        $ttly = date('Y', strtotime($ttl));
        $ttl = "$ttld $monthList[$ttlm] $ttly";
        $nik = $this->request->getVar('nik');
        $rt = $this->request->getVar('rt');
        $rw = $this->request->getVar('rw');
        if ($rw == '001' or $rw == '002') {
            $dusun = 'Tempuran';
        } else if ($rw == '003') {
            $dusun = 'Bulakan';
        } else if ($rw == '004' or $rw == '005') {
            $dusun = 'Munggur';
        } else if ($rw == '006' or $rw == '007') {
            $dusun = 'Tempurejo';
        } else if ($rw == '008' or $rw == '009') {
            $dusun = 'Melikan';
        } else if ($rw == '010' or $rw == '011') {
            $dusun = 'Bendo';
        } else if ($rw == '012' or $rw == '013') {
            $dusun = 'Jegolan';
        } else {
            $dusun = '...';
        }
        date_default_timezone_set('Asia/Jakarta');
        $d = date("d");
        $m = date("m");
        $y = date("Y");
        $date = "$d $monthList[$m] $y";
        $tahun = date("Y");
        $ttdnama = $this->request->getVar('ttdnama');
        $ttdjabatan = $this->request->getVar('ttdjabatan');
        if ($ttdjabatan != 'Kepala Desa Tempuran') {
            $ttdjabatan = "An. Kepala Desa Tempuran, $ttdjabatan";
        }

        $_SESSION['klasifikasi'] = $klasifikasi;
        $_SESSION['nourut'] = $nourut;
        $_SESSION['tahun'] = $tahun;
        $_SESSION['nama'] = $nama;
        $_SESSION['tempat'] = $tempat;
        $_SESSION['nik'] = $nik;
        $_SESSION['rt'] = $rt;
        $_SESSION['rw'] = $rw;
        $_SESSION['dusun'] = $dusun;
        $_SESSION['date'] = $date;
        $_SESSION['ttdjabatan'] = $ttdjabatan;
        $_SESSION['ttdnama'] = $ttdnama;

        require_once '../vendor/autoload.php';


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/template/belibbm.docx');
        $templateProcessor->setValues(
            [
                'klasifikasi' => $klasifikasi,
                'nourut' => $nourut,
                'tahun' => $tahun,
                'nama' => $nama,
                'tempat' => $tempat,
                'ttl' => $ttl,
                'nik' => $nik,
                'rt' => $rt,
                'rw' => $rw,
                'dusun' => $dusun,
                'date' => $date,
                'ttdjabatan' => $ttdjabatan,
                'ttdnama' => $ttdnama,
            ]
        );

        $pathToSave = '../public/hasil/hasil_belibbm.docx';
        $templateProcessor->saveAs($pathToSave);
        $nourutbaru = $nourut + 1;
        $nourutbaru = "0$nourutbaru";

        $save = $this->SuratModel->save([
            'id' => $this->request->getVar('id'),
            'surat' => $this->request->getVar('surat'),
            'slug' => $this->request->getVar('slug'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'nourut' => $nourutbaru
        ]);
        $saveRiwayat = $this->RiwayatModel->save([
            'nama' => $nama,
            'namasurat' => $this->request->getVar('surat'),
            'nourut' => $nourutbaru
        ]);

        $data = [
            'title' => 'Beli BBM',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('surat/belibbm/hasilbelibbm', $data);
    }



    public function izincuti()
    {
        $slug = $this->request->getVar('slug');
        $data = [
            'title' => 'Izin Cuti',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda(),
            'surat' => $this->SuratModel->getSurat($slug)
        ];
        return view('surat/izincuti/izincuti', $data);
    }
    public function isiizincuti()
    {
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        // dd($this->request->getVar());
        $klasifikasi = $this->request->getVar('klasifikasi');
        $nourut = $this->request->getVar('nourut');
        $nama = $this->request->getVar('nama');
        $tempat = $this->request->getVar('tempat');
        $ttl = $this->request->getVar('ttl');
        $_SESSION['ttl'] = $ttl;
        $ttld = date('d', strtotime($ttl));
        $ttlm = date('m', strtotime($ttl));
        $ttly = date('Y', strtotime($ttl));
        $ttl = "$ttld $monthList[$ttlm] $ttly";
        $kelamin = $this->request->getVar('kelamin');
        $agama = $this->request->getVar('agama');
        $pekerjaan = $this->request->getVar('pekerjaan');
        $alamatkerja = $this->request->getVar('alamatkerja');
        $rt = $this->request->getVar('rt');
        $rw = $this->request->getVar('rw');
        if ($rw == '001' or $rw == '002') {
            $dusun = 'Tempuran';
        } else if ($rw == '003') {
            $dusun = 'Bulakan';
        } else if ($rw == '004' or $rw == '005') {
            $dusun = 'Munggur';
        } else if ($rw == '006' or $rw == '007') {
            $dusun = 'Tempurejo';
        } else if ($rw == '008' or $rw == '009') {
            $dusun = 'Melikan';
        } else if ($rw == '010' or $rw == '011') {
            $dusun = 'Bendo';
        } else if ($rw == '012' or $rw == '013') {
            $dusun = 'Jegolan';
        } else {
            $dusun = '...';
        }
        $keperluan = $this->request->getVar('keperluan');
        date_default_timezone_set('Asia/Jakarta');
        $d = date("d");
        $m = date("m");
        $y = date("Y");
        $date = "$d $monthList[$m] $y";
        $tahun = date("Y");
        $ttdnama = $this->request->getVar('ttdnama');
        $ttdjabatan = $this->request->getVar('ttdjabatan');
        if ($ttdjabatan != 'Kepala Desa Tempuran') {
            $ttdjabatan = "An. Kepala Desa Tempuran, $ttdjabatan";
        }

        $_SESSION['klasifikasi'] = $klasifikasi;
        $_SESSION['nourut'] = $nourut;
        $_SESSION['tahun'] = $tahun;
        $_SESSION['nama'] = $nama;
        $_SESSION['tempat'] = $tempat;
        $_SESSION['kelamin'] = $kelamin;
        $_SESSION['agama'] = $agama;
        $_SESSION['pekerjaan'] = $pekerjaan;
        $_SESSION['alamatkerja'] = $alamatkerja;
        $_SESSION['rt'] = $rt;
        $_SESSION['rw'] = $rw;
        $_SESSION['dusun'] = $dusun;
        $_SESSION['keperluan'] = $keperluan;
        $_SESSION['date'] = $date;
        $_SESSION['ttdjabatan'] = $ttdjabatan;
        $_SESSION['ttdnama'] = $ttdnama;

        require_once '../vendor/autoload.php';


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/template/izincuti.docx');
        $templateProcessor->setValues(
            [
                'klasifikasi' => $klasifikasi,
                'nourut' => $nourut,
                'tahun' => $tahun,
                'nama' => $nama,
                'tempat' => $tempat,
                'ttl' => $ttl,
                'kelamin' => $kelamin,
                'agama' => $agama,
                'pekerjaan' => $pekerjaan,
                'alamatkerja' => $alamatkerja,
                'rt' => $rt,
                'rw' => $rw,
                'dusun' => $dusun,
                'keperluan' => $keperluan,
                'date' => $date,
                'ttdjabatan' => $ttdjabatan,
                'ttdnama' => $ttdnama,
            ]
        );

        $pathToSave = '../public/hasil/hasil_izincuti.docx';
        $templateProcessor->saveAs($pathToSave);
        $nourutbaru = $nourut + 1;
        $nourutbaru = "0$nourutbaru";

        $save = $this->SuratModel->save([
            'id' => $this->request->getVar('id'),
            'surat' => $this->request->getVar('surat'),
            'slug' => $this->request->getVar('slug'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'nourut' => $nourutbaru
        ]);
        $saveRiwayat = $this->RiwayatModel->save([
            'nama' => $nama,
            'namasurat' => $this->request->getVar('surat'),
            'nourut' => $nourutbaru
        ]);

        $data = [
            'title' => 'Izin Cuti',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('surat/izincuti/hasilizincuti', $data);
    }




    public function izinkeramaian()
    {
        $slug = $this->request->getVar('slug');
        $data = [
            'title' => 'Izin Keramaian',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda(),
            'surat' => $this->SuratModel->getSurat($slug)
        ];
        return view('surat/izinkeramaian/izinkeramaian', $data);
    }
    public function isiizinkeramaian()
    {
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        // dd($this->request->getVar());
        $klasifikasi = $this->request->getVar('klasifikasi');
        $nourut = $this->request->getVar('nourut');
        $nama = $this->request->getVar('nama');
        $tempatlahir = $this->request->getVar('tempatlahir');
        $ttl = $this->request->getVar('ttl');
        $_SESSION['ttl'] = $ttl;
        $ttld = date('d', strtotime($ttl));
        $ttlm = date('m', strtotime($ttl));
        $ttly = date('Y', strtotime($ttl));
        $ttl = "$ttld $monthList[$ttlm] $ttly";
        $pekerjaan = $this->request->getVar('pekerjaan');
        $rt = $this->request->getVar('rt');
        $rw = $this->request->getVar('rw');
        if ($rw == '001' or $rw == '002') {
            $dusun = 'Tempuran';
        } else if ($rw == '003') {
            $dusun = 'Bulakan';
        } else if ($rw == '004' or $rw == '005') {
            $dusun = 'Munggur';
        } else if ($rw == '006' or $rw == '007') {
            $dusun = 'Tempurejo';
        } else if ($rw == '008' or $rw == '009') {
            $dusun = 'Melikan';
        } else if ($rw == '010' or $rw == '011') {
            $dusun = 'Bendo';
        } else if ($rw == '012' or $rw == '013') {
            $dusun = 'Jegolan';
        } else {
            $dusun = '...';
        }
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        $mulai = $this->request->getVar('mulai');
        $_SESSION['mulai'] = $mulai;
        $harimulai = date('D', strtotime($mulai));
        $harimulai = $dayList[$harimulai];
        $selesai = $this->request->getVar('selesai');
        $_SESSION['selesai'] = $selesai;
        $hariselesai = date('D', strtotime($selesai));
        $hariselesai = $dayList[$hariselesai];
        $tglmulai = date('d', strtotime($mulai));
        $tglselesai = date('d', strtotime($selesai));
        $mselesai = date('m', strtotime($selesai));
        $yselesai = date('Y', strtotime($selesai));
        $tglselesai = "$tglselesai $monthList[$mselesai] $yselesai";
        $hiburan = $this->request->getVar('hiburan');
        $keperluan = $this->request->getVar('keperluan');
        $tempat = $this->request->getVar('tempat');
        date_default_timezone_set('Asia/Jakarta');
        $d = date("d");
        $m = date("m");
        $y = date("Y");
        $date = "$d $monthList[$m] $y";
        $tahun = date("Y");
        $ttdnama = $this->request->getVar('ttdnama');
        $ttdjabatan = $this->request->getVar('ttdjabatan');
        if ($ttdjabatan != 'Kepala Desa Tempuran') {
            $ttdjabatan = "An. Kepala Desa Tempuran, $ttdjabatan";
        }

        $_SESSION['klasifikasi'] = $klasifikasi;
        $_SESSION['nourut'] = $nourut;
        $_SESSION['tahun'] = $tahun;
        $_SESSION['nama'] = $nama;
        $_SESSION['tempatlahir'] = $tempatlahir;
        $_SESSION['pekerjaan'] = $pekerjaan;
        $_SESSION['rt'] = $rt;
        $_SESSION['rw'] = $rw;
        $_SESSION['dusun'] = $dusun;
        $_SESSION['harimulai'] = $harimulai;
        $_SESSION['hariselesai'] = $hariselesai;
        $_SESSION['tglmulai'] = $tglmulai;
        $_SESSION['tglselesai'] = $tglselesai;
        $_SESSION['hiburan'] = $hiburan;
        $_SESSION['keperluan'] = $keperluan;
        $_SESSION['tempat'] = $tempat;
        $_SESSION['date'] = $date;
        $_SESSION['ttdjabatan'] = $ttdjabatan;
        $_SESSION['ttdnama'] = $ttdnama;

        require_once '../vendor/autoload.php';


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/template/izinkeramaian.docx');
        $templateProcessor->setValues(
            [
                'klasifikasi' => $klasifikasi,
                'nourut' => $nourut,
                'tahun' => $tahun,
                'nama' => $nama,
                'tempatlahir' => $tempatlahir,
                'ttl' => $ttl,
                'pekerjaan' => $pekerjaan,
                'rt' => $rt,
                'rw' => $rw,
                'dusun' => $dusun,
                'harimulai' => $harimulai,
                'hariselesai' => $hariselesai,
                'tglmulai' => $tglmulai,
                'tglselesai' => $tglselesai,
                'hiburan' => $hiburan,
                'keperluan' => $keperluan,
                'tempat' => $tempat,
                'date' => $date,
                'ttdjabatan' => $ttdjabatan,
                'ttdnama' => $ttdnama,
            ]
        );

        $pathToSave = '../public/hasil/hasil_izinkeramaian.docx';
        $templateProcessor->saveAs($pathToSave);
        $nourutbaru = $nourut + 1;
        $nourutbaru = "0$nourutbaru";

        $save = $this->SuratModel->save([
            'id' => $this->request->getVar('id'),
            'surat' => $this->request->getVar('surat'),
            'slug' => $this->request->getVar('slug'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'nourut' => $nourutbaru
        ]);
        $saveRiwayat = $this->RiwayatModel->save([
            'nama' => $nama,
            'namasurat' => $this->request->getVar('surat'),
            'nourut' => $nourutbaru
        ]);

        $data = [
            'title' => 'Izin Keramaian',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('surat/izinkeramaian/hasilizinkeramaian', $data);
    }




    public function izinterop()
    {
        $slug = $this->request->getVar('slug');
        $data = [
            'title' => 'Izin Mendirikan Terop',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda(),
            'surat' => $this->SuratModel->getSurat($slug)
        ];
        return view('surat/izinterop/izinterop', $data);
    }
    public function isiizinterop()
    {
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        // dd($this->request->getVar());
        $klasifikasi = $this->request->getVar('klasifikasi');
        $nourut = $this->request->getVar('nourut');
        $nama = $this->request->getVar('nama');
        $umur = $this->request->getVar('umur');
        $pekerjaan = $this->request->getVar('pekerjaan');
        $rt = $this->request->getVar('rt');
        $rw = $this->request->getVar('rw');
        if ($rw == '001' or $rw == '002') {
            $dusun = 'Tempuran';
        } else if ($rw == '003') {
            $dusun = 'Bulakan';
        } else if ($rw == '004' or $rw == '005') {
            $dusun = 'Munggur';
        } else if ($rw == '006' or $rw == '007') {
            $dusun = 'Tempurejo';
        } else if ($rw == '008' or $rw == '009') {
            $dusun = 'Melikan';
        } else if ($rw == '010' or $rw == '011') {
            $dusun = 'Bendo';
        } else if ($rw == '012' or $rw == '013') {
            $dusun = 'Jegolan';
        } else {
            $dusun = '...';
        }
        $keramaian = $this->request->getVar('keramaian');
        $keperluan = $this->request->getVar('keperluan');
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        $mulai = $this->request->getVar('mulai');
        $_SESSION['mulai'] = $mulai;
        $harimulai = date('D', strtotime($mulai));
        $harimulai = $dayList[$harimulai];
        $selesai = $this->request->getVar('selesai');
        $_SESSION['selesai'] = $selesai;
        $hariselesai = date('D', strtotime($selesai));
        $hariselesai = $dayList[$hariselesai];
        $tglmulai = date('d', strtotime($mulai));
        $tglselesai = date('d', strtotime($selesai));
        $mselesai = date('m', strtotime($selesai));
        $yselesai = date('Y', strtotime($selesai));
        $tglselesai = "$tglselesai $monthList[$mselesai] $yselesai";
        $tempat = $this->request->getVar('tempat');
        date_default_timezone_set('Asia/Jakarta');
        $d = date("d");
        $m = date("m");
        $y = date("Y");
        $date = "$d $monthList[$m] $y";
        $tahun = date("Y");
        $ttdnama = $this->request->getVar('ttdnama');
        $ttdjabatan = $this->request->getVar('ttdjabatan');
        if ($ttdjabatan != 'Kepala Desa Tempuran') {
            $ttdjabatan = "An. Kepala Desa Tempuran, $ttdjabatan";
        }

        $_SESSION['klasifikasi'] = $klasifikasi;
        $_SESSION['nourut'] = $nourut;
        $_SESSION['tahun'] = $tahun;
        $_SESSION['nama'] = $nama;
        $_SESSION['umur'] = $umur;
        $_SESSION['pekerjaan'] = $pekerjaan;
        $_SESSION['rt'] = $rt;
        $_SESSION['rw'] = $rw;
        $_SESSION['dusun'] = $dusun;
        $_SESSION['keramaian'] = $keramaian;
        $_SESSION['keperluan'] = $keperluan;
        $_SESSION['harimulai'] = $harimulai;
        $_SESSION['hariselesai'] = $hariselesai;
        $_SESSION['tglmulai'] = $tglmulai;
        $_SESSION['tglselesai'] = $tglselesai;
        $_SESSION['tempat'] = $tempat;
        $_SESSION['date'] = $date;
        $_SESSION['ttdjabatan'] = $ttdjabatan;
        $_SESSION['ttdnama'] = $ttdnama;

        require_once '../vendor/autoload.php';


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/template/izinterop.docx');
        $templateProcessor->setValues(
            [
                'klasifikasi' => $klasifikasi,
                'nourut' => $nourut,
                'tahun' => $tahun,
                'nama' => $nama,
                'umur' => $umur,
                'pekerjaan' => $pekerjaan,
                'rt' => $rt,
                'rw' => $rw,
                'dusun' => $dusun,
                'keramaian' => $keramaian,
                'keperluan' => $keperluan,
                'harimulai' => $harimulai,
                'hariselesai' => $hariselesai,
                'tglmulai' => $tglmulai,
                'tglselesai' => $tglselesai,
                'tempat' => $tempat,
                'date' => $date,
                'ttdjabatan' => $ttdjabatan,
                'ttdnama' => $ttdnama,
            ]
        );

        $pathToSave = '../public/hasil/hasil_izinterop.docx';
        $templateProcessor->saveAs($pathToSave);
        $nourutbaru = $nourut + 1;
        $nourutbaru = "0$nourutbaru";

        $save = $this->SuratModel->save([
            'id' => $this->request->getVar('id'),
            'surat' => $this->request->getVar('surat'),
            'slug' => $this->request->getVar('slug'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'nourut' => $nourutbaru
        ]);
        $saveRiwayat = $this->RiwayatModel->save([
            'nama' => $nama,
            'namasurat' => $this->request->getVar('surat'),
            'nourut' => $nourutbaru
        ]);

        $data = [
            'title' => 'Izin Mendirikan Terop',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('surat/izinterop/hasilizinterop', $data);
    }




    public function belummenikah()
    {
        $slug = $this->request->getVar('slug');
        $data = [
            'title' => 'SK Belum Menikah',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda(),
            'surat' => $this->SuratModel->getSurat($slug)
        ];
        return view('surat/belummenikah/belummenikah', $data);
    }
    public function isibelummenikah()
    {
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        // dd($this->request->getVar());
        $klasifikasi = $this->request->getVar('klasifikasi');
        $nourut = $this->request->getVar('nourut');
        $nama = $this->request->getVar('nama');
        $kelamin = $this->request->getVar('kelamin');
        $tempat = $this->request->getVar('tempat');
        $ttl = $this->request->getVar('ttl');
        $_SESSION['ttl'] = $ttl;
        $ttld = date('d', strtotime($ttl));
        $ttlm = date('m', strtotime($ttl));
        $ttly = date('Y', strtotime($ttl));
        $ttl = "$ttld $monthList[$ttlm] $ttly";
        $agama = $this->request->getVar('agama');
        $status = $this->request->getVar('status');
        $pekerjaan = $this->request->getVar('pekerjaan');
        $rt = $this->request->getVar('rt');
        $rw = $this->request->getVar('rw');
        if ($rw == '001' or $rw == '002') {
            $dusun = 'Tempuran';
        } else if ($rw == '003') {
            $dusun = 'Bulakan';
        } else if ($rw == '004' or $rw == '005') {
            $dusun = 'Munggur';
        } else if ($rw == '006' or $rw == '007') {
            $dusun = 'Tempurejo';
        } else if ($rw == '008' or $rw == '009') {
            $dusun = 'Melikan';
        } else if ($rw == '010' or $rw == '011') {
            $dusun = 'Bendo';
        } else if ($rw == '012' or $rw == '013') {
            $dusun = 'Jegolan';
        } else {
            $dusun = '...';
        }
        date_default_timezone_set('Asia/Jakarta');
        $d = date("d");
        $m = date("m");
        $y = date("Y");
        $date = "$d $monthList[$m] $y";
        $tahun = date("Y");
        $ttdnama = $this->request->getVar('ttdnama');
        $ttdjabatan = $this->request->getVar('ttdjabatan');
        if ($ttdjabatan != 'Kepala Desa Tempuran') {
            $ttdjabatan = "An. Kepala Desa Tempuran, $ttdjabatan";
        }
        $_SESSION['klasifikasi'] = $klasifikasi;
        $_SESSION['nourut'] = $nourut;
        $_SESSION['tahun'] = $tahun;
        $_SESSION['nama'] = $nama;
        $_SESSION['kelamin'] = $kelamin;
        $_SESSION['tempat'] = $tempat;
        $_SESSION['agama'] = $agama;
        $_SESSION['status'] = $status;
        $_SESSION['pekerjaan'] = $pekerjaan;
        $_SESSION['rt'] = $rt;
        $_SESSION['rw'] = $rw;
        $_SESSION['dusun'] = $dusun;
        $_SESSION['date'] = $date;
        $_SESSION['ttdjabatan'] = $ttdjabatan;
        $_SESSION['ttdnama'] = $ttdnama;

        require_once '../vendor/autoload.php';


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/template/belummenikah.docx');
        $templateProcessor->setValues(
            [
                'klasifikasi' => $klasifikasi,
                'nourut' => $nourut,
                'tahun' => $tahun,
                'nama' => $nama,
                'kelamin' => $kelamin,
                'tempat' => $tempat,
                'ttl' => $ttl,
                'agama' => $agama,
                'status' => $status,
                'pekerjaan' => $pekerjaan,
                'rt' => $rt,
                'rw' => $rw,
                'dusun' => $dusun,
                'date' => $date,
                'ttdjabatan' => $ttdjabatan,
                'ttdnama' => $ttdnama,
            ]
        );

        $pathToSave = '../public/hasil/hasil_belummenikah.docx';
        $templateProcessor->saveAs($pathToSave);
        $nourutbaru = $nourut + 1;
        $nourutbaru = "0$nourutbaru";

        $save = $this->SuratModel->save([
            'id' => $this->request->getVar('id'),
            'surat' => $this->request->getVar('surat'),
            'slug' => $this->request->getVar('slug'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'nourut' => $nourutbaru
        ]);
        $saveRiwayat = $this->RiwayatModel->save([
            'nama' => $nama,
            'namasurat' => $this->request->getVar('surat'),
            'nourut' => $nourutbaru
        ]);

        $data = [
            'title' => 'SK Belum Menikah',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('surat/belummenikah/hasilbelummenikah', $data);
    }





    public function izinpendirian()
    {
        $slug = $this->request->getVar('slug');
        $data = [
            'title' => 'SK izin pendirian',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda(),
            'surat' => $this->SuratModel->getSurat($slug)
        ];
        return view('surat/izinpendirian/izinpendirian', $data);
    }
    public function isiizinpendirian()
    {
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        // dd($this->request->getVar());
        $klasifikasi = $this->request->getVar('klasifikasi');
        $nourut = $this->request->getVar('nourut');
        $didirikan = $this->request->getVar('didirikan');
        $tahundidirikan = $this->request->getVar('tahundidirikan');
        $rt = $this->request->getVar('rt');
        $rw = $this->request->getVar('rw');
        if ($rw == '001' or $rw == '002') {
            $dusun = 'Tempuran';
        } else if ($rw == '003') {
            $dusun = 'Bulakan';
        } else if ($rw == '004' or $rw == '005') {
            $dusun = 'Munggur';
        } else if ($rw == '006' or $rw == '007') {
            $dusun = 'Tempurejo';
        } else if ($rw == '008' or $rw == '009') {
            $dusun = 'Melikan';
        } else if ($rw == '010' or $rw == '011') {
            $dusun = 'Bendo';
        } else if ($rw == '012' or $rw == '013') {
            $dusun = 'Jegolan';
        } else {
            $dusun = '...';
        }
        date_default_timezone_set('Asia/Jakarta');
        $d = date("d");
        $m = date("m");
        $y = date("Y");
        $date = "$d $monthList[$m] $y";
        $tahun = date("Y");
        $ttdnama = $this->request->getVar('ttdnama');
        $ttdjabatan = $this->request->getVar('ttdjabatan');
        $ttdalamat = $this->request->getVar('ttdalamat');
        if ($ttdjabatan != 'Kepala Desa Tempuran') {
            $ttdjabatan = "An. Kepala Desa Tempuran, $ttdjabatan";
        }

        $_SESSION['klasifikasi'] = $klasifikasi;
        $_SESSION['nourut'] = $nourut;
        $_SESSION['tahun'] = $tahun;
        $_SESSION['didirikan'] = $didirikan;
        $_SESSION['tahundidirikan'] = $tahundidirikan;
        $_SESSION['rt'] = $rt;
        $_SESSION['rw'] = $rw;
        $_SESSION['dusun'] = $dusun;
        $_SESSION['date'] = $date;
        $_SESSION['ttdjabatan'] = $ttdjabatan;
        $_SESSION['ttdnama'] = $ttdnama;
        $_SESSION['ttdalamat'] = $ttdalamat;

        require_once '../vendor/autoload.php';


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/template/izinpendirian.docx');
        $templateProcessor->setValues(
            [
                'klasifikasi' => $klasifikasi,
                'nourut' => $nourut,
                'tahun' => $tahun,
                'didirikan' => $didirikan,
                'tahundidirikan' => $tahundidirikan,
                'rt' => $rt,
                'rw' => $rw,
                'dusun' => $dusun,
                'date' => $date,
                'ttdjabatan' => $ttdjabatan,
                'ttdnama' => $ttdnama,
                'ttdalamat' => $ttdalamat,
            ]
        );

        $pathToSave = '../public/hasil/hasil_izinpendirian.docx';
        $templateProcessor->saveAs($pathToSave);
        $nourutbaru = $nourut + 1;
        $nourutbaru = "0$nourutbaru";

        $save = $this->SuratModel->save([
            'id' => $this->request->getVar('id'),
            'surat' => $this->request->getVar('surat'),
            'slug' => $this->request->getVar('slug'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'nourut' => $nourutbaru
        ]);
        $saveRiwayat = $this->RiwayatModel->save([
            'nama' => $didirikan,
            'namasurat' => $this->request->getVar('surat'),
            'nourut' => $nourutbaru
        ]);

        $data = [
            'title' => 'SK Izin Pendirian',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('surat/izinpendirian/hasilizinpendirian', $data);
    }





    public function domisili()
    {
        $slug = $this->request->getVar('slug');
        $data = [
            'title' => 'SK Domisili',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda(),
            'surat' => $this->SuratModel->getSurat($slug)
        ];
        return view('surat/domisili/domisili', $data);
    }
    public function isidomisili()
    {
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        // dd($this->request->getVar());
        $klasifikasi = $this->request->getVar('klasifikasi');
        $nourut = $this->request->getVar('nourut');
        $nama = $this->request->getVar('nama');
        $tempat = $this->request->getVar('tempat');
        $ttl = $this->request->getVar('ttl');
        $_SESSION['ttl'] = $ttl;
        $ttld = date('d', strtotime($ttl));
        $ttlm = date('m', strtotime($ttl));
        $ttly = date('Y', strtotime($ttl));
        $ttl = "$ttld $monthList[$ttlm] $ttly";
        $nik = $this->request->getVar('nik');
        $status = $this->request->getVar('status');
        $pekerjaan = $this->request->getVar('pekerjaan');
        $rt = $this->request->getVar('rt');
        $rw = $this->request->getVar('rw');
        if ($rw == '001' or $rw == '002') {
            $dusun = 'Tempuran';
        } else if ($rw == '003') {
            $dusun = 'Bulakan';
        } else if ($rw == '004' or $rw == '005') {
            $dusun = 'Munggur';
        } else if ($rw == '006' or $rw == '007') {
            $dusun = 'Tempurejo';
        } else if ($rw == '008' or $rw == '009') {
            $dusun = 'Melikan';
        } else if ($rw == '010' or $rw == '011') {
            $dusun = 'Bendo';
        } else if ($rw == '012' or $rw == '013') {
            $dusun = 'Jegolan';
        } else {
            $dusun = '...';
        }
        date_default_timezone_set('Asia/Jakarta');
        $d = date("d");
        $m = date("m");
        $y = date("Y");
        $date = "$d $monthList[$m] $y";
        $tahun = date("Y");
        $ttdnama = $this->request->getVar('ttdnama');
        $ttdjabatan = $this->request->getVar('ttdjabatan');
        $ttdalamat = $this->request->getVar('ttdalamat');
        if ($ttdjabatan != 'Kepala Desa Tempuran') {
            $ttdjabatan = "An. Kepala Desa Tempuran, $ttdjabatan";
        }

        $_SESSION['klasifikasi'] = $klasifikasi;
        $_SESSION['nourut'] = $nourut;
        $_SESSION['ttdjabatan'] = $ttdjabatan;
        $_SESSION['ttdnama'] = $ttdnama;
        $_SESSION['ttdalamat'] = $ttdalamat;
        $_SESSION['tahun'] = $tahun;
        $_SESSION['nama'] = $nama;
        $_SESSION['tempat'] = $tempat;
        $_SESSION['nik'] = $nik;
        $_SESSION['status'] = $status;
        $_SESSION['pekerjaan'] = $pekerjaan;
        $_SESSION['rt'] = $rt;
        $_SESSION['rw'] = $rw;
        $_SESSION['dusun'] = $dusun;
        $_SESSION['date'] = $date;

        require_once '../vendor/autoload.php';


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/template/domisili.docx');
        $templateProcessor->setValues(
            [
                'klasifikasi' => $klasifikasi,
                'nourut' => $nourut,
                'ttdjabatan' => $ttdjabatan,
                'ttdnama' => $ttdnama,
                'ttdalamat' => $ttdalamat,
                'tahun' => $tahun,
                'nama' => $nama,
                'tempat' => $tempat,
                'ttl' => $ttl,
                'nik' => $nik,
                'status' => $status,
                'pekerjaan' => $pekerjaan,
                'rt' => $rt,
                'rw' => $rw,
                'dusun' => $dusun,
                'date' => $date,

            ]
        );

        $pathToSave = '../public/hasil/hasil_domisili.docx';
        $templateProcessor->saveAs($pathToSave);
        $nourutbaru = $nourut + 1;
        $nourutbaru = "0$nourutbaru";

        $save = $this->SuratModel->save([
            'id' => $this->request->getVar('id'),
            'surat' => $this->request->getVar('surat'),
            'slug' => $this->request->getVar('slug'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'nourut' => $nourutbaru
        ]);
        $saveRiwayat = $this->RiwayatModel->save([
            'nama' => $nama,
            'namasurat' => $this->request->getVar('surat'),
            'nourut' => $nourutbaru
        ]);

        $data = [
            'title' => 'domisili',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('surat/domisili/hasildomisili', $data);
    }




    public function keteranganhilang()
    {
        $slug = $this->request->getVar('slug');
        $data = [
            'title' => 'SK Kehilangan',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda(),
            'surat' => $this->SuratModel->getSurat($slug)
        ];
        return view('surat/keteranganhilang/keteranganhilang', $data);
    }
    public function isiketeranganhilang()
    {
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        // dd($this->request->getVar());
        $klasifikasi = $this->request->getVar('klasifikasi');
        $nourut = $this->request->getVar('nourut');
        $nama = $this->request->getVar('nama');
        $nik = $this->request->getVar('nik');
        $tempat = $this->request->getVar('tempat');
        $ttl = $this->request->getVar('ttl');
        $_SESSION['ttl'] = $ttl;
        $ttld = date('d', strtotime($ttl));
        $ttlm = date('m', strtotime($ttl));
        $ttly = date('Y', strtotime($ttl));
        $ttl = "$ttld $monthList[$ttlm] $ttly";
        $pekerjaan = $this->request->getVar('pekerjaan');
        $rt = $this->request->getVar('rt');
        $rw = $this->request->getVar('rw');
        if ($rw == '001' or $rw == '002') {
            $dusun = 'Tempuran';
        } else if ($rw == '003') {
            $dusun = 'Bulakan';
        } else if ($rw == '004' or $rw == '005') {
            $dusun = 'Munggur';
        } else if ($rw == '006' or $rw == '007') {
            $dusun = 'Tempurejo';
        } else if ($rw == '008' or $rw == '009') {
            $dusun = 'Melikan';
        } else if ($rw == '010' or $rw == '011') {
            $dusun = 'Bendo';
        } else if ($rw == '012' or $rw == '013') {
            $dusun = 'Jegolan';
        } else {
            $dusun = '...';
        }
        $namabarang = $this->request->getVar('namabarang');
        $hilangdi = $this->request->getVar('hilangdi');
        $tanggal = $this->request->getVar('tanggal');
        $_SESSION['tanggal'] = $tanggal;
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        $hari = date('D', strtotime($tanggal));
        $hari = $dayList[$hari];
        $tanggald = date('d', strtotime($tanggal));
        $tanggalm = date('m', strtotime($tanggal));
        $tanggaly = date('Y', strtotime($tanggal));
        $tanggal = "$tanggald $monthList[$tanggalm] $tanggaly";
        $jam = $this->request->getVar('jam');
        date_default_timezone_set('Asia/Jakarta');
        $d = date("d");
        $m = date("m");
        $y = date("Y");
        $date = "$d $monthList[$m] $y";
        $tahun = date("Y");
        $ttdnama = $this->request->getVar('ttdnama');
        $ttdjabatan = $this->request->getVar('ttdjabatan');
        if ($ttdjabatan != 'Kepala Desa Tempuran') {
            $ttdjabatan = "An. Kepala Desa Tempuran, $ttdjabatan";
        }

        $_SESSION['klasifikasi'] = $klasifikasi;
        $_SESSION['nourut'] = $nourut;
        $_SESSION['tahun'] = $tahun;
        $_SESSION['nama'] = $nama;
        $_SESSION['nik'] = $nik;
        $_SESSION['tempat'] = $tempat;
        $_SESSION['pekerjaan'] = $pekerjaan;
        $_SESSION['rt'] = $rt;
        $_SESSION['rw'] = $rw;
        $_SESSION['dusun'] = $dusun;
        $_SESSION['namabarang'] = $namabarang;
        $_SESSION['hilangdi'] = $hilangdi;
        $_SESSION['hari'] = $hari;
        $_SESSION['jam'] = $jam;
        $_SESSION['date'] = $date;
        $_SESSION['ttdjabatan'] = $ttdjabatan;
        $_SESSION['ttdnama'] = $ttdnama;

        require_once '../vendor/autoload.php';


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/template/keteranganhilang.docx');
        $templateProcessor->setValues(
            [
                'klasifikasi' => $klasifikasi,
                'nourut' => $nourut,
                'tahun' => $tahun,
                'nama' => $nama,
                'nik' => $nik,
                'tempat' => $tempat,
                'ttl' => $ttl,
                'pekerjaan' => $pekerjaan,
                'rt' => $rt,
                'rw' => $rw,
                'dusun' => $dusun,
                'namabarang' => $namabarang,
                'hilangdi' => $hilangdi,
                'hari' => $hari,
                'tanggal' => $tanggal,
                'jam' => $jam,
                'date' => $date,
                'ttdjabatan' => $ttdjabatan,
                'ttdnama' => $ttdnama,
            ]
        );

        $pathToSave = '../public/hasil/hasil_keteranganhilang.docx';
        $templateProcessor->saveAs($pathToSave);
        $nourutbaru = $nourut + 1;
        $nourutbaru = "0$nourutbaru";

        $save = $this->SuratModel->save([
            'id' => $this->request->getVar('id'),
            'surat' => $this->request->getVar('surat'),
            'slug' => $this->request->getVar('slug'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'nourut' => $nourutbaru
        ]);
        $saveRiwayat = $this->RiwayatModel->save([
            'nama' => $nama,
            'namasurat' => $this->request->getVar('surat'),
            'nourut' => $nourutbaru
        ]);

        $data = [
            'title' => 'SK Kehilangan',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('surat/keteranganhilang/hasilketeranganhilang', $data);
    }





    public function keterangankelahiran()
    {
        $slug = $this->request->getVar('slug');
        $data = [
            'title' => 'SK Kelahiran',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda(),
            'surat' => $this->SuratModel->getSurat($slug)
        ];
        return view('surat/keterangankelahiran/keterangankelahiran', $data);
    }
    public function isiketerangankelahiran()
    {
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        // dd($this->request->getVar());
        $klasifikasi = $this->request->getVar('klasifikasi');
        $nourut = $this->request->getVar('nourut');
        $nama = $this->request->getVar('nama');
        $tempat = $this->request->getVar('tempat');
        $ttl = $this->request->getVar('ttl');
        $_SESSION['ttl'] = $ttl;
        $hari = date('D', strtotime($ttl));
        $hari = $dayList[$hari];
        $ttld = date('d', strtotime($ttl));
        $ttlm = date('m', strtotime($ttl));
        $ttly = date('Y', strtotime($ttl));
        $ttl = "$ttld $monthList[$ttlm] $ttly";
        $anakke = $this->request->getVar('anakke');
        $kelamin = $this->request->getVar('kelamin');
        $rt = $this->request->getVar('rt');
        $rw = $this->request->getVar('rw');
        if ($rw == '001' or $rw == '002') {
            $dusun = 'Tempuran';
        } else if ($rw == '003') {
            $dusun = 'Bulakan';
        } else if ($rw == '004' or $rw == '005') {
            $dusun = 'Munggur';
        } else if ($rw == '006' or $rw == '007') {
            $dusun = 'Tempurejo';
        } else if ($rw == '008' or $rw == '009') {
            $dusun = 'Melikan';
        } else if ($rw == '010' or $rw == '011') {
            $dusun = 'Bendo';
        } else if ($rw == '012' or $rw == '013') {
            $dusun = 'Jegolan';
        } else {
            $dusun = '...';
        }


        $namaibu = $this->request->getVar('namaibu');
        if ($namaibu == '') {
            $namaibu = '-';
        }
        $tempatibu = $this->request->getVar('tempatibu');
        $ttlibu = $this->request->getVar('ttlibu');
        $_SESSION['ttlibu'] = $ttlibu;
        if ($ttlibu == '' and ($tempatibu == '' or $tempatibu == '-')) {
            $ttlibu = '-';
        } else if ($ttlibu != '' and ($tempatibu == '' or $tempatibu == '-')) {
            $ttlibud = date('d', strtotime($ttlibu));
            $ttlibum = date('m', strtotime($ttlibu));
            $ttlibuy = date('Y', strtotime($ttlibu));
            $ttlibu = " - , $ttlibud $monthList[$ttlibum] $ttlibuy";
        } else if ($ttlibu == '' and ($tempatibu != '-' or $tempatibu != '')) {
            $ttlibu = "$tempatibu, - ";
        } else if ($ttlibu != '' and ($tempatibu != '-' or $tempatibu != '')) {
            $ttlibud = date('d', strtotime($ttlibu));
            $ttlibum = date('m', strtotime($ttlibu));
            $ttlibuy = date('Y', strtotime($ttlibu));
            $ttlibu = " $tempatibu , $ttlibud $monthList[$ttlibum] $ttlibuy";
        }
        $bangsaagamaibu = $this->request->getVar('bangsaagamaibu');
        if ($bangsaagamaibu == '') {
            $bangsaagamaibu = '-';
        }
        $pekerjaanibu = $this->request->getVar('pekerjaanibu');
        if ($pekerjaanibu == '') {
            $pekerjaanibu = '-';
        }
        $alamatibu = $this->request->getVar('alamatibu');
        if ($alamatibu == '') {
            $alamatibu = '-';
        }

        $namaayah = $this->request->getVar('namaayah');
        if ($namaayah == '') {
            $namaayah = '-';
        }
        $tempatayah = $this->request->getVar('tempatayah');
        $ttlayah = $this->request->getVar('ttlayah');
        $_SESSION['ttlayah'] = $ttlayah;
        if ($ttlayah == '' and ($tempatayah == '' or $tempatayah == '-')) {
            $ttlayah = '-';
        } else if ($ttlayah != '' and ($tempatayah == '' or $tempatayah == '-')) {
            $ttlayahd = date('d', strtotime($ttlayah));
            $ttlayahm = date('m', strtotime($ttlayah));
            $ttlayahy = date('Y', strtotime($ttlayah));
            $ttlayah = " - , $ttlayahd $monthList[$ttlayahm] $ttlayahy";
        } else if ($ttlayah == '' and ($tempatayah != '-' or $tempatayah != '')) {
            $ttlayah = "$tempatayah, - ";
        } else if ($ttlayah != '' and ($tempatayah != '-' or $tempatayah != '')) {
            $ttlayahd = date('d', strtotime($ttlayah));
            $ttlayahm = date('m', strtotime($ttlayah));
            $ttlayahy = date('Y', strtotime($ttlayah));
            $ttlayah = " $tempatayah , $ttlayahd $monthList[$ttlayahm] $ttlayahy";
        }
        $bangsaagamaayah = $this->request->getVar('bangsaagamaayah');
        if ($bangsaagamaayah == '') {
            $bangsaagamaayah = '-';
        }
        $pekerjaanayah = $this->request->getVar('pekerjaanayah');
        if ($pekerjaanayah == '') {
            $pekerjaanayah = '-';
        }
        $alamatayah = $this->request->getVar('alamatayah');
        if ($alamatayah == '') {
            $alamatayah = '-';
        }


        date_default_timezone_set('Asia/Jakarta');
        $d = date("d");
        $m = date("m");
        $y = date("Y");
        $date = "$d $monthList[$m] $y";
        $tahun = date("Y");
        $ttdnama = $this->request->getVar('ttdnama');
        $ttdjabatan = $this->request->getVar('ttdjabatan');
        if ($ttdjabatan != 'Kepala Desa Tempuran') {
            $ttdjabatan = "An. Kepala Desa Tempuran, $ttdjabatan";
        }

        $_SESSION['klasifikasi'] = $klasifikasi;
        $_SESSION['nourut'] = $nourut;
        $_SESSION['tahun'] = $tahun;
        $_SESSION['nama'] = $nama;
        $_SESSION['tempat'] = $tempat;
        $_SESSION['hari'] = $hari;
        $_SESSION['anakke'] = $anakke;
        $_SESSION['kelamin'] = $kelamin;
        $_SESSION['rt'] = $rt;
        $_SESSION['rw'] = $rw;
        $_SESSION['dusun'] = $dusun;
        $_SESSION['namaibu'] = $namaibu;
        $_SESSION['bangsaagamaibu'] = $bangsaagamaibu;
        $_SESSION['pekerjaanibu'] = $pekerjaanibu;
        $_SESSION['alamatibu'] = $alamatibu;
        $_SESSION['namaayah'] = $namaayah;
        $_SESSION['bangsaagamaayah'] = $bangsaagamaayah;
        $_SESSION['pekerjaanayah'] = $pekerjaanayah;
        $_SESSION['alamatayah'] = $alamatayah;
        $_SESSION['date'] = $date;
        $_SESSION['ttdjabatan'] = $ttdjabatan;
        $_SESSION['ttdnama'] = $ttdnama;

        require_once '../vendor/autoload.php';


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/template/keterangankelahiran.docx');
        $templateProcessor->setValues(
            [
                'klasifikasi' => $klasifikasi,
                'nourut' => $nourut,
                'tahun' => $tahun,
                'nama' => $nama,
                'tempat' => $tempat,
                'ttl' => $ttl,
                'hari' => $hari,
                'anakke' => $anakke,
                'kelamin' => $kelamin,
                'rt' => $rt,
                'rw' => $rw,
                'dusun' => $dusun,
                'namaibu' => $namaibu,
                'ttlibu' => $ttlibu,
                'bangsaagamaibu' => $bangsaagamaibu,
                'pekerjaanibu' => $pekerjaanibu,
                'alamatibu' => $alamatibu,
                'namaayah' => $namaayah,
                'ttlayah' => $ttlayah,
                'bangsaagamaayah' => $bangsaagamaayah,
                'pekerjaanayah' => $pekerjaanayah,
                'alamatayah' => $alamatayah,
                'date' => $date,
                'ttdjabatan' => $ttdjabatan,
                'ttdnama' => $ttdnama,
            ]
        );

        $pathToSave = '../public/hasil/hasil_keterangankelahiran.docx';
        $templateProcessor->saveAs($pathToSave);
        $nourutbaru = $nourut + 1;
        $nourutbaru = "0$nourutbaru";

        $save = $this->SuratModel->save([
            'id' => $this->request->getVar('id'),
            'surat' => $this->request->getVar('surat'),
            'slug' => $this->request->getVar('slug'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'nourut' => $nourutbaru
        ]);
        $saveRiwayat = $this->RiwayatModel->save([
            'nama' => $nama,
            'namasurat' => $this->request->getVar('surat'),
            'nourut' => $nourutbaru
        ]);

        $data = [
            'title' => 'SK kelahiran',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('surat/keterangankelahiran/hasilketerangankelahiran', $data);
    }





    public function keterangankematian()
    {
        $slug = $this->request->getVar('slug');
        $data = [
            'title' => 'SK Kematian',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda(),
            'surat' => $this->SuratModel->getSurat($slug)
        ];
        return view('surat/keterangankematian/keterangankematian', $data);
    }
    public function isiketerangankematian()
    {
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        // dd($this->request->getVar());
        $klasifikasi = $this->request->getVar('klasifikasi');
        $nourut = $this->request->getVar('nourut');
        $nama = $this->request->getVar('nama');
        $tempat = $this->request->getVar('tempat');
        if ($tempat == '') {
            $tempat = '-';
        }
        $ttl = $this->request->getVar('ttl');
        $_SESSION['ttl'] = $ttl;
        if ($ttl == '') {
            $umur = $this->request->getVar('umur');
            $ttl = "$umur Tahun";
        } else {
            $ttld = date('d', strtotime($ttl));
            $ttlm = date('m', strtotime($ttl));
            $ttly = date('Y', strtotime($ttl));
            $ttl = "$ttld $monthList[$ttlm] $ttly";
        }
        $kelamin = $this->request->getVar('kelamin');
        $kwn = $this->request->getVar('kwn');
        $agama = $this->request->getVar('agama');
        $rt = $this->request->getVar('rt');
        $rw = $this->request->getVar('rw');
        if ($rw == '001' or $rw == '002') {
            $dusun = 'Tempuran';
        } else if ($rw == '003') {
            $dusun = 'Bulakan';
        } else if ($rw == '004' or $rw == '005') {
            $dusun = 'Munggur';
        } else if ($rw == '006' or $rw == '007') {
            $dusun = 'Tempurejo';
        } else if ($rw == '008' or $rw == '009') {
            $dusun = 'Melikan';
        } else if ($rw == '010' or $rw == '011') {
            $dusun = 'Bendo';
        } else if ($rw == '012' or $rw == '013') {
            $dusun = 'Jegolan';
        } else {
            $dusun = '...';
        }
        $tglkematian = $this->request->getVar('tglkematian');
        $_SESSION['tglkematian'] = $tglkematian;
        $tglkematiand = date('d', strtotime($tglkematian));
        $tglkematianm = date('m', strtotime($tglkematian));
        $tglkematiany = date('Y', strtotime($tglkematian));
        $tglkematian = "$tglkematiand $monthList[$tglkematianm] $tglkematiany";
        $hari = date('D', strtotime($tglkematian));
        $hari = $dayList[$hari];
        $tempatkematian = $this->request->getVar('tempatkematian');
        $sebabkematian = $this->request->getVar('sebabkematian');
        date_default_timezone_set('Asia/Jakarta');
        $d = date("d");
        $m = date("m");
        $y = date("Y");
        $date = "$d $monthList[$m] $y";
        $tahun = date("Y");
        $ttdnama = $this->request->getVar('ttdnama');
        $ttdjabatan = $this->request->getVar('ttdjabatan');
        if ($ttdjabatan != 'Kepala Desa Tempuran') {
            $ttdjabatan = "An. Kepala Desa Tempuran, $ttdjabatan";
        }

        $_SESSION['klasifikasi'] = $klasifikasi;
        $_SESSION['nourut'] = $nourut;
        $_SESSION['tahun'] = $tahun;
        $_SESSION['nama'] = $nama;
        $_SESSION['tempat'] = $tempat;
        $_SESSION['kelamin'] = $kelamin;
        $_SESSION['kwn'] = $kwn;
        $_SESSION['agama'] = $agama;
        $_SESSION['rt'] = $rt;
        $_SESSION['rw'] = $rw;
        $_SESSION['dusun'] = $dusun;
        $_SESSION['hari'] = $hari;
        $_SESSION['tempatkematian'] = $tempatkematian;
        $_SESSION['sebabkematian'] = $sebabkematian;
        $_SESSION['date'] = $date;
        $_SESSION['ttdjabatan'] = $ttdjabatan;
        $_SESSION['ttdnama'] = $ttdnama;

        require_once '../vendor/autoload.php';


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/template/keterangankematian.docx');
        $templateProcessor->setValues(
            [
                'klasifikasi' => $klasifikasi,
                'nourut' => $nourut,
                'tahun' => $tahun,
                'nama' => $nama,
                'tempat' => $tempat,
                'ttl' => $ttl,
                'kelamin' => $kelamin,
                'kwn' => $kwn,
                'agama' => $agama,
                'rt' => $rt,
                'rw' => $rw,
                'dusun' => $dusun,
                'hari' => $hari,
                'tglkematian' => $tglkematian,
                'tempatkematian' => $tempatkematian,
                'sebabkematian' => $sebabkematian,
                'date' => $date,
                'ttdjabatan' => $ttdjabatan,
                'ttdnama' => $ttdnama,
            ]
        );

        $pathToSave = '../public/hasil/hasil_keterangankematian.docx';
        $templateProcessor->saveAs($pathToSave);
        $nourutbaru = $nourut + 1;
        $nourutbaru = "0$nourutbaru";

        $save = $this->SuratModel->save([
            'id' => $this->request->getVar('id'),
            'surat' => $this->request->getVar('surat'),
            'slug' => $this->request->getVar('slug'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'nourut' => $nourutbaru
        ]);
        $saveRiwayat = $this->RiwayatModel->save([
            'nama' => $nama,
            'namasurat' => $this->request->getVar('surat'),
            'nourut' => $nourutbaru
        ]);

        $data = [
            'title' => 'SK kematian',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('surat/keterangankematian/hasilketerangankematian', $data);
    }




    public function keteranganmerantau()
    {
        $slug = $this->request->getVar('slug');
        $data = [
            'title' => 'SK Merantau',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda(),
            'surat' => $this->SuratModel->getSurat($slug)
        ];
        return view('surat/keteranganmerantau/keteranganmerantau', $data);
    }
    public function isiketeranganmerantau()
    {
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        // dd($this->request->getVar());
        $klasifikasi = $this->request->getVar('klasifikasi');
        $nourut = $this->request->getVar('nourut');
        $nama = $this->request->getVar('nama');
        $tempat = $this->request->getVar('tempat');
        $ttl = $this->request->getVar('ttl');
        $_SESSION['ttl'] = $ttl;
        $ttld = date('d', strtotime($ttl));
        $ttlm = date('m', strtotime($ttl));
        $ttly = date('Y', strtotime($ttl));
        $ttl = "$ttld $monthList[$ttlm] $ttly";
        $status = $this->request->getVar('status');
        $pekerjaan = $this->request->getVar('pekerjaan');
        $rt = $this->request->getVar('rt');
        $rw = $this->request->getVar('rw');
        if ($rw == '001' or $rw == '002') {
            $dusun = 'Tempuran';
        } else if ($rw == '003') {
            $dusun = 'Bulakan';
        } else if ($rw == '004' or $rw == '005') {
            $dusun = 'Munggur';
        } else if ($rw == '006' or $rw == '007') {
            $dusun = 'Tempurejo';
        } else if ($rw == '008' or $rw == '009') {
            $dusun = 'Melikan';
        } else if ($rw == '010' or $rw == '011') {
            $dusun = 'Bendo';
        } else if ($rw == '012' or $rw == '013') {
            $dusun = 'Jegolan';
        } else {
            $dusun = '...';
        }
        $keterangan = $this->request->getVar('keterangan');
        date_default_timezone_set('Asia/Jakarta');
        $d = date("d");
        $m = date("m");
        $y = date("Y");
        $date = "$d $monthList[$m] $y";
        $tahun = date("Y");
        $ttdnama = $this->request->getVar('ttdnama');
        $ttdjabatan = $this->request->getVar('ttdjabatan');
        if ($ttdjabatan != 'Kepala Desa Tempuran') {
            $ttdjabatan = "An. Kepala Desa Tempuran, $ttdjabatan";
        }

        $_SESSION['klasifikasi'] = $klasifikasi;
        $_SESSION['nourut'] = $nourut;
        $_SESSION['tahun'] = $tahun;
        $_SESSION['nama'] = $nama;
        $_SESSION['tempat'] = $tempat;
        $_SESSION['status'] = $status;
        $_SESSION['pekerjaan'] = $pekerjaan;
        $_SESSION['rt'] = $rt;
        $_SESSION['rw'] = $rw;
        $_SESSION['dusun'] = $dusun;
        $_SESSION['keterangan'] = $keterangan;
        $_SESSION['date'] = $date;
        $_SESSION['ttdjabatan'] = $ttdjabatan;
        $_SESSION['ttdnama'] = $ttdnama;

        require_once '../vendor/autoload.php';


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/template/keteranganmerantau.docx');
        $templateProcessor->setValues(
            [
                'klasifikasi' => $klasifikasi,
                'nourut' => $nourut,
                'tahun' => $tahun,
                'nama' => $nama,
                'tempat' => $tempat,
                'ttl' => $ttl,
                'status' => $status,
                'pekerjaan' => $pekerjaan,
                'rt' => $rt,
                'rw' => $rw,
                'dusun' => $dusun,
                'keterangan' => $keterangan,
                'date' => $date,
                'ttdjabatan' => $ttdjabatan,
                'ttdnama' => $ttdnama,
            ]
        );

        $pathToSave = '../public/hasil/hasil_keteranganmerantau.docx';
        $templateProcessor->saveAs($pathToSave);
        $nourutbaru = $nourut + 1;
        $nourutbaru = "0$nourutbaru";

        $save = $this->SuratModel->save([
            'id' => $this->request->getVar('id'),
            'surat' => $this->request->getVar('surat'),
            'slug' => $this->request->getVar('slug'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'nourut' => $nourutbaru
        ]);
        $saveRiwayat = $this->RiwayatModel->save([
            'nama' => $nama,
            'namasurat' => $this->request->getVar('surat'),
            'nourut' => $nourutbaru
        ]);

        $data = [
            'title' => 'SK Merantau',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('surat/keteranganmerantau/hasilketeranganmerantau', $data);
    }




    public function skck()
    {
        $slug = $this->request->getVar('slug');
        $data = [
            'title' => 'SKCK',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda(),
            'surat' => $this->SuratModel->getSurat($slug),
        ];
        return view('surat/skck/skck', $data);
    }
    public function isiskck()
    {
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        // dd($this->request->getVar());
        $klasifikasi = $this->request->getVar('klasifikasi');
        $nourut = $this->request->getVar('nourut');
        $nama = $this->request->getVar('nama');
        $kelamin = $this->request->getVar('kelamin');
        $tempat = $this->request->getVar('tempat');
        $ttl = $this->request->getVar('ttl');
        $_SESSION['ttl'] = $ttl;
        $ttld = date('d', strtotime($ttl));
        $ttlm = date('m', strtotime($ttl));
        $ttly = date('Y', strtotime($ttl));
        $ttl = "$ttld $monthList[$ttlm] $ttly";
        $status = $this->request->getVar('status');
        $agama = $this->request->getVar('agama');
        $kebangsaan = $this->request->getVar('kebangsaan');
        $pekerjaan = $this->request->getVar('pekerjaan');
        $nik = $this->request->getVar('nik');
        $rt = $this->request->getVar('rt');
        $rw = $this->request->getVar('rw');
        if ($rw == '001' or $rw == '002') {
            $dusun = 'Tempuran';
        } else if ($rw == '003') {
            $dusun = 'Bulakan';
        } else if ($rw == '004' or $rw == '005') {
            $dusun = 'Munggur';
        } else if ($rw == '006' or $rw == '007') {
            $dusun = 'Tempurejo';
        } else if ($rw == '008' or $rw == '009') {
            $dusun = 'Melikan';
        } else if ($rw == '010' or $rw == '011') {
            $dusun = 'Bendo';
        } else if ($rw == '012' or $rw == '013') {
            $dusun = 'Jegolan';
        } else {
            $dusun = '...';
        }
        $untuk = $this->request->getVar('untuk');
        date_default_timezone_set('Asia/Jakarta');
        $d = date("d");
        $m = date("m");
        $y = date("Y");
        $date = "$d $monthList[$m] $y";
        $monthSampaiList = array(
            'Januari' => 'Maret',
            'Februari' => 'April',
            'Maret' => 'Mei',
            'April' => 'Juni',
            'Mei' => 'Juli',
            'Juni' => 'Agustus',
            'Juli' => 'September',
            'Agustus' => 'Oktober',
            'September' => 'November',
            'Oktober' => 'Desember',
            'November' => 'Januari',
            'Desember' => 'Februari',
        );
        $mSampai = $monthSampaiList[$monthList[$m]];
        if ($mSampai == 'Januari' or $mSampai == 'Februari') {
            $ySampai = $y + 1;
        } else {
            $ySampai = $y;
        }
        $mulai = $date;
        $sampai = "$d $mSampai $ySampai";
        $tahun = date("Y");
        $ttdnama = $this->request->getVar('ttdnama');
        $ttdjabatan = $this->request->getVar('ttdjabatan');
        if ($ttdjabatan != 'Kepala Desa Tempuran') {
            $ttdjabatan = "An. Kepala Desa Tempuran, $ttdjabatan";
        }

        $_SESSION['klasifikasi'] = $klasifikasi;
        $_SESSION['nourut'] = $nourut;
        $_SESSION['tahun'] = $tahun;
        $_SESSION['nama'] = $nama;
        $_SESSION['kelamin'] = $kelamin;
        $_SESSION['tempat'] = $tempat;
        $_SESSION['status'] = $status;
        $_SESSION['agama'] = $agama;
        $_SESSION['kebangsaan'] = $kebangsaan;
        $_SESSION['pekerjaan'] = $pekerjaan;
        $_SESSION['nik'] = $nik;
        $_SESSION['rt'] = $rt;
        $_SESSION['rw'] = $rw;
        $_SESSION['dusun'] = $dusun;
        $_SESSION['untuk'] = $untuk;
        $_SESSION['mulai'] = $mulai;
        $_SESSION['sampai'] = $sampai;
        $_SESSION['date'] = $date;
        $_SESSION['ttdjabatan'] = $ttdjabatan;
        $_SESSION['ttdnama'] = $ttdnama;

        require_once '../vendor/autoload.php';


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/template/skck.docx');
        $templateProcessor->setValues(
            [
                'klasifikasi' => $klasifikasi,
                'nourut' => $nourut,
                'tahun' => $tahun,
                'nama' => $nama,
                'kelamin' => $kelamin,
                'tempat' => $tempat,
                'ttl' => $ttl,
                'status' => $status,
                'agama' => $agama,
                'kebangsaan' => $kebangsaan,
                'pekerjaan' => $pekerjaan,
                'nik' => $nik,
                'rt' => $rt,
                'rw' => $rw,
                'dusun' => $dusun,
                'untuk' => $untuk,
                'mulai' => $mulai,
                'sampai' => $sampai,
                'date' => $date,
                'ttdjabatan' => $ttdjabatan,
                'ttdnama' => $ttdnama,
            ]
        );

        $pathToSave = '../public/hasil/hasil_skck.docx';
        $templateProcessor->saveAs($pathToSave);
        $nourutbaru = $nourut + 1;
        $nourutbaru = "0$nourutbaru";

        $save = $this->SuratModel->save([
            'id' => $this->request->getVar('id'),
            'surat' => $this->request->getVar('surat'),
            'slug' => $this->request->getVar('slug'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'nourut' => $nourutbaru
        ]);
        $saveRiwayat = $this->RiwayatModel->save([
            'nama' => $nama,
            'namasurat' => $this->request->getVar('surat'),
            'nourut' => $nourutbaru
        ]);

        $data = [
            'title' => 'skck',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('surat/skck/hasilskck', $data);
    }





    public function sktm()
    {
        $slug = $this->request->getVar('slug');
        $data = [
            'title' => 'SKTM',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda(),
            'surat' => $this->SuratModel->getSurat($slug)
        ];
        return view('surat/sktm/sktm', $data);
    }
    public function isisktm()
    {
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        // dd($this->request->getVar());
        $klasifikasi = $this->request->getVar('klasifikasi');
        $nourut = $this->request->getVar('nourut');
        $nama = $this->request->getVar('nama');
        $kelamin = $this->request->getVar('kelamin');
        $tempat = $this->request->getVar('tempat');
        $ttl = $this->request->getVar('ttl');
        $_SESSION['ttl'] = $ttl;
        $ttld = date('d', strtotime($ttl));
        $ttlm = date('m', strtotime($ttl));
        $ttly = date('Y', strtotime($ttl));
        $ttl = "$ttld $monthList[$ttlm] $ttly";
        $status = $this->request->getVar('status');
        $pekerjaan = $this->request->getVar('pekerjaan');
        $kwn = $this->request->getVar('kwn');
        $agama = $this->request->getVar('agama');
        $rt = $this->request->getVar('rt');
        $rw = $this->request->getVar('rw');
        if ($rw == '001' or $rw == '002') {
            $dusun = 'Tempuran';
        } else if ($rw == '003') {
            $dusun = 'Bulakan';
        } else if ($rw == '004' or $rw == '005') {
            $dusun = 'Munggur';
        } else if ($rw == '006' or $rw == '007') {
            $dusun = 'Tempurejo';
        } else if ($rw == '008' or $rw == '009') {
            $dusun = 'Melikan';
        } else if ($rw == '010' or $rw == '011') {
            $dusun = 'Bendo';
        } else if ($rw == '012' or $rw == '013') {
            $dusun = 'Jegolan';
        } else {
            $dusun = '...';
        }
        $namaanak = $this->request->getVar('namaanak');
        $kelaminanak = $this->request->getVar('kelaminanak');
        $tempatanak = $this->request->getVar('tempatanak');
        $ttlanak = $this->request->getVar('ttlanak');
        $_SESSION['ttlanak'] = $ttlanak;
        $ttlanakd = date('d', strtotime($ttlanak));
        $ttlanakm = date('m', strtotime($ttlanak));
        $ttlanaky = date('Y', strtotime($ttlanak));
        $ttlanak = "$ttlanakd $monthList[$ttlanakm] $ttlanaky";
        $pekerjaananak = $this->request->getVar('pekerjaananak');
        $rtanak = $this->request->getVar('rtanak');
        $rwanak = $this->request->getVar('rwanak');
        if ($rwanak == '001' or $rwanak == '002') {
            $dusunanak = 'Tempuran';
        } else if ($rwanak == '003') {
            $dusunanak = 'Bulakan';
        } else if ($rwanak == '004' or $rwanak == '005') {
            $dusunanak = 'Munggur';
        } else if ($rwanak == '006' or $rwanak == '007') {
            $dusunanak = 'Tempurejo';
        } else if ($rwanak == '008' or $rwanak == '009') {
            $dusunanak = 'Melikan';
        } else if ($rwanak == '010' or $rwanak == '011') {
            $dusunanak = 'Bendo';
        } else if ($rwanak == '012' or $rwanak == '013') {
            $dusunanak = 'Jegolan';
        } else {
            $dusun = '...';
        }
        $keterangan = $this->request->getVar('keterangan');
        date_default_timezone_set('Asia/Jakarta');
        $d = date("d");
        $m = date("m");
        $y = date("Y");
        $date = "$d $monthList[$m] $y";
        $tahun = date("Y");
        $ttdnama = $this->request->getVar('ttdnama');
        $ttdjabatan = $this->request->getVar('ttdjabatan');
        if ($ttdjabatan != 'Kepala Desa Tempuran') {
            $ttdjabatan = "An. Kepala Desa Tempuran, $ttdjabatan";
        }

        $_SESSION['klasifikasi'] = $klasifikasi;
        $_SESSION['nourut'] = $nourut;
        $_SESSION['tahun'] = $tahun;
        $_SESSION['nama'] = $nama;
        $_SESSION['kelamin'] = $kelamin;
        $_SESSION['tempat'] = $tempat;
        $_SESSION['status'] = $status;
        $_SESSION['pekerjaan'] = $pekerjaan;
        $_SESSION['kwn'] = $kwn;
        $_SESSION['agama'] = $agama;
        $_SESSION['rt'] = $rt;
        $_SESSION['rw'] = $rw;
        $_SESSION['dusun'] = $dusun;
        $_SESSION['namaanak'] = $namaanak;
        $_SESSION['kelaminanak'] = $kelaminanak;
        $_SESSION['tempatanak'] = $tempatanak;
        $_SESSION['pekerjaananak'] = $pekerjaananak;
        $_SESSION['rtanak'] = $rtanak;
        $_SESSION['rwanak'] = $rwanak;
        $_SESSION['dusunanak'] = $dusunanak;
        $_SESSION['keterangan'] = $keterangan;
        $_SESSION['date'] = $date;
        $_SESSION['ttdjabatan'] = $ttdjabatan;
        $_SESSION['ttdnama'] = $ttdnama;

        require_once '../vendor/autoload.php';


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/template/sktm.docx');
        $templateProcessor->setValues(
            [
                'klasifikasi' => $klasifikasi,
                'nourut' => $nourut,
                'tahun' => $tahun,
                'nama' => $nama,
                'kelamin' => $kelamin,
                'tempat' => $tempat,
                'ttl' => $ttl,
                'status' => $status,
                'pekerjaan' => $pekerjaan,
                'kwn' => $kwn,
                'agama' => $agama,
                'rt' => $rt,
                'rw' => $rw,
                'dusun' => $dusun,
                'namaanak' => $namaanak,
                'kelaminanak' => $kelaminanak,
                'tempatanak' => $tempatanak,
                'ttlanak' => $ttlanak,
                'pekerjaananak' => $pekerjaananak,
                'rtanak' => $rtanak,
                'rwanak' => $rwanak,
                'dusunanak' => $dusunanak,
                'keterangan' => $keterangan,
                'date' => $date,
                'ttdjabatan' => $ttdjabatan,
                'ttdnama' => $ttdnama,
            ]
        );

        $pathToSave = '../public/hasil/hasil_sktm.docx';
        $templateProcessor->saveAs($pathToSave);
        $nourutbaru = $nourut + 1;
        $nourutbaru = "0$nourutbaru";

        $save = $this->SuratModel->save([
            'id' => $this->request->getVar('id'),
            'surat' => $this->request->getVar('surat'),
            'slug' => $this->request->getVar('slug'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'nourut' => $nourutbaru
        ]);
        $saveRiwayat = $this->RiwayatModel->save([
            'nama' => $nama,
            'namasurat' => $this->request->getVar('surat'),
            'nourut' => $nourutbaru
        ]);

        $data = [
            'title' => 'sktm',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('surat/sktm/hasilsktm', $data);
    }





    public function sppd()
    {
        $slug = $this->request->getVar('slug');
        $data = [
            'title' => 'SPPD',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda(),
            'surat' => $this->SuratModel->getSurat($slug)
        ];
        return view('surat/sppd/sppd', $data);
    }
    public function isisppd()
    {
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        // dd($this->request->getVar());
        $klasifikasi = $this->request->getVar('klasifikasi');
        $nourut = $this->request->getVar('nourut');
        $nama = $this->request->getVar('nama');
        $jabatan = $this->request->getVar('jabatan');
        $jabatan = str_replace("&", "dan", "$jabatan");
        $pengikut = $this->request->getVar('pengikut');
        $dari = $this->request->getVar('dari');
        $ke = $this->request->getVar('ke');
        $transportasi = $this->request->getVar('transportasi');
        $selama = $this->request->getVar('selama');
        $daritanggal = $this->request->getVar('daritanggal');
        $_SESSION['daritanggal'] = $daritanggal;
        $daritanggald = date('d', strtotime($daritanggal));
        $daritanggalm = date('m', strtotime($daritanggal));
        $daritanggaly = date('Y', strtotime($daritanggal));
        $daritanggal = "$daritanggald $monthList[$daritanggalm] $daritanggaly";
        $maksud = $this->request->getVar('maksud');
        $atasbebananggaran = $this->request->getVar('atasbebananggaran');
        $berangkatdari = $this->request->getVar('berangkatdari');
        $tempatkedudukan = $this->request->getVar('tempatkedudukan');
        $tempattujuan = $this->request->getVar('tempattujuan');
        $kecamatankabupaten = $this->request->getVar('kecamatankabupaten');
        date_default_timezone_set('Asia/Jakarta');
        $d = date("d");
        $m = date("m");
        $y = date("Y");
        $date = "$d $monthList[$m] $y";
        $tahun = date("Y");
        $ttdnama = $this->request->getVar('ttdnama');
        $ttdjabatan = $this->request->getVar('ttdjabatan');
        if ($ttdjabatan != 'Kepala Desa Tempuran') {
            $ttdjabatan = "An. Kepala Desa Tempuran, $ttdjabatan";
        }

        $_SESSION['klasifikasi'] = $klasifikasi;
        $_SESSION['nourut'] = $nourut;
        $_SESSION['tahun'] = $tahun;
        $_SESSION['nama'] = $nama;
        $_SESSION['jabatan'] = $jabatan;
        $_SESSION['pengikut'] = $pengikut;
        $_SESSION['dari'] = $dari;
        $_SESSION['ke'] = $ke;
        $_SESSION['transportasi'] = $transportasi;
        $_SESSION['selama'] = $selama;
        $_SESSION['maksud'] = $maksud;
        $_SESSION['atasbebananggaran'] = $atasbebananggaran;
        $_SESSION['berangkatdari'] = $berangkatdari;
        $_SESSION['tempatkedudukan'] = $tempatkedudukan;
        $_SESSION['tempattujuan'] = $tempattujuan;
        $_SESSION['kecamatankabupaten'] = $kecamatankabupaten;
        $_SESSION['date'] = $date;
        $_SESSION['ttdjabatan'] = $ttdjabatan;
        $_SESSION['ttdnama'] = $ttdnama;

        require_once '../vendor/autoload.php';


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/template/sppd.docx');
        $templateProcessor->setValues(
            [
                'klasifikasi' => $klasifikasi,
                'nourut' => $nourut,
                'tahun' => $tahun,
                'nama' => $nama,
                'jabatan' => $jabatan,
                'pengikut' => $pengikut,
                'dari' => $dari,
                'ke' => $ke,
                'transportasi' => $transportasi,
                'selama' => $selama,
                'daritanggal' => $daritanggal,
                'maksud' => $maksud,
                'atasbebananggaran' => $atasbebananggaran,
                'berangkatdari' => $berangkatdari,
                'tempatkedudukan' => $tempatkedudukan,
                'tempattujuan' => $tempattujuan,
                'kecamatankabupaten' => $kecamatankabupaten,
                'date' => $date,
                'ttdjabatan' => $ttdjabatan,
                'ttdnama' => $ttdnama,
            ]
        );

        $pathToSave = '../public/hasil/hasil_sppd.docx';
        $templateProcessor->saveAs($pathToSave);
        $nourutbaru = $nourut + 1;
        $nourutbaru = "0$nourutbaru";

        $save = $this->SuratModel->save([
            'id' => $this->request->getVar('id'),
            'surat' => $this->request->getVar('surat'),
            'slug' => $this->request->getVar('slug'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'nourut' => $nourutbaru
        ]);
        $saveRiwayat = $this->RiwayatModel->save([
            'nama' => $nama,
            'namasurat' => $this->request->getVar('surat'),
            'nourut' => $nourutbaru
        ]);

        $data = [
            'title' => 'sppd',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('surat/sppd/hasilsppd', $data);
    }




    public function kuasa()
    {
        $data = [
            'title' => 'Surat kuasa',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda(),
            'surat' => $this->SuratModel->getSurat()
        ];
        return view('surat/kuasa/kuasa', $data);
    }
    public function isikuasa()
    {
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        // dd($this->request->getVar());
        $nama = $this->request->getVar('nama');
        $tempat = $this->request->getVar('tempat');
        $ttl = $this->request->getVar('ttl');
        $_SESSION['ttl'] = $ttl;
        $ttld = date('d', strtotime($ttl));
        $ttlm = date('m', strtotime($ttl));
        $ttly = date('Y', strtotime($ttl));
        $ttl = "$ttld $monthList[$ttlm] $ttly";
        $kelamin = $this->request->getVar('kelamin');
        $pekerjaan = $this->request->getVar('pekerjaan');
        $nohp = $this->request->getVar('nohp');
        $rt = $this->request->getVar('rt');
        $rw = $this->request->getVar('rw');
        if ($rw == '001' or $rw == '002') {
            $dusun = 'Tempuran';
        } else if ($rw == '003') {
            $dusun = 'Bulakan';
        } else if ($rw == '004' or $rw == '005') {
            $dusun = 'Munggur';
        } else if ($rw == '006' or $rw == '007') {
            $dusun = 'Tempurejo';
        } else if ($rw == '008' or $rw == '009') {
            $dusun = 'Melikan';
        } else if ($rw == '010' or $rw == '011') {
            $dusun = 'Bendo';
        } else if ($rw == '012' or $rw == '013') {
            $dusun = 'Jegolan';
        } else {
            $dusun = '...';
        }
        $nama2 = $this->request->getVar('nama2');
        $tempat2 = $this->request->getVar('tempat2');
        $ttl2 = $this->request->getVar('ttl2');
        $_SESSION['ttl2'] = $ttl2;
        $ttl2d = date('d', strtotime($ttl2));
        $ttl2m = date('m', strtotime($ttl2));
        $ttl2y = date('Y', strtotime($ttl2));
        $ttl2 = "$ttl2d $monthList[$ttl2m] $ttl2y";
        $kelamin2 = $this->request->getVar('kelamin2');
        $pekerjaan2 = $this->request->getVar('pekerjaan2');
        $nohp2 = $this->request->getVar('nohp2');
        $rt2 = $this->request->getVar('rt2');
        $rw2 = $this->request->getVar('rw2');
        if ($rw2 == '001' or $rw2 == '002') {
            $dusun2 = 'Tempuran';
        } else if ($rw2 == '003') {
            $dusun2 = 'Bulakan';
        } else if ($rw2 == '004' or $rw2 == '005') {
            $dusun2 = 'Munggur';
        } else if ($rw2 == '006' or $rw2 == '007') {
            $dusun2 = 'Tempurejo';
        } else if ($rw2 == '008' or $rw2 == '009') {
            $dusun2 = 'Melikan';
        } else if ($rw2 == '010' or $rw2 == '011') {
            $dusun2 = 'Bendo';
        } else if ($rw2 == '012' or $rw2 == '013') {
            $dusun2 = 'Jegolan';
        } else {
            $dusun = '...';
        }
        $keterangan = $this->request->getVar('keterangan');
        date_default_timezone_set('Asia/Jakarta');
        $d = date("d");
        $m = date("m");
        $y = date("Y");
        $date = "$d $monthList[$m] $y";
        $ttdnama = $this->request->getVar('ttdnama');
        $ttdjabatan = $this->request->getVar('ttdjabatan');
        if ($ttdjabatan != 'Kepala Desa Tempuran') {
            $ttdjabatan = "An. Kepala Desa Tempuran, $ttdjabatan";
        }

        $_SESSION['nama'] = $nama;
        $_SESSION['tempat'] = $tempat;
        $_SESSION['kelamin'] = $kelamin;
        $_SESSION['pekerjaan'] = $pekerjaan;
        $_SESSION['nohp'] = $nohp;
        $_SESSION['rt'] = $rt;
        $_SESSION['rw'] = $rw;
        $_SESSION['dusun'] = $dusun;
        $_SESSION['nama2'] = $nama2;
        $_SESSION['tempat2'] = $tempat2;
        $_SESSION['kelamin2'] = $kelamin2;
        $_SESSION['pekerjaan2'] = $pekerjaan2;
        $_SESSION['nohp2'] = $nohp2;
        $_SESSION['rt2'] = $rt2;
        $_SESSION['rw2'] = $rw2;
        $_SESSION['dusun2'] = $dusun2;
        $_SESSION['keterangan'] = $keterangan;
        $_SESSION['date'] = $date;
        $_SESSION['ttdjabatan'] = $ttdjabatan;
        $_SESSION['ttdnama'] = $ttdnama;

        require_once '../vendor/autoload.php';


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/template/kuasa.docx');
        $templateProcessor->setValues(
            [
                'nama' => $nama,
                'tempat' => $tempat,
                'ttl' => $ttl,
                'kelamin' => $kelamin,
                'pekerjaan' => $pekerjaan,
                'nohp' => $nohp,
                'rt' => $rt,
                'rw' => $rw,
                'dusun' => $dusun,
                'nama2' => $nama2,
                'tempat2' => $tempat2,
                'ttl2' => $ttl2,
                'kelamin2' => $kelamin2,
                'pekerjaan2' => $pekerjaan2,
                'nohp2' => $nohp2,
                'rt2' => $rt2,
                'rw2' => $rw2,
                'dusun2' => $dusun2,
                'keterangan' => $keterangan,
                'date' => $date,
                'ttdjabatan' => $ttdjabatan,
                'ttdnama' => $ttdnama,
            ]
        );

        $pathToSave = '../public/hasil/hasil_kuasa.docx';
        $templateProcessor->saveAs($pathToSave);

        $saveRiwayat = $this->RiwayatModel->save([
            'nama' => $nama,
            'namasurat' => $this->request->getVar('surat'),
            'nourut' => '-'
        ]);

        $data = [
            'title' => 'kuasa',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('surat/kuasa/hasilkuasa', $data);
    }





    public function keteranganlain()
    {
        $slug = $this->request->getVar('slug');
        $data = [
            'title' => 'SK Lain-lain',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda(),
            'surat' => $this->SuratModel->getSurat($slug)
        ];
        return view('surat/keteranganlain/keteranganlain', $data);
    }
    public function isiketeranganlain()
    {
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        // dd($this->request->getVar());
        $klasifikasi = $this->request->getVar('klasifikasi');
        $nourut = $this->request->getVar('nourut');
        $nama = $this->request->getVar('nama');
        $tempat = $this->request->getVar('tempat');
        $ttl = $this->request->getVar('ttl');
        $_SESSION['ttl'] = $ttl;
        $ttld = date('d', strtotime($ttl));
        $ttlm = date('m', strtotime($ttl));
        $ttly = date('Y', strtotime($ttl));
        $ttl = "$ttld $monthList[$ttlm] $ttly";
        $nik = $this->request->getVar('nik');
        $kelamin = $this->request->getVar('kelamin');
        $pekerjaan = $this->request->getVar('pekerjaan');
        $agama = $this->request->getVar('agama');
        $kwn = $this->request->getVar('kwn');
        $rt = $this->request->getVar('rt');
        $rw = $this->request->getVar('rw');
        if ($rw == '001' or $rw == '002') {
            $dusun = 'Tempuran';
        } else if ($rw == '003') {
            $dusun = 'Bulakan';
        } else if ($rw == '004' or $rw == '005') {
            $dusun = 'Munggur';
        } else if ($rw == '006' or $rw == '007') {
            $dusun = 'Tempurejo';
        } else if ($rw == '008' or $rw == '009') {
            $dusun = 'Melikan';
        } else if ($rw == '010' or $rw == '011') {
            $dusun = 'Bendo';
        } else if ($rw == '012' or $rw == '013') {
            $dusun = 'Jegolan';
        } else {
            $dusun = '-';
        }
        $keterangan = $this->request->getVar('keterangan');
        date_default_timezone_set('Asia/Jakarta');
        $d = date("d");
        $m = date("m");
        $y = date("Y");
        $date = "$d $monthList[$m] $y";
        $tahun = date("Y");
        $ttdnama = $this->request->getVar('ttdnama');
        $ttdjabatan = $this->request->getVar('ttdjabatan');
        if ($ttdjabatan != 'Kepala Desa Tempuran') {
            $ttdjabatan = "An. Kepala Desa Tempuran, $ttdjabatan";
        }

        $_SESSION['klasifikasi'] = $klasifikasi;
        $_SESSION['nourut'] = $nourut;
        $_SESSION['tahun'] = $tahun;
        $_SESSION['nama'] = $nama;
        $_SESSION['tempat'] = $tempat;
        $_SESSION['nik'] = $nik;
        $_SESSION['kelamin'] = $kelamin;
        $_SESSION['pekerjaan'] = $pekerjaan;
        $_SESSION['agama'] = $agama;
        $_SESSION['kwn'] = $kwn;
        $_SESSION['rt'] = $rt;
        $_SESSION['rw'] = $rw;
        $_SESSION['dusun'] = $dusun;
        $_SESSION['keterangan'] = $keterangan;
        $_SESSION['date'] = $date;
        $_SESSION['ttdjabatan'] = $ttdjabatan;
        $_SESSION['ttdnama'] = $ttdnama;

        require_once '../vendor/autoload.php';


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/template/keteranganlain.docx');
        $templateProcessor->setValues(
            [
                'klasifikasi' => $klasifikasi,
                'nourut' => $nourut,
                'tahun' => $tahun,
                'nama' => $nama,
                'tempat' => $tempat,
                'ttl' => $ttl,
                'nik' => $nik,
                'kelamin' => $kelamin,
                'pekerjaan' => $pekerjaan,
                'agama' => $agama,
                'kwn' => $kwn,
                'rt' => $rt,
                'rw' => $rw,
                'dusun' => $dusun,
                'keterangan' => $keterangan,
                'date' => $date,
                'ttdjabatan' => $ttdjabatan,
                'ttdnama' => $ttdnama,
            ]
        );

        $pathToSave = '../public/hasil/hasil_keteranganlain.docx';
        $templateProcessor->saveAs($pathToSave);
        $nourutbaru = $nourut + 1;
        $nourutbaru = "0$nourutbaru";

        $save = $this->SuratModel->save([
            'id' => $this->request->getVar('id'),
            'surat' => $this->request->getVar('surat'),
            'slug' => $this->request->getVar('slug'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'nourut' => $nourutbaru
        ]);
        $saveRiwayat = $this->RiwayatModel->save([
            'nama' => $nama,
            'namasurat' => $this->request->getVar('surat'),
            'nourut' => $nourutbaru
        ]);

        $data = [
            'title' => 'keteranganlain',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('surat/keteranganlain/hasilketeranganlain', $data);
    }





    public function usaha()
    {
        $slug = $this->request->getVar('slug');
        $data = [
            'title' => 'SK Usaha',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda(),
            'surat' => $this->SuratModel->getSurat($slug)
        ];
        return view('surat/usaha/usaha', $data);
    }
    public function isiusaha()
    {
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        // dd($this->request->getVar());
        $klasifikasi = $this->request->getVar('klasifikasi');
        $nourut = $this->request->getVar('nourut');
        $nama = $this->request->getVar('nama');
        $tempat = $this->request->getVar('tempat');
        $ttl = $this->request->getVar('ttl');
        $ttld = date('d', strtotime($ttl));
        $ttlm = date('m', strtotime($ttl));
        $ttly = date('Y', strtotime($ttl));
        $ttl = "$ttld $monthList[$ttlm] $ttly";
        $nik = $this->request->getVar('nik');
        $kelamin = $this->request->getVar('kelamin');
        $agama = $this->request->getVar('agama');
        $agama = $this->request->getVar('agama');
        $status = $this->request->getVar('status');
        $pekerjaan = $this->request->getVar('pekerjaan');
        $rt = $this->request->getVar('rt');
        $rw = $this->request->getVar('rw');
        if ($rw == '001' or $rw == '002') {
            $dusun = 'Tempuran';
        } else if ($rw == '003') {
            $dusun = 'Bulakan';
        } else if ($rw == '004' or $rw == '005') {
            $dusun = 'Munggur';
        } else if ($rw == '006' or $rw == '007') {
            $dusun = 'Tempurejo';
        } else if ($rw == '008' or $rw == '009') {
            $dusun = 'Melikan';
        } else if ($rw == '010' or $rw == '011') {
            $dusun = 'Bendo';
        } else if ($rw == '012' or $rw == '013') {
            $dusun = 'Jegolan';
        } else {
            $dusun = '-';
        }
        $namausaha = $this->request->getVar('namausaha');
        $lokasiusaha = $this->request->getVar('lokasiusaha');
        date_default_timezone_set('Asia/Jakarta');
        $d = date("d");
        $m = date("m");
        $y = date("Y");
        $date = "$d $monthList[$m] $y";
        $tahun = date("Y");
        $ttdnama = $this->request->getVar('ttdnama');
        $ttdjabatan = $this->request->getVar('ttdjabatan');
        if ($ttdjabatan != 'Kepala Desa Tempuran') {
            $ttdjabatan = "An. Kepala Desa Tempuran, $ttdjabatan";
        }

        $_SESSION['klasifikasi'] = $klasifikasi;
        $_SESSION['nourut'] = $nourut;
        $_SESSION['tahun'] = $tahun;
        $_SESSION['nama'] = $nama;
        $_SESSION['tempat'] = $tempat;
        $_SESSION['ttl'] = $ttl;
        $_SESSION['nik'] = $nik;
        $_SESSION['kelamin'] = $kelamin;
        $_SESSION['agama'] = $agama;
        $_SESSION['status'] = $status;
        $_SESSION['pekerjaan'] = $pekerjaan;
        $_SESSION['rt'] = $rt;
        $_SESSION['rw'] = $rw;
        $_SESSION['dusun'] = $dusun;
        $_SESSION['namausaha'] = $namausaha;
        $_SESSION['lokasiusaha'] = $lokasiusaha;
        $_SESSION['date'] = $date;
        $_SESSION['ttdjabatan'] = $ttdjabatan;
        $_SESSION['ttdnama'] = $ttdnama;

        require_once '../vendor/autoload.php';


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/template/usaha.docx');
        $templateProcessor->setValues(
            [
                'klasifikasi' => $klasifikasi,
                'nourut' => $nourut,
                'tahun' => $tahun,
                'nama' => $nama,
                'tempat' => $tempat,
                'ttl' => $ttl,
                'nik' => $nik,
                'kelamin' => $kelamin,
                'agama' => $agama,
                'status' => $status,
                'pekerjaan' => $pekerjaan,
                'rt' => $rt,
                'rw' => $rw,
                'dusun' => $dusun,
                'namausaha' => $namausaha,
                'lokasiusaha' => $lokasiusaha,
                'date' => $date,
                'ttdjabatan' => $ttdjabatan,
                'ttdnama' => $ttdnama,
            ]
        );

        $pathToSave = '../public/hasil/hasil_usaha.docx';
        $templateProcessor->saveAs($pathToSave);
        $nourutbaru = $nourut + 1;
        $nourutbaru = "0$nourutbaru";

        $save = $this->SuratModel->save([
            'id' => $this->request->getVar('id'),
            'surat' => $this->request->getVar('surat'),
            'slug' => $this->request->getVar('slug'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'nourut' => $nourutbaru
        ]);
        $saveRiwayat = $this->RiwayatModel->save([
            'nama' => $nama,
            'namasurat' => $this->request->getVar('surat'),
            'nourut' => $nourutbaru
        ]);

        $data = [
            'title' => 'SK usaha',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('surat/usaha/hasilusaha', $data);
    }




    public function perintahtugas()
    {
        $slug = $this->request->getVar('slug');
        $data = [
            'title' => 'Surat Perintah Tugas',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda(),
            'surat' => $this->SuratModel->getSurat($slug)
        ];
        return view('surat/perintahtugas/perintahtugas', $data);
    }
    public function isiperintahtugas()
    {
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        // dd($this->request->getVar());
        $klasifikasi = $this->request->getVar('klasifikasi');
        $nourut = $this->request->getVar('nourut');
        $nama = $this->request->getVar('nama');
        $alamat = $this->request->getVar('alamat');
        $jabatan = $this->request->getVar('jabatan');
        $jabatan = str_replace("&", "dan", "$jabatan");
        $keterangan = $this->request->getVar('keterangan');
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        $mulai = $this->request->getVar('mulai');
        $_SESSION['mulai'] = $mulai;
        $harimulai = date('D', strtotime($mulai));
        $harimulai = $dayList[$harimulai];
        $selesai = $this->request->getVar('selesai');
        $_SESSION['selesai'] = $selesai;
        $hariselesai = date('D', strtotime($selesai));
        $hariselesai = $dayList[$hariselesai];
        $tglmulai = date('d', strtotime($mulai));
        $tglselesai = date('d', strtotime($selesai));
        $mselesai = date('m', strtotime($selesai));
        $yselesai = date('Y', strtotime($selesai));
        $tglselesai = "$tglselesai $monthList[$mselesai] $yselesai";
        $tempat = $this->request->getVar('tempat');
        $jam = $this->request->getVar('jam');
        date_default_timezone_set('Asia/Jakarta');
        $d = date("d");
        $m = date("m");
        $y = date("Y");
        $date = "$d $monthList[$m] $y";
        $tahun = date("Y");
        $ttdnama = $this->request->getVar('ttdnama');
        $ttdjabatan = $this->request->getVar('ttdjabatan');
        if ($ttdjabatan != 'Kepala Desa Tempuran') {
            $ttdjabatan = "An. Kepala Desa Tempuran, $ttdjabatan";
        }

        $_SESSION['klasifikasi'] = $klasifikasi;
        $_SESSION['nourut'] = $nourut;
        $_SESSION['tahun'] = $tahun;
        $_SESSION['ttdjabatan'] = $ttdjabatan;
        $_SESSION['ttdnama'] = $ttdnama;
        $_SESSION['nama'] = $nama;
        $_SESSION['alamat'] = $alamat;
        $_SESSION['jabatan'] = $jabatan;
        $_SESSION['keterangan'] = $keterangan;
        $_SESSION['harimulai'] = $harimulai;
        $_SESSION['hariselesai'] = $hariselesai;
        $_SESSION['tglmulai'] = $tglmulai;
        $_SESSION['tglselesai'] = $tglselesai;
        $_SESSION['tempat'] = $tempat;
        $_SESSION['jam'] = $jam;
        $_SESSION['date'] = $date;

        require_once '../vendor/autoload.php';


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/template/perintahtugas.docx');
        $templateProcessor->setValues(
            [
                'klasifikasi' => $klasifikasi,
                'nourut' => $nourut,
                'tahun' => $tahun,
                'ttdjabatan' => $ttdjabatan,
                'ttdnama' => $ttdnama,
                'nama' => $nama,
                'alamat' => $alamat,
                'jabatan' => $jabatan,
                'keterangan' => $keterangan,
                'harimulai' => $harimulai,
                'hariselesai' => $hariselesai,
                'tglmulai' => $tglmulai,
                'tglselesai' => $tglselesai,
                'tempat' => $tempat,
                'jam' => $jam,
                'date' => $date,
            ]
        );

        $pathToSave = '../public/hasil/hasil_perintahtugas.docx';
        $templateProcessor->saveAs($pathToSave);
        $nourutbaru = $nourut + 1;
        $nourutbaru = "0$nourutbaru";

        $save = $this->SuratModel->save([
            'id' => $this->request->getVar('id'),
            'surat' => $this->request->getVar('surat'),
            'slug' => $this->request->getVar('slug'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'nourut' => $nourutbaru
        ]);
        $saveRiwayat = $this->RiwayatModel->save([
            'nama' => $nama,
            'namasurat' => $this->request->getVar('surat'),
            'nourut' => $nourutbaru
        ]);

        $data = [
            'title' => 'Perintah Tugas',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('surat/perintahtugas/hasilperintahtugas', $data);
    }





    public function pernyataanmiskin()
    {
        $slug = $this->request->getVar('slug');
        $data = [
            'title' => 'Surat Pernyataan Miskin',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda(),
            'surat' => $this->SuratModel->getSurat($slug)
        ];
        return view('surat/pernyataanmiskin/pernyataanmiskin', $data);
    }
    public function isipernyataanmiskin()
    {
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        // dd($this->request->getVar());
        $klasifikasi = $this->request->getVar('klasifikasi');
        $nourut = $this->request->getVar('nourut');
        $nama = $this->request->getVar('nama');
        $tempat = $this->request->getVar('tempat');
        $ttl = $this->request->getVar('ttl');
        $_SESSION['ttl'] = $ttl;
        $ttld = date('d', strtotime($ttl));
        $ttlm = date('m', strtotime($ttl));
        $ttly = date('Y', strtotime($ttl));
        $ttl = "$ttld $monthList[$ttlm] $ttly";
        $kelamin = $this->request->getVar('kelamin');
        $pekerjaan = $this->request->getVar('pekerjaan');
        $rt = $this->request->getVar('rt');
        $rw = $this->request->getVar('rw');
        if ($rw == '001' or $rw == '002') {
            $dusun = 'Tempuran';
        } else if ($rw == '003') {
            $dusun = 'Bulakan';
        } else if ($rw == '004' or $rw == '005') {
            $dusun = 'Munggur';
        } else if ($rw == '006' or $rw == '007') {
            $dusun = 'Tempurejo';
        } else if ($rw == '008' or $rw == '009') {
            $dusun = 'Melikan';
        } else if ($rw == '010' or $rw == '011') {
            $dusun = 'Bendo';
        } else if ($rw == '012' or $rw == '013') {
            $dusun = 'Jegolan';
        } else {
            $dusun = '-';
        }
        $untuk = $this->request->getVar('untuk');
        date_default_timezone_set('Asia/Jakarta');
        $d = date("d");
        $m = date("m");
        $y = date("Y");
        $date = "$d $monthList[$m] $y";
        $tahun = date("Y");
        $ttdnama = $this->request->getVar('ttdnama');
        $ttdjabatan = $this->request->getVar('ttdjabatan');
        if ($ttdjabatan != 'Kepala Desa Tempuran') {
            $ttdjabatan = "An. Kepala Desa Tempuran, $ttdjabatan";
        }

        $_SESSION['klasifikasi'] = $klasifikasi;
        $_SESSION['nourut'] = $nourut;
        $_SESSION['tahun'] = $tahun;
        $_SESSION['nama'] = $nama;
        $_SESSION['tempat'] = $tempat;
        $_SESSION['kelamin'] = $kelamin;
        $_SESSION['pekerjaan'] = $pekerjaan;
        $_SESSION['rt'] = $rt;
        $_SESSION['rw'] = $rw;
        $_SESSION['dusun'] = $dusun;
        $_SESSION['untuk'] = $untuk;
        $_SESSION['date'] = $date;
        $_SESSION['ttdjabatan'] = $ttdjabatan;
        $_SESSION['ttdnama'] = $ttdnama;

        require_once '../vendor/autoload.php';


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/template/pernyataanmiskin.docx');
        $templateProcessor->setValues(
            [
                'klasifikasi' => $klasifikasi,
                'nourut' => $nourut,
                'tahun' => $tahun,
                'nama' => $nama,
                'tempat' => $tempat,
                'ttl' => $ttl,
                'kelamin' => $kelamin,
                'pekerjaan' => $pekerjaan,
                'rt' => $rt,
                'rw' => $rw,
                'dusun' => $dusun,
                'untuk' => $untuk,
                'date' => $date,
                'ttdjabatan' => $ttdjabatan,
                'ttdnama' => $ttdnama,
            ]
        );

        $pathToSave = '../public/hasil/hasil_pernyataanmiskin.docx';
        $templateProcessor->saveAs($pathToSave);
        $nourutbaru = $nourut + 1;
        $nourutbaru = "0$nourutbaru";

        $save = $this->SuratModel->save([
            'id' => $this->request->getVar('id'),
            'surat' => $this->request->getVar('surat'),
            'slug' => $this->request->getVar('slug'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'nourut' => $nourutbaru
        ]);
        $saveRiwayat = $this->RiwayatModel->save([
            'nama' => $nama,
            'namasurat' => $this->request->getVar('surat'),
            'nourut' => $nourutbaru
        ]);

        $data = [
            'title' => 'SK pernyataan miskin',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('surat/pernyataanmiskin/hasilpernyataanmiskin', $data);
    }





    public function undangan()
    {
        $slug = $this->request->getVar('slug');
        $data = [
            'title' => 'Surat Undangan',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda(),
            'surat' => $this->SuratModel->getSurat($slug)
        ];
        return view('surat/undangan/undangan', $data);
    }
    public function isiundangan()
    {
        // dd($this->request->getVar());
        $klasifikasi = $this->request->getVar('klasifikasi');
        $nourut = $this->request->getVar('nourut');
        $kepada = $this->request->getVar('kepada');
        $tanggal = $this->request->getVar('tanggal');
        $_SESSION['tanggal'] = $tanggal;
        date_default_timezone_set('Asia/Jakarta');
        $day = date('D', strtotime($tanggal));
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        $hari = $dayList[$day];
        $tgl = date('d', strtotime($tanggal));
        $month = date('m', strtotime($tanggal));
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        $bulan = $monthList[$month];
        $tahun2 = date('Y', strtotime($tanggal));
        $tanggal = "$tgl $bulan $tahun2";
        $d = date("d");
        $m = date("m");
        $tahun = date("Y");
        $date = "$d $monthList[$m] $tahun";
        $jam = $this->request->getVar('jam');
        $tempat = $this->request->getVar('tempat');
        $keperluan = $this->request->getVar('keperluan');
        $ttdnama = $this->request->getVar('ttdnama');
        $ttdjabatan = $this->request->getVar('ttdjabatan');
        if ($ttdjabatan != 'Kepala Desa Tempuran') {
            $ttdjabatan = "An. Kepala Desa Tempuran, $ttdjabatan";
        }

        $_SESSION['klasifikasi'] = $klasifikasi;
        $_SESSION['nourut'] = $nourut;
        $_SESSION['tahun'] = $tahun;
        $_SESSION['kepada'] = $kepada;
        $_SESSION['hari'] = $hari;
        $_SESSION['jam'] = $jam;
        $_SESSION['tempat'] = $tempat;
        $_SESSION['keperluan'] = $keperluan;
        $_SESSION['ttdjabatan'] = $ttdjabatan;
        $_SESSION['ttdnama'] = $ttdnama;

        require_once '../vendor/autoload.php';


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../public/template/undangan.docx');
        $templateProcessor->setValues(
            [
                'klasifikasi' => $klasifikasi,
                'nourut' => $nourut,
                'tahun' => $tahun,
                'kepada' => $kepada,
                'hari' => $hari,
                'tanggal' => $tanggal,
                'jam' => $jam,
                'tempat' => $tempat,
                'keperluan' => $keperluan,
                'ttdjabatan' => $ttdjabatan,
                'ttdnama' => $ttdnama,
            ]
        );

        $pathToSave = '../public/hasil/hasil_undangan.docx';
        $templateProcessor->saveAs($pathToSave);
        $nourutbaru = $nourut + 1;
        $nourutbaru = "0$nourutbaru";

        $save = $this->SuratModel->save([
            'id' => $this->request->getVar('id'),
            'surat' => $this->request->getVar('surat'),
            'slug' => $this->request->getVar('slug'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'nourut' => $nourutbaru
        ]);
        $saveRiwayat = $this->RiwayatModel->save([
            'nama' => 'Desa',
            'namasurat' => $this->request->getVar('surat'),
            'nourut' => $nourutbaru
        ]);

        $data = [
            'title' => 'Undangan',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('surat/undangan/hasilundangan', $data);
    }
}
