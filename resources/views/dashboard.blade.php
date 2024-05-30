@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Temperature Sensor</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Data</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Humidity Sensor</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Data</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Soil Moisture Sensor</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Data</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Intensity Sensor</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Data</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Temperature --}}
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Temperature Sensor Data Graphics
                </div>
                <div class="card-body" id="temperature-sensor"></div>
            </div>
        </div>

        {{-- Humidity --}}
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Humidity Sensor Data Graphics
                </div>
                <div class="card-body" id="humidity-sensor"></div>
            </div>
        </div>
    </div>

    {{-- Soil Moisture --}}
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Soil Moisture Sensor Data Graphics
                </div>
                <div class="card-body" id="moisture-sensor"></div>
            </div>
        </div>

        {{-- Intensity --}}
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Intensity Sensor Data Graphics
                </div>
                <div class="card-body" id="intensity-sensor"></div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        Highcharts.chart('temperature-sensor', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Temperature'
            },
            xAxis: {
                tickInterval: 1,
                accessibility: {
                    description: 'Temperature values from 0 to 100'
                },
                title: {
                    text: 'Time'
                }
            },
            yAxis: {
                min: 0,
                max: 70,
                tickInterval: 10,
                title: {
                    text: 'Temperature Value'
                },
                labels: {
                    format: '{value}°'
                },
                lineWidth: 1
            },
            tooltip: {
                headerFormat: '<b>{series.name}</b><br />',
                pointFormat: 'Time = {point.x}, Temperature Value = {point.y}'
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                data: [
                    [0, 5.2],
                    [5, 25.3],
                    [10, 15.7],
                    [15, 35.0],
                    [20, 10.2],
                    [25, 55.3],
                    [30, 30.0],
                    [35, 70.5],
                    [40, 20.2],
                    [45, 80.4],
                    [50, 25.6],
                    [55, 60.7],
                    [60, 35.0],
                    [65, 50.3],
                    [70, 20.4],
                    [75, 65.0],
                    [80, 45.3],
                    [85, 55.0],
                    [90, 30.4],
                    [95, 70.0],
                    [100, 40.1]
                ],
                zones: [{
                    value: 10,
                    color: '#1E90FF' // Blue
                }, {
                    value: 20,
                    color: '#32CD32' // Green
                }, {
                    value: 30,
                    color: '#FFD700' // Gold
                }, {
                    value: 40,
                    color: '#FF4500' // OrangeRed
                }, {
                    color: '#FF0000' // Red
                }],
                pointStart: 1,
                name: 'Temperature Sensor'
            }]
        });


        Highcharts.chart('humidity-sensor', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Humidity - air'
            },
            xAxis: {
                tickInterval: 1,
                accessibility: {
                    description: 'Humidity values from 0 to 100'
                },
                title: {
                    text: 'Time'
                }
            },
            yAxis: {
                min: 0,
                max: 100,
                tickInterval: 10,
                title: {
                    text: 'Humidity Value'
                },
                labels: {
                    format: '{value}°'
                },
                lineWidth: 1
            },
            tooltip: {
                headerFormat: '<b>{series.name}</b><br />',
                pointFormat: 'Time = {point.x}, Humidity Value = {point.y}'
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                data: [
                    [0, 5.2],
                    [5, 25.3],
                    [10, 15.7],
                    [15, 35.0],
                    [20, 10.2],
                    [25, 55.3],
                    [30, 30.0],
                    [35, 70.5],
                    [40, 20.2],
                    [45, 80.4],
                    [50, 25.6],
                    [55, 60.7],
                    [60, 35.0],
                    [65, 50.3],
                    [70, 20.4],
                    [75, 65.0],
                    [80, 45.3],
                    [85, 55.0],
                    [90, 30.4],
                    [95, 70.0],
                    [100, 40.1]
                ],
                zones: [{
                    value: 10,
                    color: '#1E90FF' // Blue
                }, {
                    value: 20,
                    color: '#32CD32' // Green
                }, {
                    value: 30,
                    color: '#FFD700' // Gold
                }, {
                    value: 40,
                    color: '#FF4500' // OrangeRed
                }, {
                    color: '#FF0000' // Red
                }],
                pointStart: 1,
                name: 'Humidity Sensor'
            }]
        });


        Highcharts.chart('moisture-sensor', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Soil Moisture'
            },
            xAxis: {
                tickInterval: 1,
                accessibility: {
                    description: 'Moisture values from 0 to 100'
                },
                title: {
                    text: 'Time'
                }
            },
            yAxis: {
                min: 0,
                max: 100,
                tickInterval: 10,
                title: {
                    text: 'Moisture Value'
                },
                labels: {
                    format: '{value}%'
                },
                lineWidth: 1
            },
            tooltip: {
                headerFormat: '<b>{series.name}</b><br />',
                pointFormat: 'Time = {point.x}, Moisture Value = {point.y}'
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                data: [
                    [0, 5.2],
                    [5, 25.3],
                    [10, 15.7],
                    [15, 35.0],
                    [20, 10.2],
                    [25, 55.3],
                    [30, 30.0],
                    [35, 70.5],
                    [40, 20.2],
                    [45, 80.4],
                    [50, 25.6],
                    [55, 60.7],
                    [60, 35.0],
                    [65, 50.3],
                    [70, 20.4],
                    [75, 65.0],
                    [80, 45.3],
                    [85, 55.0],
                    [90, 30.4],
                    [95, 70.0],
                    [100, 40.1]
                ],
                zones: [{
                    value: 10,
                    color: '#1E90FF' // Blue
                }, {
                    value: 20,
                    color: '#32CD32' // Green
                }, {
                    value: 30,
                    color: '#FFD700' // Gold
                }, {
                    value: 40,
                    color: '#FF4500' // OrangeRed
                }, {
                    color: '#FF0000' // Red
                }],
                pointStart: 1,
                name: 'Soil Moisture Sensor'
            }]
        });


        Highcharts.chart('intensity-sensor', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Intensity Moisture'
            },
            xAxis: {
                tickInterval: 1,
                accessibility: {
                    description: 'Intensity values from 0 to 100'
                },
                title: {
                    text: 'Time'
                }
            },
            yAxis: {
                min: 0,
                max: 100,
                tickInterval: 10,
                title: {
                    text: 'Intensity Value'
                },
                labels: {
                    format: '{value}%'
                },
                lineWidth: 1
            },
            tooltip: {
                headerFormat: '<b>{series.name}</b><br />',
                pointFormat: 'Time = {point.x}, Intensity Value = {point.y}'
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                data: [
                    [0, 5.2],
                    [5, 25.3],
                    [10, 15.7],
                    [15, 35.0],
                    [20, 10.2],
                    [25, 55.3],
                    [30, 30.0],
                    [35, 70.5],
                    [40, 20.2],
                    [45, 80.4],
                    [50, 25.6],
                    [55, 60.7],
                    [60, 35.0],
                    [65, 50.3],
                    [70, 20.4],
                    [75, 65.0],
                    [80, 45.3],
                    [85, 55.0],
                    [90, 30.4],
                    [95, 70.0],
                    [100, 40.1]
                ],
                zones: [{
                    value: 10,
                    color: '#1E90FF' // Blue
                }, {
                    value: 20,
                    color: '#32CD32' // Green
                }, {
                    value: 30,
                    color: '#FFD700' // Gold
                }, {
                    value: 40,
                    color: '#FF4500' // OrangeRed
                }, {
                    color: '#FF0000' // Red
                }],
                pointStart: 1,
                name: 'Intensity Sensor'
            }]
        });

    </script>
@endpush
