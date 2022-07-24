@if ($excelLink ?? null != null)
    <a href="{!! $excelLink !!}" class="btn btn-success" style="background-color: rgb(1, 143, 157)">
        خروجی اکسل
        <i class="fa fa-file-excel"></i>
    </a>
@endif

@if ($pdfLink ?? null != null)
    <a href="{!! $pdfLink !!}" class="btn btn-success" style="background-color: rgb(0, 188, 217)">
        خروجی
        PDF
        <i class="fa fa-file-pdf"></i>
    </a>
@endif

@if ($printLink ?? null != null)
    <a href="{!! $printLink !!}" target="_blank" class="btn btn-success" style="background-color: rgb(68, 168, 228)">
        پرینت
        <i class="fa fa-print"></i>
    </a>
@endif
