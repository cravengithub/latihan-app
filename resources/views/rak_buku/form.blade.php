@extends('layouts.app')
@section('title', 'Daftar Rak Buku')
@section('content')
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>
    <h2>{{ $store }} Data Rak Buku</h2>
    <form method="POST" action="{{ $action }}">
        @csrf
        @if (strtolower($store) == 'ubah')
            @method('PUT')
        @endif
        <input type="hidden" name="id" value="{{ $rak->id }}" />
        <input type="text" class="mail_text" name="nama" placeholder="Nama Rak" value="{{ $rak->nama }}" /><br>
        @error('nama')
            <b>{{ $message }}</b>
        @enderror
        <br>
        <input type="text" class="mail_text" name="lokasi" placeholder="Lokasi" value="{{ $rak->lokasi }}" /><br>
        @error('lokasi')
            <b>{{ $message }}</b>
        @enderror
        <br>
        <input type="text" class="mail_text" name="keterangan" placeholder="keterangan"
            value="{{ $rak->keterangan }}" /><br>
        <p><input type="text" id="datepicker" name="tanggal" placeholder="tanggal"></p>
        <input type="submit" value="{{ $store }}" />
        <div class="send_bt">
            <a href="{{ url('/rak_buku') }}">Kembali</a>
        </div>
    </form>
@endsection
