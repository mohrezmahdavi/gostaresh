<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="get" id="app">
                        <div class="row">
                            <div class="col-md-12">
                                <select-province-inline-component
                                    province_default="{{ request()->province_id ?? (auth()->user()->province_id ?? '') }}"
                                    zone_default="{{ request()->zone_id ?? (auth()->user()->county->zone ?? '') }}"
                                    county_default="{{ request()->county_id ?? (auth()->user()->county_id ?? '') }}"
                                    city_default="{{ request()->city_id ?? (auth()->user()->city_id ?? '') }}"
                                    rural_district_default="{{ request()->rural_district_id ?? (auth()->user()->rural_district_id ?? '') }}"
                                    @if ($fieldsProvinceSelect != null) :fields="{{ json_encode($fieldsProvinceSelect) }}" @endif>
                                </select-province-inline-component>
                            </div>
                        </div>
                        <div class="row mt-2">
                            {{-- <div class="col-md-4">
                                <x-search-date name="date" startDate="{{ request()->input('start_date') }}"
                                    endDate="{{ request()->input('end_date') }}">
                                </x-search-date>
                            </div> --}}
                            <div class="col-md-2">
                                <x-gostaresh.filter-table-list.select-year title="از سال" :default="request()->start_year"
                                    min="{{ config('gostaresh.year.min', 1370) }}"
                                    max="{{ config('gostaresh.year.max', 1405) }}" name="start_year">
                                </x-gostaresh.filter-table-list.select-year>
                            </div>

                            <div class="col-md-2">
                                <x-gostaresh.filter-table-list.select-year title="تا سال" :default="request()->end_year"
                                    min="{{ config('gostaresh.year.min', 1370) }}"
                                    max="{{ config('gostaresh.year.max', 1405) }}" name="end_year">
                                </x-gostaresh.filter-table-list.select-year>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12 mt-4">
                                <div class="mt-1">
                                    @foreach ($filterColumnsCheckBoxes as $key => $value)
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label"
                                                for="{{ $key }}">{{ $value }}</label>
                                            <input class="form-check-input" name="{{ $key }}" type="checkbox"
                                                {{ filterCol($key) == true ? 'checked' : '' }}
                                                id="{{ $key }}" value="1">
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">جستجو</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
