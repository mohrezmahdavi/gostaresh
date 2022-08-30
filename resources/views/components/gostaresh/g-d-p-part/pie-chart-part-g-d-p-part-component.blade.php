<div class="card">
    <div class="card-body">

        <div class="d-flex align-items-start justify-content-between">
            <div>
                <h4 class="header-title">درصد بخش ها</h4>
            </div>
            <div class="avatar-sm">
                <span class="avatar-title bg-soft-primary rounded">
                    <i class="ri-pie-chart-2-line font-20 text-primary"></i>
                </span>
            </div>
        </div>
        <div class="mt-3 text-center">
            @if (count($gdpParts) > 0)
                <div id="projections-actuals" class="apex-charts"></div>
            @else
                <div class="alert alert-warning">رکوردی در حال حاضر وجود ندارد.</div>
            @endif
        </div>
    </div>
</div> <!-- end card-box -->
@php

if (count($gdpParts) > 0) {
    $series = [];
    foreach (config('gostaresh.parts') as $key => $value) {
        $number = $gdpParts->where('part', $key)->first()?->total;
        array_push($series, $number == null ? 0 : $number);
    }
}
@endphp

@if (count($gdpParts) > 0)
    <script>
        var options = {
            chart: {
                type: 'pie',
                width: '100%',
            },
            series: {!! json_encode($series) !!},
            labels: {!! json_encode(array_values(config('gostaresh.parts'))) !!},
            tooltip: {
                y: {
                    formatter: undefined,
                    title: {
                        formatter: (seriesName) => `تعداد ${seriesName} : `,
                    },
                },
            },
            legend: {
                show: true,
                position: 'bottom',
                horizontalAlign: 'center',
                floating: false,
                fontSize: '14px',
                formatter: undefined,
                inverseOrder: false,

                itemMargin: {
                    horizontal: 5,
                    vertical: 5
                },


            },
            tooltip: {
                y: {
                    formatter: () => '',
                    title: {
                        formatter: (seriesName, opts) => {
                            console.log(opts)
                            return [`تعداد ${seriesName} : ${opts.w.globals.series[opts.seriesIndex]} </br>`,
                                `درصد ${seriesName} : %${opts.w.globals.seriesPercent[opts.seriesIndex][0].toFixed(1)}`
                            ]
                        },
                    },
                },
            },
        }

        var chart = new ApexCharts(document.querySelector("#projections-actuals"), options);

        chart.render();
    </script>
@endif
