<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen =  Dosen::all();
        return view('dosen.index', ['dosen'=> $dosen]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Dosen::insert([
            'nama_dosen' => $request->nama_dosen,
            'jumlah_orang'=> $request->jumlah_orang,
            'unit_kerja'=> $request->unit_kerja,
            'jangka_waktu_awal'=>$request->jangka_waktu_awal,
            'jangka_waktu_akhir'=>$request->jangka_waktu_akhir,
            'tujuan'=>$request->tujuan,
            'negara'=>$request->negara,
            'surat_uns'=>$request->surat_uns,
            'catatan_uns'=>$request->catatan_uns,
            'sdi_dikti'=>$request->sdi_dikti,
            'catatan_sdi'=>$request->catatan_sdi,
            'ktln_kemensetneg'=>$request->ktln_kemensetneg,
            'catatan_setneg'=>$request->catatan_setneg,
            'file_surat_uns'=>$request->file_surat_uns,
            'file_sdi'=>$request->file_sdi,
            'file_ktln'=>$request->file_ktln,
            'status_hidden'=>$request->status_hidden,
            'status'=>$request->status
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        return view('dosen.show', ['dosen' => $dosen]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        //
        return view('dosen.edit', ['dosen' => $dosen]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect('/dosen');
    }
}
