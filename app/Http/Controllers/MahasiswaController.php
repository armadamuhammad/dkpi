<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa =  Mahasiswa::get();
        return view('mahasiswa.index', [
            'mahasiswa'=> $mahasiswa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $file_surat_uns = $request->file('file_surat_uns');
        // $file_belmawa = $request->file('file_belmawa');
        // $file_ktln = $request->file('file_ktln');

        // $nama_file_surat_uns = time().'_'.$file_surat_uns->getClientOriginalName();
        // $nama_file_belmawa = time().'_'.$file_belmawa->getClientOriginalName();
        // $nama_file_ktln = time().'_'.$file_ktln->getClientOriginalName();

        // $tujuan_upload = 'data_file';
        // $file_surat_uns->move($tujuan_upload,$nama_file_surat_uns);
        // $file_belmawa->move($tujuan_upload,$nama_file_belmawa);
        // $file_ktln->move($tujuan_upload,$nama_file_ktln);

        // //coba upload cara baru
        $file_surat_uns = $request->file('file_surat_uns')->store('file_surat_uns');
        $file_belmawa = $request->file('file_belmawa')->store('file_belmawa');
        $file_ktln = $request->file('file_ktln')->store('file_ktln');

        // Mahasiswa::insert([
        //     'nama_mhs' => $request->nama_mhs,
        //     'jumlah_orang'=> $request->jumlah_orang,
        //     'unit_kerja'=> $request->unit_kerja,
        //     'jangka_waktu_awal'=>$request->jangka_waktu_awal,
            // 'jangka_waktu_akhir'=>$request->jangka_waktu_akhir,
            // 'tujuan'=>$request->tujuan,
            // 'negara'=>$request->negara,
            // 'surat_uns'=>$request->surat_uns,
            // 'catatan_uns'=>$request->catatan_uns,
            // 'belmawa'=>$request->belmawa,
            // 'catatan_belmawa'=>$request->catatan_belmawa,
        //     'ktln_kemensetneg'=>$request->ktln_kemensetneg,
        //     'catatan_setneg'=>$request->catatan_setneg,
        //     'file_surat_uns'=>$request->file_surat_uns,
        // 'file_belmawa'=>$request->file_belmawa,
        //     'file_ktln'=>$request->file_ktln,
        //     'status_hidden'=>$request->status_hidden,
        //     'status'=>$request->status
        // ]);

        $validatedData = $request->validate([
                'nama_mhs' => 'required',
                'jumlah_orang'=> 'required',
                'unit_kerja'=> 'required' ,
                'jangka_waktu_awal'=> 'required',
                'jangka_waktu_akhir'=> 'required',
                'tujuan'=> 'required',
                'negara'=> 'required',
                'surat_uns'=> 'required',
                'catatan_uns'=> 'required',
                'belmawa'=> 'required',
                'catatan_belmawa'=> 'required',
                'ktln_kemensetneg'=> 'required',
                'catatan_setneg'=> 'required',

                'status_hidden'=> 'required',
                'status'=> 'required'
              ]);
        $validatedData['file_surat_uns'] = $file_surat_uns;
        $validatedData['file_belmawa'] = $file_belmawa;
        $validatedData['file_ktln'] = $file_ktln;

        Mahasiswa::create($validatedData);

        return redirect('/mahasiswa')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        // $mahasiswa = Mahasiswa::where('id', $mahasiswa)->get();
        return view('mahasiswa.show', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        // $mahasiswas = DB::table('mahasiswas')->where('id',$id)->get();
        return view('mahasiswa.edit',['mahasiswa' => $mahasiswa]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validatedData = $request->validate([
            'nama_mhs' => 'reqiored',
                'jumlah_orang'=> 'required',
                'unit_kerja'=> 'required' ,
                'jangka_waktu_awal'=> 'required',
                'jangka_waktu_akhir'=> 'required',
                'tujuan'=> 'required',
                'negara'=> 'required',
                'surat_uns'=> 'required',
                'catatan_uns'=> 'required',
                'belmawa'=> 'required',
                'catatan_belmawa'=> 'required',
                'ktln_kemensetneg'=> 'required',
                'catatan_setneg'=> 'required',
                'file_surat_uns'=> 'required',
                'file_belmawa'=> 'required',
                'file_ktln'=> 'required',
                'status_hidden'=> 'required',
                'status'=> 'required'
              ]);

        Mahasiswa::where('id', $mahasiswa)
        ->update($validatedData);

        return redirect('/mahasiswa')->with('status', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //gmana sih ini caranya
        //keknya udah
        Mahasiswa::destroy($mahasiswa);
        return redirect('/mahasiswa');
    }
}
