@if (isset($chart))
    <div class="card">
        <div class="card-body">
            <p class="text-center fs-6">نمودار برحسب فرصت های بین الملی موقعیت جغرافیایی</p>
            {!! $chart->renderHtml() !!}

            {!! $chart->renderChartJsLibrary() !!}
            {!! $chart->renderJs() !!}
        </div>
    </div>
@endif
