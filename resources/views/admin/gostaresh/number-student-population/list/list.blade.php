@extends('layouts.dashboard')

@section('title-tag')
    تعداد و ترکیب جمعیت دانش آموزی استان
@endsection

@section('breadcrumb-title')
    تعداد و ترکیب جمعیت دانش آموزی استان
@endsection

@section('page-title')
    تعداد و ترکیب جمعیت دانش آموزی استان
    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('number.student.population.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
    </span>
@endsection

@section('styles-head')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="{{ asset('assets/datepicker/mds.bs.datetimepicker.style.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/datepicker/mds.bs.datetimepicker.js') }}"></script>
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="get">
                        <div class="row" id="app">
                            <div class="col-md-12">
                                <select-province-inline-component
                                    province_default="{{ auth()->user()->province_id ?? request()->province_id }}"
                                    county_default="{{ auth()->user()->county_id ?? request()->county_id }}"
                                    city_default="{{ auth()->user()->city_id ?? request()->city_id }}"
                                    rural_district_default="{{ auth()->user()->rural_district_id ?? request()->rural_district_id }}">
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
                                    <th>شهرستان </th>
                                    @if (filterCol('gender_title') == true)
                                        <th>جنسیت</th>
                                    @endif

                                    {{-- <th>مقطع</th> --}}
                                    @if (filterCol('ebtedai') == true)
                                        <th>ابتدایی</th>
                                    @endif

                                    @if (filterCol('motevasete_1') == true)
                                        <th>متوسطه اول</th>
                                    @endif
                                    @if (filterCol('motevasete_2_ensani') == true)
                                        <th>متوسطه دوم (علوم انسانی)</th>
                                    @endif
                                    @if (filterCol('motevasete_2_math') == true)
                                        <th>متوسطه دوم (ریاضی)</th>
                                    @endif
                                    @if (filterCol('motevasete_2_science') == true)
                                        <th>متوسطه دوم (علوم تجربی)</th>
                                    @endif
                                    @if (filterCol('motevasete_2_kar_danesh') == true)
                                        <th>متوسطه دوم (کار و دانش و فنی و حرفه ای)</th>
                                    @endif

                                    <th>سال</th>
                                    <th>ماه</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($numberStudentPopulations as $key => $numberStudentPopulation)
                                    <tr>
                                        <th scope="row">{{ $numberStudentPopulations?->firstItem() + $key }}</th>

                                        <td>{{ $numberStudentPopulation?->province?->name . ' - ' . $numberStudentPopulation->county?->name }}
                                        </td>
                                        @if (filterCol('gender_title') == true)
                                        <td>{{ $numberStudentPopulation?->gender_title }}</td>
                                        @endif

                                        {{-- <td>{{ $numberStudentPopulation?->grade }}</td> --}}
                                        @if (filterCol('ebtedai') == true)
                                        <td>{{ $numberStudentPopulation?->ebtedai }}</td>
                                        @endif

                                        @if (filterCol('motevasete_1') == true)
                                        <td>{{ $numberStudentPopulation?->motevasete_1 }}</td>
                                        @endif
                                        @if (filterCol('motevasete_2_ensani') == true)
                                        <td>{{ $numberStudentPopulation?->motevasete_2_ensani }}</td>
                                        @endif
                                        @if (filterCol('motevasete_2_math') == true)
                                        <td>{{ $numberStudentPopulation?->motevasete_2_math }}</td>
                                        @endif
                                        @if (filterCol('motevasete_2_science') == true)
                                        <td>{{ $numberStudentPopulation?->motevasete_2_science }}</td>
                                        @endif
                                        @if (filterCol('motevasete_2_kar_danesh') == true)
                                        <td>{{ $numberStudentPopulation?->motevasete_2_kar_danesh }}</td>
                                        @endif

                                        <td>{{ $numberStudentPopulation?->year }}</td>
                                        <td>{{ $numberStudentPopulation?->month }}</td>
                                        <td>
                                            <a href="{{ route('number.student.population.edit', $numberStudentPopulation) }}"
                                                title="{{ __('validation.buttons.edit') }}"
                                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                                            <a href="{{ route('number.student.population.destroy', $numberStudentPopulation) }}"
                                                title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $numberStudentPopulations->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <x-gostaresh.number-student-population.line-chart-by-gender-component />
        </div>

    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
