@extends('main')

@section('content')

<h3>Laporan Balita (Admin Only)</h3>

<div class="table-responsive">
<table class="table table-bordered bg-white">

<thead>
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>BB</th>
    <th>TB</th>
    <th>Status Gizi</th>
</tr>
</thead>

<tbody>
@foreach($data as $no => $d)
<tr>
    <td>{{ $no+1 }}</td>
    <td>{{ $d->nama }}</td>
    <td>{{ $d->berat }} kg</td>
    <td>{{ $d->tinggi }} cm</td>
    <td>
        @if($d->berat < 10)
            <span class="badge bg-danger">Kekurangan Gizi</span>
        @elseif($d->berat < 15)
            <span class="badge bg-warning">Normal</span>
        @else
            <span class="badge bg-info">Overweight</span>
        @endif
    </td>
</tr>
@endforeach
</tbody>

</table>
</div>

@endsection