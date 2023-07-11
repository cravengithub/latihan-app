<?php

namespace App\Http\Controllers;

use App\Models\RakBuku;
use Illuminate\Http\Response;
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
        $rm = $this->rules_messages();
        $validator = Validator::make($request->all(), $rm['rules'], $messages = $rm['messages']);
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

    private function rules_messages()
    {
        $rules = [
            'nama' => 'required |max:50',
            'lokasi' => 'required | max:5'
        ];
        $messages = [
            'required' => 'Kolom ini harus diisi.',
            'max' => 'Karakter yang diisi melebihi ketentuan.'
        ];
        $data = [
            'rules' => $rules,
            'messages' => $messages
        ];
        return $data;
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
        $rm = $this->rules_messages();
        $validator = Validator::make($request->all(), $rm['rules'], $messages = $rm['messages']);
        if ($validator->fails()) {
            return redirect('/rak_buku/' . $rakBuku->id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }
        $validated = $validator->validate();
        if ($validated) {
            $rakBuku->save();
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

    public function store_ajax(Request $request)
    {
        $rak = new RakBuku();
        $rak->nama = $request->input('nama');
        $rak->lokasi = $request->input('lokasi');
        $rak->keterangan = $request->input('keterangan');
        $json = Response::json_encode($rak);
        return $json;
    }
}
