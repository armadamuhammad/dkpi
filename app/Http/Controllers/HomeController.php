<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\Berita;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CV;
use App\Models\Dosen;
use App\Models\Internasional;
use App\Models\JasaKeuangan;
use App\Models\Mahasiswa;
use App\Models\Pemerintah;
use App\Models\Pimpinan;
use App\Models\Sekolah;

class HomeController extends Controller
{

    public function index()
    {
        $faq = FAQ::get();
        $pengumuman = Pengumuman::get();
        $berita = Berita::get();

        return view('home.index',[
            'title' => 'DKPI - UNS',
            'faq' => $faq,
            'pengumuman' => $pengumuman,
            'berita' => $berita
        ]);
    }

    public function mitra()
    {
        $sekolah = Sekolah::get();
        $cv = CV::get();
        $jasa_keuangan = JasaKeuangan::get();
        $internasional = Internasional::get();
        $pemerintah = Pemerintah::get();

        return view('home.mitra',[
            'sekolah' => $sekolah,
            'cv' => $cv,
            'jasa_keuangan' => $jasa_keuangan,
            'internasional' => $internasional,
            'pemerintah' => $pemerintah
        ]);


    }

    public function pdln()
    {
        $mahasiswa = Mahasiswa::get();
        $dosen = Dosen::get();
        $pimpinan = Pimpinan::get();

        return view('home.pdln',[
            'mahasiswa' => $mahasiswa,
            'dosen' => $dosen,
            'pimpinan' => $pimpinan
        ]);
    }

    public function layanan()
    {
        return view('home.layanan');
    }







}
