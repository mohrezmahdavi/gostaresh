<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="{{ ($name ?? '') }}">
        <span> {{ ($title ?? '') }} </span>&nbsp
        @if (($required ?? false) == true)
            <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
        @endif
    </label>
    <div class="col-sm-10">
        <input type="text" id="{{ ($name ?? '') }}"
            name="{{ ($name ?? '') }}"
            value="{{ ($default ?? '') }}"
            min="{{ ($min ?? '') }}"
            max="{{ ($max ?? '') }}"
            class="form-control" placeholder="{{ ($placeholder ?? '') }}">
    </div>
</div>
