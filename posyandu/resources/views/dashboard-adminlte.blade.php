@extends('main')

@section('content')

<h3>Dashboard Posyandu</h3>

<div class="row">
    <div class="col-md-12">
        <div id="container"></div>
    </div>
</div>

<!-- HIGHCHARTS LIBRARY -->
<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Data Balita'
        },
        xAxis: {
            categories: ['Laki-laki', 'Perempuan']
        },
        yAxis: {
            title: {
                text: 'Jumlah Balita'
            }
        },
        series: [{
            name: 'Balita',
            data: [{{ $lakiLaki }}, {{ $perempuan }}]
        }]
    });

});
</script>

@endsection