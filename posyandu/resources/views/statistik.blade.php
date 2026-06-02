@extends('layout')

@section('content')

<div class="container mt-4">

    <h3>Statistik Balita</h3>

    <div class="row mt-3">

        <div class="col">
            <div class="card p-3 text-center">
                <h5>Total</h5>
                <h3>{{ $total }}</h3>
            </div>
        </div>

        <div class="col">
            <div class="card p-3 text-center">
                <h5>Laki-laki</h5>
                <h3>{{ $laki }}</h3>
            </div>
        </div>

        <div class="col">
            <div class="card p-3 text-center">
                <h5>Perempuan</h5>
                <h3>{{ $perempuan }}</h3>
            </div>
        </div>

    </div>

    <div class="row mt-3">

        <div class="col">
            <div class="card p-3 text-center bg-success text-white">
                <h5>Normal</h5>
                <h3>{{ $normal }}</h3>
            </div>
        </div>

        <div class="col">
            <div class="card p-3 text-center bg-warning">
                <h5>Pemantauan</h5>
                <h3>{{ $pemantauan }}</h3>
            </div>
        </div>

        <div class="col">
            <div class="card p-3 text-center bg-danger text-white">
                <h5>Risiko</h5>
                <h3>{{ $risiko }}</h3>
            </div>
        </div>

    </div>

</div>
@endsection