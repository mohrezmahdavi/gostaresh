@extends('layouts.dashboard')

@section('title-tag')
تعداد  ثبت نام شدگان
@endsection

@section('breadcrumb-title')
تعداد  ثبت نام شدگان
@endsection

@section('page-title')
تعداد  ثبت نام شدگان

<span>
    <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
</span>
<span>
    <a href="{{ route('number.of.registrants.status.analysis.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                    @if (filterCol('number_of_registrants') == true)
                                    <th>مقدار</th>
                                    @endif
                                    @if (filterCol('year') == true)
                                        <th>سال</th>
                                    @endif
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($numberOfRegistrants as $key => $numberOfRegistrant)
                                    <tr>
                                        <th scope="row">{{ $numberOfRegistrants->firstItem() + $key }}</th>

                                        <td>{{ $numberOfRegistrant?->province?->name . ' - ' . $numberOfRegistrant->county?->name }}
                                        </td>
                                        
                                        @if (filterCol('university_type_title') == true)
                                        <td>{{ $numberOfRegistrant?->university_type_title }}</td>
                                        @endif
                                        @if (filterCol('gender_title') == true)
                                        <td>{{ $numberOfRegistrant?->gender_title }}</td>
                                        @endif
                                        @if (filterCol('department_of_education_title') == true)
                                        <td>{{ $numberOfRegistrant?->department_of_education_title }}</td>
                                        @endif
                                        @if (filterCol('number_of_registrants') == true)
                                        <td>{{ number_format($numberOfRegistrant?->number_of_registrants) }}</td>
                                        @endif
                                        @if (filterCol('year') == true)
                                        <td>{{ $numberOfRegistrant?->year }}</td>
                                        @endif
                                        <td>

                                            <a href="{{ route('number.of.registrants.status.analysis.edit', $numberOfRegistrant) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>

                                            <a href="{{ route('number.of.registrants.status.analysis.destroy', $numberOfRegistrant) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $numberOfRegistrants->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
