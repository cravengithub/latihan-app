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
        return view('rak_buku.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RakBuku $rakBuku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RakBuku $rakBuku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RakBuku $rakBuku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RakBuku $rakBuku)
    {
        //
    }
}
