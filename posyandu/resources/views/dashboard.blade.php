@extends('layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">

    <h4>Dashboard Posyandu</h4>

    <a href="/logout" class="btn btn-danger btn-sm">
        Logout
    </a>

</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="row">

    <div class="col-md-4">
        <div class="card p-3">

            <h5>Input Balita</h5>

            <form method="POST" action="/simpan">
                @csrf

                <input name="nama" class="form-control mb-2" placeholder="Nama">

                <input type="date" name="tgl_lahir" class="form-control mb-2">

                <input name="berat" class="form-control mb-2" placeholder="Berat (kg)">

                <select name="jk" class="form-control mb-2">
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>

                <input name="orang_tua" class="form-control mb-2" placeholder="Orang Tua">

                <button class="btn btn-primary w-100">Simpan</button>

            </form>

        </div>
    </div>

    <div class="col-md-8">
        <div class="card p-3">

            <h5>Data Balita</h5>

            <table class="table table-bordered">

                <tr>
                    <th>Nama</th>
                    <th>Tgl Lahir</th>
                    <th>Berat</th>
                    <th>JK</th>
                    <th>Orang Tua</th>
                    <th>Aksi</th>
                </tr>

                @foreach($data as $d)

                @php
                    $tgl = \Carbon\Carbon::parse($d->tgl_lahir);
                    $umur = $tgl->diffInYears(\Carbon\Carbon::now());

                    $status = 'Normal';

                    if($umur >= 2 && $d->berat < 10){
                        $status = 'Risiko Stunting';
                    } elseif($d->berat < 12){
                        $status = 'Perlu Pemantauan';
                    }
                @endphp

                <tr>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->tgl_lahir }}</td>
                    <td>{{ $d->berat }} kg</td>
                    <td>{{ $d->jk }}</td>
                    <td>{{ $d->orang_tua }}</td>

                    <td>
                        <button class="btn btn-warning btn-sm"
                            onclick="editData(JSON.parse(this.dataset.item))"
                            data-item='@json($d)'>
                            Edit
                        </button>

                        <button class="btn btn-danger btn-sm"
                            onclick="hapusData({{ $d->id }})">
                            Hapus
                        </button>
                    </td>
                </tr>

                @endforeach

            </table>

        </div>
    </div>

</div>

@endsection