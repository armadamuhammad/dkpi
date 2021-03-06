<?php

namespace App\Http\Controllers;

use App\Models\Pdln;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PdlnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Pdln::where('jenis', 'mahasiswa')->latest()->get();
        $dosen = Pdln::where('jenis', 'dosen')->latest()->get();
        $pimpinan = Pdln::where('jenis', 'pimpinan')->latest()->get();

        return view('pdln.index',[
            'mahasiswa' => $mahasiswa,
            'dosen' => $dosen,
            'pimpinan' => $pimpinan
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
        $file_surat_uns = $request->file('file_surat_uns')->store('file_surat_uns');
        $file_belmawa = $request->file('file_belmawa')->store('file_belmawa');
        $file_ktln = $request->file('file_ktln')->store('file_ktln');

        $validatedData = $request->validate([
            'jenis' => 'required',
            'nama' => 'required',
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

        Pdln::create($validatedData);

        return redirect('/mahasiswa')->with('success', 'Data berhasil ditambah!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pdln  $pdln
     * @return \Illuminate\Http\Response
     */
    public function show(Pdln $pdln)
    {
        return view('pdln.show', ['pdln' => $pdln]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pdln  $pdln
     * @return \Illuminate\Http\Response
     */
    public function edit(Pdln $pdln)
    {
        return view('pdln.edit',['pdln' => $pdln]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pdln  $pdln
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pdln $pdln)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pdln  $pdln
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pdln $pdln)
    {
        //
        Pdln::destroy($pdln);
        return redirect('/pdln');
    }
}
