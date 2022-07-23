@extends('layouts.dashboard')

@section('title-tag')
نرخ رشد دانشجویان غیرایرانی و بین الملل واحدهای دانشگاهی
@endsection

@section('breadcrumb-title')
نرخ رشد دانشجویان غیرایرانی و بین الملل واحدهای دانشگاهی
@endsection

@section('page-title')
نرخ رشد دانشجویان غیرایرانی و بین الملل واحدهای دانشگاهی

<span>
    <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
</span>
<span>
    <a href="{{ route('international.student.growth.rate.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
</span>
@endsection

@section('styles-head')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="{{ asset('assets/datepicker/mds.bs.datetimepicker.style.css') }}" rel="stylesheet"/>
    <script src="{{ asset('assets/datepicker/mds.bs.datetimepicker.js') }}"></script>
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')



    <x-gostaresh.filter-table-list.filter-table-list-component :filterColumnsCheckBoxes="$filterColumnsCheckBoxes"
                                                               :yearSelectedList="$yearSelectedList"/>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-light">

                                <tr>
                                    <th>#</th>
                                    <th>شهرستان</th>
                                    @foreach($filterColumnsCheckBoxes as $key => $value)
                                    @if( filterCol($key))
                                        <th>{{$value}}</th>
                                    @endif
                                    @endforeach
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($internationalStudentGrowthRates as $key => $internationalStudentGrowthRate)
                                    <tr>
                                        <th scope="row">{{ $internationalStudentGrowthRates?->firstItem() + $key }}</th>

                                        <td>{{ $internationalStudentGrowthRate?->province?->name . ' - ' . $internationalStudentGrowthRate->county?->name }}</td>

                                        @if (filterCol('unit') == true)
                                        <td>{{ $internationalStudentGrowthRate?->unit }}</td>
                                        @endif
                                        @if (filterCol('department_of_education_title') == true)
                                        <td>{{ $internationalStudentGrowthRate?->department_of_education_title }}</td>
                                        @endif
                                        @if (filterCol('gender_title') == true)
                                        <td>{{ $internationalStudentGrowthRate?->gender_title }}</td>
                                        @endif
                                        @if (filterCol('kardani_count') == true)
                                        <td>{{ number_format($internationalStudentGrowthRate?->kardani_count) }}</td>
                                        @endif
                                        @if (filterCol('karshenasi_count') == true)
                                        <td>{{ number_format($internationalStudentGrowthRate?->karshenasi_count) }}</td>
                                        @endif
                                        @if (filterCol('karshenasi_arshad_count') == true)
                                        <td>{{ number_format($internationalStudentGrowthRate?->karshenasi_arshad_count) }}</td>
                                        @endif
                                        @if (filterCol('docktora_count') == true)
                                        <td>{{ number_format($internationalStudentGrowthRate?->docktora_count) }}</td>
                                        @endif
                                        @if (filterCol('year') == true)
                                        <td>{{ $internationalStudentGrowthRate?->year }}</td>
                                        @endif
                                        <td>

                                            <a href="{{ route('international.student.growth.rate.edit', $internationalStudentGrowthRate) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>

                                            <a href="{{ route('international.student.growth.rate.destroy', $internationalStudentGrowthRate) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $internationalStudentGrowthRates->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')

    <script src="{{ mix('/js/app.js') }}"></script>

@endsection