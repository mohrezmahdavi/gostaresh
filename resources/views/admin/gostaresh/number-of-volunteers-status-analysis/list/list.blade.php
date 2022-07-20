@extends('layouts.dashboard')

@section('title-tag')
تحلیل وضعیت تعداد داوطلبان
@endsection

@section('breadcrumb-title')
تحلیل وضعیت تعداد داوطلبان
@endsection

@section('page-title')
تحلیل وضعیت تعداد داوطلبان

<span>
    <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
</span>
<span>
    <a href="{{ route('number.of.volunteers.status.analysis.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                    <th>شهرستان </th>
                                    @if (filterCol('university_type_title') == true)
                                    <th>دانشگاه</th>
                                    @endif
                                    @if (filterCol('gender_title') == true)
                                    <th>جنسیت</th>
                                    @endif
                                    @if (filterCol('department_of_education_title') == true)
                                    <th>گروه عمده تحصیلی</th>
                                    @endif
                                    @if (filterCol('number_of_volunteers') == true)
                                    <th>مقدار</th>
                                    @endif
                                    @if (filterCol('year') == true)
                                        <th>سال</th>
                                    @endif
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($numberOfVolunteersStatusAnalyses as $key => $numberOfVolunteersStatusAnalysis)
                                    <tr>
                                        <th scope="row">{{ $numberOfVolunteersStatusAnalyses?->firstItem() + $key }}</th>

                                        <td>{{ $numberOfVolunteersStatusAnalysis?->province?->name . ' - ' . $numberOfVolunteersStatusAnalysis->county?->name }}
                                        </td>
                                        @if (filterCol('university_type_title') == true)
                                        <td>{{ $numberOfVolunteersStatusAnalysis?->university_type_title }}</td>
                                        @endif
                                        @if (filterCol('gender_title') == true)
                                        <td>{{ $numberOfVolunteersStatusAnalysis?->gender_title }}</td>
                                        @endif
                                        @if (filterCol('department_of_education_title') == true)
                                        <td>{{ $numberOfVolunteersStatusAnalysis?->department_of_education_title }}</td>
                                        @endif
                                        @if (filterCol('number_of_volunteers') == true)
                                        <td>{{ number_format($numberOfVolunteersStatusAnalysis?->number_of_volunteers) }}</td>
                                        @endif
                                        @if (filterCol('year') == true)
                                        <td>{{ $numberOfVolunteersStatusAnalysis?->year }}</td>
                                        @endif
                                        <td>

                                            <a href="{{ route('number.of.volunteers.status.analysis.edit', $numberOfVolunteersStatusAnalysis) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>

                                            <a href="{{ route('number.of.volunteers.status.analysis.destroy', $numberOfVolunteersStatusAnalysis) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $numberOfVolunteersStatusAnalyses->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
