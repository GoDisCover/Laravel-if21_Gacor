@extends('main')

@section('title', 'Dashboard')
@section('content')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>



<div class="row">
    <div class="col-lg-3">
       <figure class="highcharts-figure">
           <div id="container_tugas"></div>
       </figure>
   </div>
    <div class="col-lg-3">
        <figure class="highcharts-figure">
            <div id="container"></div>
        </figure>
    </div>
    <div class="col-lg-3">
        <figure class="highcharts-figure">
            <div id="container1"></div>
        </figure>
    </div>
    <div class="col-lg-3">
        <figure class="highcharts-figure">
            <div id="container2"></div>
        </figure>
    </div>
</div>

<style>
    .highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tbody tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

.highcharts-description {
    margin: 0.3rem 10px;
}

</style>


<script>
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Mahasiswa'
    },
    subtitle: {
        text:
            'Source: Universitas MDP '
    },
    xAxis: {
        categories: [
            @foreach ($mahasiswaprodi as $item)
            '{{ $item -> nama }}'@if (!$loop->last),@endif
            @endforeach
        ],
        crosshair: true,
        accessibility: {
            description: 'Countries'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Mahasiswa'
        }
    },
    tooltip: {
        valueSuffix: 'Orang'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'mahasiswa',
            data: [@foreach ($mahasiswaprodi as $item)
            {{  $item -> jumlah }}@if (!$loop->last),@endif
            @endforeach]
        }
    ]
});


Highcharts.chart('container1', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Mahasiswa Berdasarkan Asal Sma'
    },
    subtitle: {
        text:
            'Source: Universitas MDP '
    },
    xAxis: {
        categories: [
            @foreach ($mahasiswasma as $item)
            '{{ $item -> asal_sma }}'@if (!$loop->last),@endif
            @endforeach

        ],
        crosshair: true,
        accessibility: {
            description: 'Program Studi'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Mahasiswa'
        }
    },
    tooltip: {
        valueSuffix: '(Orang)'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'mahasiswa',
            data: [@foreach ($mahasiswasma as $item)
            {{  $item -> jumlah }}@if (!$loop->last),@endif
            @endforeach]
        }
    ]
});

Highcharts.chart('container2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Tahun Masuk'
    },
    subtitle: {
        text:
            'Source: Universitas MDP '
    },
    xAxis: {
        categories: [
            @foreach ($mahasiswatahun as $item)
            '20{{ $item -> tahun }}'@if (!$loop->last),@endif
            @endforeach

        ],
        crosshair: true,
        accessibility: {
            description: 'Tahun Masuk'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Mahasiswa'
        }
    },
    tooltip: {
        valueSuffix: ' (Orang)'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'mahasiswa',
            data: [@foreach ($mahasiswatahun as $item)
            {{  $item -> jumlah }}@if (!$loop->last),@endif
            @endforeach]
        }
    ]
});
Highcharts.chart('container_tugas', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Kelas Setiap Prodi per Tahun'
    },
    subtitle: {
        text:
            'Source: Universitas MDP '
    },
    xAxis: {
        categories: [
            @foreach ($kelasperprodi as $item)
            '{{ $item->tahun_akademik }}'@if (!$loop->last),@endif
            @endforeach

        ],
        crosshair: true,
        accessibility: {
            description: 'Tahun Masuk'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Kelas'
        }
    },
    tooltip: {
        valueSuffix: ' (Kelas)'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        @foreach (collect($kelasperprodi)->pluck('nama')->unique() as $prodi)
        {
            name: '{{ $prodi }}',
            data: [
                @foreach (collect($kelasperprodi)->pluck('tahun_akademik')->unique() as $tahun)
                    {{
                        optional(
                            collect($kelasperprodi)
                                ->first(function($row) use ($prodi, $tahun) {
                                    return $row->nama == $prodi && $row->tahun_akademik == $tahun;
                                })
                        )->jumlah ?? 0
                    }}@if (!$loop->last),@endif
                @endforeach
            ]
        }@if (!$loop->last),@endif
        @endforeach
    ]
});
</script>


@endsection
