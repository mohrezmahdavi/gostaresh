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
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')

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
                                    <th>دانشگاه </th>
                                    <th>جنسیت</th>
                                    <th>گروه عمده تحصیلی</th>
                                    <th>مقدار</th>
                                    <th>سال</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($numberOfRegistrants as $key => $numberOfRegistrant)
                                    <tr>
                                        <th scope="row">{{ $numberOfRegistrants->firstItem() + $key }}</th>

                                        <td>{{ $numberOfRegistrant?->province?->name . ' - ' . $numberOfRegistrant->county?->name }}
                                        </td>
                                        <td>{{ $numberOfRegistrant?->university_type_title }}</td>
                                        <td>{{ $numberOfRegistrant?->gender_title }}</td>
                                        <td>{{ $numberOfRegistrant?->department_of_education_title }}</td>
                                        <td>{{ $numberOfRegistrant?->number_of_registrants }}</td>
                                        <td>{{ $numberOfRegistrant?->year }}</td>
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
@endsection
