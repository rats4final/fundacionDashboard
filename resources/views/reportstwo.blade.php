@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>Reporte 1</h1>
@stop
@section('content')
    <div class="card">
        <div class="d-flex flex-row flex-wrap justify-content-center align-items-center p-4" style="gap: 0.5rem;">
            <div>
                <label for="startDate">{{__("Start Date")}}</label><input type="number" min="1900" max="2099" step="1" value="2016" name="startDate" id="startDate">
            </div>
            <div>
                <label for="endDate">{{__("End Date")}}</label><input type="number" min="1900" max="2099" step="1" value="2023" name="endDate" id="endDate">
            </div>
            <button class="btn btn-primary" id="apply" name="apply">{{__("Apply")}}</button>
        </div>
        <div class="card-body">
            <canvas style="height: 60vh" id="firstChart"></canvas>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.min.js"></script>
    <script>
        //dummy data
        const data = [
            { year: 2010, count: 10 },
            { year: 2011, count: 20 },
            { year: 2012, count: 15 },
            { year: 2013, count: 25 },
            { year: 2014, count: 22 },
            { year: 2015, count: 30 },
            { year: 2016, count: 28 },
        ];

        const myChart = new Chart(
            document.getElementById('firstChart'),
            {
                type: 'line',
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
                },
            }
        );

        const applyButton = document.querySelector('#apply');
        let filteredData;

        applyButton.addEventListener('click',()=>{
            const startDate = document.querySelector("#startDate").value;
            const endDate = document.querySelector('#endDate').value;
            console.log(startDate,endDate)
            filteredData = data.filter(item => item.year >= startDate && item.year <= endDate )
            console.log(filteredData)
            myChart.data.datasets = [
                {
                    label: 'Acquisitions by year',
                    data: filteredData.map(row => row.count)
                }
            ]
            myChart.data.labels = filteredData.map(row => row.year)
            myChart.update();

        })





    </script>
@endsection
