<?php

namespace App\Http\Controllers;

use App\Models\RakBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RakBukuController extends Controller
{
    private function pre($arr = [])
    {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rak = RakBuku::all();
        return view('rak_buku.index', ['rak' => $rak]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['store'] = 'Input';
        $data['rak'] = new RakBuku();
        $data['action'] = url('rak_buku');
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
        $rules = [
            'nama' => 'required |max:50',
            'lokasi' => 'required | max:50'
        ];
        $msg = [
            'required' => 'Kolom ini harus diisi.',
            'max' => 'Karakter yang diisi tidak melebihi 50 huruf.'
        ];
        $validator = Validator::make($request->all(), $rules, $messages = $msg);
        if ($validator->fails()) {
            return redirect('/rak_buku/create')
                ->withErrors($validator)
                ->withInput();
        }
        $validated = $validator->validate();
        if ($validated) {
            $rak->save();
        }
        return redirect('/rak_buku');
    }

    private function validation($request, $redirect_path)
    {
        $rules = [
            'nama' => 'required |max:50',
            'lokasi' => 'required | max:50'
        ];
        $msg = [
            'required' => 'Kolom ini harus diisi.',
            'max' => 'Karakter yang diisi tidak melebihi 50 huruf.'
        ];
        $validator = Validator::make($request, $rules, $messages = $msg);
        if ($validator->fails()) {
            return redirect($redirect_path)
                ->withErrors($validator)
                ->withInput();
        }
        $validated = $validator->validate();
        return $validated;
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
        $data['action'] = url('rak_buku' . '/' . $rakBuku->id);
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
        $validated = $this->validation($request->all(), '/rak_buku/edit');
        if ($validated) {
            $rak->save();
        }
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