@extends('layouts.app')
@section('title', 'Daftar Rak Buku')
@section('content')
    <h2>{{ $store }} Data Rak Buku</h2>
    <form>
        @csrf
        <input type="text" class="mail_text" name="nama" placeholder="Nama Rak" />
        <input type="text" class="mail_text" name="lokasi" placeholder="Lokasi" />
        <input type="text" class="mail_text" name="keterangan" placeholder="keterangan" />
        <textarea class="message-bt" rows="5" cols="30" name="keterangan"></textarea>
        <div class="send_bt">
            <input type="submit" value="Kirim" />
            <a href="/rak_buku/">Kembali</a>
        </div>

    </form>
@endsection
