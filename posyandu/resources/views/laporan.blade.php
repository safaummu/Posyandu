@extends('main')

@section('content')

<h2>Laporan Balita</h2>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Nama</th>
        <th>Umur</th>
        <th>Berat</th>
        <th>Tinggi</th>
        <th>JK</th>
    </tr>

    @foreach($balitas as $b)
    <tr>
        <td>{{ $b->nama }}</td>
        <td>{{ $b->umur ?? '-' }}</td>
        <td>{{ $b->berat }}</td>
        <td>{{ $b->tinggi ?? '-' }}</td>
        <td>{{ $b->jk }}</td>
    </tr>
    @endforeach
</table>

@endsection