<?php

namespace App\Http\Controllers;

use App\Models\CV;
use App\Models\FAQ;
use App\Models\Pdln;
use App\Models\Dosen;
use App\Models\Mitra;
use App\Models\Berita;
use App\Models\Sekolah;
use App\Models\Pimpinan;
use App\Models\Mahasiswa;
use App\Models\Pemerintah;
use App\Models\Pengumuman;
use App\Models\JasaKeuangan;
use Illuminate\Http\Request;
use App\Models\Internasional;
use App\Http\Controllers\Controller;

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
        $yayasan = Mitra::where('instansi', 'yayasan')->latest()->get();
        $cv = Mitra::where('instansi', 'cv')->latest()->get();
        $internasional = Mitra::where('instansi', 'internasional')->latest()->get();
        $jasa_keuangan = Mitra::where('instansi', 'jasa_keuangan')->latest()->get();
        $pemerintah = Mitra::where('instansi', 'pemerintah')->latest()->get();


        return view('home.mitra',[
            'sekolah' => $yayasan,
            'cv' => $cv,
            'jasa_keuangan' => $jasa_keuangan,
            'internasional' => $internasional,
            'pemerintah' => $pemerintah
        ]);


    }

    public function pdln()
    {
        $mahasiswa = Pdln::where('jenis', 'mahasiswa')->latest()->get();
        $dosen = Pdln::where('jenis', 'dosen')->latest()->get();
        $pimpinan = Pdln::where('jenis', 'pimpinan')->latest()->get();


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
