@php
    $options = $options ?? [];
@endphp

<div class="form-group row mt-2">
    <label class="col-sm-2 col-form-label" for="{{ ($name ?? '') }}">
        <span> {{ ($title ?? '') }} </span>&nbsp
        <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
    </label>
    <div class="col-sm-10">
        <select 
            name="{{ ($name ?? '') }}" 
            id="{{ ($name ?? '') }}"
            placeholder="{{ ($placeholder ?? '') }}" 
            class="form-select" >

            @if (is_array($options) && count($options) > 0)
                @if (($index ?? null) == null)
                    @foreach ($options as $key => $value)
                        <option {{ ($key == ($selected ?? null) ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                @endif

                @if (($index ?? null) != null)
                    @foreach ($options as $key => $value)
                        <option {{ ($value[$index] == ($selected ?? null) ? 'selected' : '') }} value="{{ $value[$index] }}">{{ $value }}</option>
                    @endforeach
                @endif

                @if (($index ?? null) != null)
                    @foreach ($options as $key => $value)
                        <option {{ ($value[$index] == ($selected ?? null) ? 'selected' : '') }} value="{{ $value[$index] }}">{{ $value }}</option>
                    @endforeach
                @endif

                @if (($index ?? null) != null)
                    @foreach ($options as $key => $value)
                        <option {{ ($value[$index] == ($selected ?? null) ? 'selected' : '') }} value="{{ $value[$index] }}">{{ $value }}</option>
                    @endforeach
                @endif
            @endif
        </select>
    </div>
</div>