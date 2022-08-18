@extends('layouts.dashboard')

@section('title-tag')
    تعداد تحلیل وضعیت و مشخصات کارمندان دانشگاه در ھر یک از واحدھای شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    تعداد تحلیل وضعیت و مشخصات کارمندان دانشگاه در ھر یک از واحدھای شھرستان ھای استان
@endsection

@section('page-title')
    تعداد تحلیل وضعیت و مشخصات کارمندان دانشگاه در ھر یک از واحدھای شھرستان ھای استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
@can("create-any-EmployeeProfile")
    <span>
        <a href="{{ route('employee-profile.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
    </span>
 @endcan

@endsection

@section('styles-head')
@endsection


@section('content')
    @include('admin.partials.row-notifiy-col')

    <x-gostaresh.filter-table-list.filter-table-list-component :filterColumnsCheckBoxes="$filterColumnsCheckBoxes" :yearSelectedList="$yearSelectedList" :fieldsProvinceSelect="[
        'province' => true,
        'zone' => false,
        'county' => true,
        'city' => false,
    ]" />

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
                                    @foreach ($filterColumnsCheckBoxes as $key => $value)
                                        @if (filterCol($key))
                                            <th>{{ $value }}</th>
                                        @endif
                                    @endforeach
                                    <th>سال</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($employeeProfiles as $key => $employeeProfile)
                                    <tr>
                                        <th scope="row">{{ $employeeProfiles?->firstItem() + $key }}</th>
                                        <td>{{ $employeeProfile?->province?->name . ' - ' . $employeeProfile->county?->name }}
                                            @foreach ($filterColumnsCheckBoxes as $key => $value)
                                                @if (filterCol($key))
                                                    @if (in_array($key, \App\Models\Index\EmployeeProfile::$numeric_fields))
                                        <td>{{ $employeeProfile?->{$key} }}</td>
                                    @else
                                        <td>{{ $employeeProfile->{$key} }}</td>
                                @endif
                                @endif
                                @endforeach
                                <td>{{ $employeeProfile?->year }}</td>
                                <td>
@can("edit-any-EmployeeProfile")
                                 <a href="{{ route('employee-profile.edit', $employeeProfile) }}"
                                        title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i></a>
 @endcan
@can("delete-any-EmployeeProfile")
                                    <form method="POST" action="{{ route('employee-profile.destroy', $employeeProfile) }}" role="form">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button  type="submit" class="btn btn-danger btn-sm" title="{{ __('validation.buttons.delete') }}">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </form>
 @endcan
                                </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="text-end mt-3">
                            <x-exports.export-links
                                excelLink="{{ route('employee-profile.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('employee-profile.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('employee-profile.list.print', request()->query->all()) }}" />
                        </div>
                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $employeeProfiles->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
