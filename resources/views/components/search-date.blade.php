<div class="row">
                                                               
    <div class="col-md-6" >
        <label class="col-form-label" >از تاریخ</label>

        <date-picker-component 
            name="start_{{ $name }}" 
            default_date="{{ $startDate != null ? Carbon\Carbon::parse($startDate)->toDateTimeString() : '' }}">
        </date-picker-component>  
    </div>


    <div class="col-md-6" >
        <label class="col-form-label" >تا تاریخ</label>
        <date-picker-component 
            name="end_{{ $name }}" 
            default_date="{{ $endDate != null ? Carbon\Carbon::parse($endDate)->toDateTimeString() : '' }}">
        </date-picker-component>  
        
    </div>
</div>