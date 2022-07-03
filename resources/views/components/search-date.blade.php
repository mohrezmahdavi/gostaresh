<div class="row">
                                    
                                    
    <div class="col-md-6" id="start{{ $name }}parent">
        <label class="col-form-label" >از تاریخ</label>
        <input type="text"  class="form-control" placeholder="از تاریخ"
        @if ($startDate != null)
        value="{{ Verta::instance(Carbon\Carbon::parse($startDate)->toDateTimeString())->format('H:i:s Y/n/j') }}" 
        @endif
        data-name="start_{{ $name }}_text" />
        <input type="hidden" name="start_{{ $name }}"
        @if ($startDate != null)
        value="{{ Carbon\Carbon::parse($startDate)->toDateTimeString() }}"
        @endif
        data-name="start_{{ $name }}_date" />
    </div>
    <script>
        new mds.MdsPersianDateTimePicker(document.getElementById("start{{ $name }}parent"), {
            targetTextSelector: '[data-name="start_{{ $name }}_text"]',
            targetDateSelector: '[data-name="start_{{ $name }}_date"]',
            enableTimePicker: true,
            dateFormat: 'yyyy-MM-dd HH:mm:ss',
            textFormat: 'HH:mm:ss yyyy/MM/dd' ,
        });
    </script>


    <div class="col-md-6" id="end{{ $name }}parent">
        <label class="col-form-label" >تا تاریخ</label>
        <input type="text"  class="form-control" placeholder="تا تاریخ"
        @if ($endDate != null)
        value="{{ Verta::instance(Carbon\Carbon::parse($endDate)->toDateTimeString())->format('H:i:s Y/n/j') }}" 
        @endif
        data-name="end_{{ $name }}_text" />
        <input type="hidden" name="end_{{ $name }}"
        @if ($endDate != null)
        value="{{ Carbon\Carbon::parse($endDate)->toDateTimeString() }}"
        @endif
        data-name="end_{{ $name }}_date" />
    </div>
    <script>
        new mds.MdsPersianDateTimePicker(document.getElementById("end{{ $name }}parent"), {
            targetTextSelector: '[data-name="end_{{ $name }}_text"]',
            targetDateSelector: '[data-name="end_{{ $name }}_date"]',
            enableTimePicker: true,
            dateFormat: 'yyyy-MM-dd HH:mm:ss',
            textFormat: 'HH:mm:ss yyyy/MM/dd' ,
        });
    </script>
</div>