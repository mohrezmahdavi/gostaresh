<label class="col-form-label" for="{{ $name ?? 'year' }}">{{ $title ?? 'سال' }}</label>
<select name="{{ $name ?? 'year' }}" class="form-select" id="{{ $name ?? 'year' }}">
    <option value="">همه</option>
    @for ($i = (int) ($min ?? 1250); $i <= (int) ($max ?? 1405); $i++)
    @dump($i)
        <option {{ $i == (int) ($default ?? null) ? 'selected' : '' }} value="{{ $i }}">
            {{ $i }}</option>
    @endfor
</select>
