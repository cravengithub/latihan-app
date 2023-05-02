@extends('layouts.app')
@section('title', 'Daftar Rak Buku')

@section('content')
    <h2>Daftar Rak Buku</h2>
    <div class="send_bt">
        <a href="{{ url('rak_buku/create') }}">Tambah</a>
    </div>
    <table>
        <tr>
            <th>No.</th>
            <th>ID</th>
            <th>Nama Rak</th>
            <th>Lokasi</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        @php
            $i = 1;
        @endphp
        @foreach ($rak as $r)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $r->id }}</td>
                <td>{{ $r->nama }}</td>
                <td>{{ $r->lokasi }}</td>
                <td>{{ $r->keterangan }}</td>
                <td>
                    <a href="rak_buku/{{ $r->id }}/edit">Edit</a>
                    <a href="rak_buku/{{ $r->id }}">Hapus</a>
                </td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
    </table>
@endsection
