<div class="card">
    <div class="card-body">

        <div class="d-flex align-items-start justify-content-between">
            <div>
                <h4 class="header-title">دانشگاه</h4>
            </div>
            <div class="avatar-sm">
                <span class="avatar-title bg-soft-primary rounded">
                    <i class="ri-pie-chart-2-line font-20 text-primary"></i>
                </span>
            </div>
        </div>
        <div class="mt-3 text-center" >
            @if (count($percapitaRevenue) > 0)
                <div id="projections-actuals" class="apex-charts"></div>
            @else
                <div class="alert alert-warning">رکوردی در حال حاضر وجود ندارد.</div>
            @endif




        </div>
    </div>
</div>

@php

    if (count($percapitaRevenue) > 0) {
        $series = [];
        foreach (config('gostaresh.university_type') as $key => $value) {
            $number = $percapitaRevenue->where('university_type', $key)->first()?->total;
            array_push($series, $number == null ? 0 : $number);
        }
    }
@endphp

@if (count($percapitaRevenue) > 0)
    <script>
        var options = {
            chart: {
                type: 'pie',
                width: '100%'
            },
            series: {!! json_encode($series) !!},
            labels: {!! json_encode(array_values(config('gostaresh.university_type'))) !!},
            legend: {
                show: true,
                position: 'bottom',
                horizontalAlign: 'center',
                floating: false,
                fontSize: '14px',
                formatter: undefined,
                inverseOrder: false,
            }
        }

        var chart = new ApexCharts(document.querySelector("#projections-actuals"), options);

        chart.render();
    </script>
@endif
