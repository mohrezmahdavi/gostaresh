@if (isset($chart))
    <div class="card">
        <div class="card-body">
            <p class="text-center fs-6">نمودار برحسب جنسیت</p>

            {!! $chart->renderHtml() !!}

            {!! $chart->renderChartJsLibrary() !!}
            {!! $chart->renderJs() !!}
        </div>
    </div>
@endif
