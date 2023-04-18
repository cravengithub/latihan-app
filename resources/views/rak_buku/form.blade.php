@extends('layouts.app')
@section('title', 'Daftar Rak Buku')
@section('content')
    <h2>{{ $store }} Data Rak Buku</h2>
    <form method="POST">
        @csrf
        <input type="text" class="mail_text" name="nama" placeholder="Nama Rak" />
        <input type="text" class="mail_text" name="lokasi" placeholder="Lokasi" />
        <input type="text" class="mail_text" name="keterangan" placeholder="keterangan" />
        <input type="submit" value="Kirim" />
    </form>
@endsection
