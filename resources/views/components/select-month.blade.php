<div class="form-group row mt-2">
    <label class="col-sm-2 col-form-label" for="month">
        <span> ماه </span>&nbsp
        @if (($required ?? false) == true)
            <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
        @endif
    </label>

    <div class="col-sm-10">
        <select name="{{ $name ?? 'month' }}" id="month" class="form-select">
            <option value="">انتخاب کنید</option>
            @foreach (config('gostaresh.month') as $key => $value)
                <option {{ $key == (int) ($default ?? null) ? 'selected' : '' }} value="{{ $key }}">
                    {{ $value }}</option>
            @endforeach
        </select>
    </div>
</div>
