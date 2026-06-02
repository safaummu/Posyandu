@extends('layout')

@section('content')

<div class="card p-4">
    <h4>Grafik Balita</h4>

    <canvas id="chartBalita"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('chartBalita');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Laki-laki', 'Perempuan'],
        datasets: [{
            label: 'Jumlah Balita',
            data: [{{ $laki }}, {{ $perempuan }}],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

@endsection