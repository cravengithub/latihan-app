<?php

namespace App\Http\Controllers;

use App\Models\RakBuku;
use Illuminate\Http\Request;

class RakBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['rak'] = RakBuku::all();
        return view('rak_buku.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['store'] = 'Input';
        $data['rak'] = new RakBuku();
        return view('rak_buku.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rak = new RakBuku();
        $rak->nama = $request->input('nama');
        $rak->lokasi = $request->input('lokasi');
        $rak->keterangan = $request->input('keterangan');
        $rak->save();
        return redirect('/rak_buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(RakBuku $rakBuku)
    {
        return view('rak_buku.destroy', ['rak' => $rakBuku]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RakBuku $rakBuku)
    {
        $data['store'] = 'Ubah';
        $data['rak'] = $rakBuku;
        return view('rak_buku.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RakBuku $rakBuku)
    {
        $rakBuku->nama = $request->input('nama');
        $rakBuku->lokasi = $request->input('lokasi');
        $rakBuku->keterangan = $request->input('keterangan');
        $rakBuku->save();
        return redirect('/rak_buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RakBuku $rakBuku)
    {
        $rakBuku->delete();
        return redirect('/rak_buku');
    }
}
