@if (isset($chart))
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
                <div>
                    <h4 class="header-title">نمودار خطی مجموع میزان ظرفیت پذیرش دانشجو بر حسب سال</h4>
                </div>
                <div class="avatar-sm">
                    <span class="avatar-title bg-soft-primary rounded">
                        <i class="ri-line-chart-fill font-20 text-primary"></i>
                    </span>
                </div>
            </div>
            {!! $chart->renderHtml() !!}

            {!! $chart->renderChartJsLibrary() !!}
            {!! $chart->renderJs() !!}
        </div>
    </div>
@endif
