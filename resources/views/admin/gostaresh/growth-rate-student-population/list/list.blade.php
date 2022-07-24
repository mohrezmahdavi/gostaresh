@extends('layouts.dashboard')

@section('title-tag')
نرخ رشد و ترکیب جمعیت دانش آموزی
@endsection

@section('breadcrumb-title')
نرخ رشد و ترکیب جمعیت دانش آموزی
@endsection

@section('page-title')
نرخ رشد و ترکیب جمعیت دانش آموزی

<span>
    <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
</span>
<span>
    <a href="{{ route('growth.rate.student.population.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
</span>
@endsection

@section('styles-head')

@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="get" id="app">
                        <div class="row">
                            <div class="col-md-12">
                                <select-province-inline-component
                                    province_default="{{ request()->province_id ?? auth()->user()->province_id ?? ''}}"
                                    zone_default="{{ request()->zone_id ?? auth()->user()->county->zone ?? ''}}"
                                    county_default="{{ request()->county_id ?? auth()->user()->county_id ?? ''}}"
                                    city_default="{{ request()->city_id ?? auth()->user()->city_id ?? ''}}"
                                    rural_district_default="{{ request()->rural_district_id ?? auth()->user()->rural_district_id ?? ''}}">
                                </select-province-inline-component>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <x-search-date name="date" startDate="{{ request()->input('start_date') }}"
                                    endDate="{{ request()->input('end_date') }}">
                                </x-search-date>
                            </div>

                            <div class="col-md-8 mt-4">
                                <div class="mt-1">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="gender_title">جنسیت</label>
                                        <input class="form-check-input" name="gender_title" type="checkbox"
                                            {{ filterCol('gender_title') == true ? 'checked' : '' }} id="gender_title"
                                            value="1">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="ebtedai">ابتدایی</label>
                                        <input class="form-check-input" name="ebtedai" type="checkbox"
                                            {{ filterCol('ebtedai') == true ? 'checked' : '' }} id="ebtedai"
                                            value="1">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="motevasete_1">متوسطه اول</label>
                                        <input class="form-check-input" name="motevasete_1" type="checkbox"
                                            {{ filterCol('motevasete_1') == true ? 'checked' : '' }} id="motevasete_1"
                                            value="1">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="motevasete_2_ensani">متوسطه دوم (علوم
                                            انسانی)</label>
                                        <input class="form-check-input" name="motevasete_2_ensani" type="checkbox"
                                            {{ filterCol('motevasete_2_ensani') == true ? 'checked' : '' }}
                                            id="motevasete_2_ensani" value="1">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="motevasete_2_math">متوسطه دوم (ریاضی)</label>
                                        <input class="form-check-input" name="motevasete_2_math" type="checkbox"
                                            {{ filterCol('motevasete_2_math') == true ? 'checked' : '' }}
                                            id="motevasete_2_math" value="1">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="motevasete_2_science">متوسطه دوم (علوم
                                            تجربی)</label>
                                        <input class="form-check-input" name="motevasete_2_science" type="checkbox"
                                            {{ filterCol('motevasete_2_science') == true ? 'checked' : '' }}
                                            id="motevasete_2_science" value="1">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="motevasete_2_kar_danesh">متوسطه دوم (کار و دانش
                                            و فنی و حرفه ای)</label>
                                        <input class="form-check-input" name="motevasete_2_kar_danesh" type="checkbox"
                                            {{ filterCol('motevasete_2_kar_danesh') == true ? 'checked' : '' }}
                                            id="motevasete_2_kar_danesh" value="1">
                                    </div>

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

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-light">

                                <tr>
                                    <th>#</th>
                                    @include('admin.gostaresh.growth-rate-student-population.list.partials.thead')

                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($growthRateStudentPopulations as $key => $growthRateStudentPopulation)
                                    <tr>
                                        <th scope="row">{{ $growthRateStudentPopulations?->firstItem() + $key }}</th>

                                        @include('admin.gostaresh.growth-rate-student-population.list.partials.tbody')


                                        <td>
                                            <a href="{{ route('growth.rate.student.population.edit', $growthRateStudentPopulation) }}"
                                                title="{{ __('validation.buttons.edit') }}"
                                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                                            <a href="{{ route('growth.rate.student.population.destroy', $growthRateStudentPopulation) }}" }}"
                                                title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-end mt-3">
                            <x-exports.export-links
                                excelLink="{{ route('growth.rate.student.population.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('growth.rate.student.population.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('growth.rate.student.population.list.print', request()->query->all()) }}"
                            />
                        </div>
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $growthRateStudentPopulations->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <x-gostaresh.growth-rate-student-population.line-chart-by-gender-component />
        </div>

    </div>

@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
