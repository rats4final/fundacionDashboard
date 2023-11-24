@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>Reporte 1</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <canvas style="height: 60vh" id="firstChart"></canvas>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.min.js"></script>
    <script>
        const data = [
            { year: 2010, count: 10 },
            { year: 2011, count: 20 },
            { year: 2012, count: 15 },
            { year: 2013, count: 25 },
            { year: 2014, count: 22 },
            { year: 2015, count: 30 },
            { year: 2016, count: 28 },
        ];

        new Chart(
            document.getElementById('firstChart'),
            {
                type: 'bar',
                data: {
                    labels: data.map(row => row.year),
                    datasets: [
                        {
                            label: 'Acquisitions by year',
                            data: data.map(row => row.count)
                        }
                    ]
                },
                options:{
                    responsive: true,
                    maintainAspectRatio: false
                }
            }
        );
    </script>
@endsection
