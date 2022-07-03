<div class="form-group row mt-2">
    <label class="col-sm-2 col-form-label" for="year">
        <span> سال </span>&nbsp
        @if (($required ?? false) == true)
            <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
        @endif
    </label>
    <div class="col-sm-10">
        <select name="{{ $name ?? 'year' }}" id="year" class="form-select">
            @for ($i = 1250; $i <= 1405; $i++)
                <option {{ $i == (int)($default ?? null) ? 'selected' : '' }} value="{{ $i }}">
                    {{ $i }}</option>
            @endfor
        </select>
    </div>
</div>