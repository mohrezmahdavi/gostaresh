@extends('layouts.dashboard')

@section('title-tag')
نرخ پوشش تحصیلی بر حسب گروه عمده تحصیلی
@endsection

@section('breadcrumb-title')
نرخ پوشش تحصیلی بر حسب گروه عمده تحصیلی
@endsection

@section('page-title')
نرخ پوشش تحصیلی بر حسب گروه عمده تحصیلی

<span>
    <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
</span>
<span>
    <a href="{{ route('academic.major.educational.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                    
                                    @if (filterCol('department_of_education_title') == true)
                                        <th>گروه تحصیلی</th>
                                    @endif
                                    @if (filterCol('azad_eslami_count') == true)
                                        <th>دانشگاه آزاد اسلامی واحد</th>
                                    @endif
                                    @if (filterCol('dolati_count') == true)
                                        <th>دولتی</th>
                                    @endif
                                    @if (filterCol('payam_noor_count') == true)
                                        <th>پیام نور</th>
                                    @endif
                                    @if (filterCol('gheir_entefai_count') == true)
                                        <th>موسسات غیرانتفاعی</th>
                                    @endif
                                    @if (filterCol('elmi_karbordi_count') == true)
                                        <th>علمی-کاربردی</th>
                                    @endif
                                    @if (filterCol('year') == true)
                                        <th>سال</th>
                                    @endif
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($academicMajorEducationals as $key => $academicMajorEducational)
                                    <tr>
                                        <th scope="row">{{ $academicMajorEducationals?->firstItem() + $key }}</th>

                                        <td>{{ $academicMajorEducational?->province?->name . ' - ' . $academicMajorEducational->county?->name }}
                                        </td>

                                        @if (filterCol('department_of_education_title') == true)
                                        <td>{{ $academicMajorEducational?->department_of_education_title }}</td>
                                        @endif
                                        @if (filterCol('azad_eslami_count') == true)
                                        <td>{{ number_format($academicMajorEducational?->azad_eslami_count) }}</td>
                                        @endif
                                        @if (filterCol('dolati_count') == true)
                                        <td>{{ number_format($academicMajorEducational?->dolati_count) }}</td>
                                        @endif
                                        @if (filterCol('payam_noor_count') == true)
                                        <td>{{ number_format($academicMajorEducational?->payam_noor_count) }}</td>
                                        @endif
                                        @if (filterCol('gheir_entefai_count') == true)
                                        <td>{{ number_format($academicMajorEducational?->gheir_entefai_count) }}</td>
                                        @endif
                                        @if (filterCol('elmi_karbordi_count') == true)
                                        <td>{{ number_format($academicMajorEducational?->elmi_karbordi_count) }}</td>
                                        @endif
                                        @if (filterCol('year') == true)
                                        <td>{{ $academicMajorEducational?->year }}</td>
                                        @endif
                                        <td>

                                            <a href="{{ route('academic.major.educational.edit', $academicMajorEducational) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>

                                            <a href="{{ route('academic.major.educational.destroy', $academicMajorEducational) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $academicMajorEducationals->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection

