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
                        <div class="row"  id="app">
                            <div class="col-md-12">
                                <select-province-inline-component
                                    province_default="{{ request()->province_id }}"
                                    county_default="{{ request()->county_id }}"
                                    city_default="{{ request()->city_id }}"
                                    rural_district_default="{{ request()->rural_district_id }}">
                                </select-province-inline-component>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <x-search-date name="date"
                                    startDate="{{ request()->input('start_date') }}"
                                    endDate="{{ request()->input('end_date') }}">
                                </x-search-date>
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
                                    <th>جنسیت</th>
                                    {{-- <th>مقطع</th> --}}
                                    <th>ابتدایی</th>
                                    <th>متوسطه اول</th>
                                    <th>متوسطه دوم (علوم انسانی)</th>
                                    <th>متوسطه دوم (ریاضی)</th>
                                    <th>متوسطه دوم (علوم تجربی)</th>
                                    <th>متوسطه دوم (کار و دانش و فنی و حرفه ای)</th>
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
                                        <td>{{ $numberStudentPopulation?->gender_title }}</td>
                                        {{-- <td>{{ $numberStudentPopulation?->grade }}</td> --}}
                                        <td>{{ $numberStudentPopulation?->ebtedai }}</td>
                                        <td>{{ $numberStudentPopulation?->motevasete_1 }}</td>
                                        <td>{{ $numberStudentPopulation?->motevasete_2_ensani }}</td>
                                        <td>{{ $numberStudentPopulation?->motevasete_2_math }}</td>
                                        <td>{{ $numberStudentPopulation?->motevasete_2_science }}</td>
                                        <td>{{ $numberStudentPopulation?->motevasete_2_kar_danesh }}</td>
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
                        <div class="text-end mt-3">
                            <a href="{{ route('number.student.population.list.excel', request()->query->all()) }}"
                                class="btn btn-success ">خروجی اکسل</a>
    
                        </div>
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
