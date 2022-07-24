@extends('layouts.dashboard')

@section('title-tag')
میزان ظرفیت پذیرش دانشجو
@endsection

@section('breadcrumb-title')
میزان ظرفیت پذیرش دانشجو
@endsection

@section('page-title')
میزان ظرفیت پذیرش دانشجو

<span>
    <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
</span>
<span>
    <a href="{{ route('student.admission.capacity.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
</span>
@endsection

@section('styles-head')

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
                                    @foreach($filterColumnsCheckBoxes as $key => $value)
                                    @if( filterCol($key))
                                        <th>{{$value}}</th>
                                    @endif
                                    @endforeach
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($studentAdmissionCapacities as $key => $studentAdmissionCapacity)
                                    <tr>
                                        <th scope="row">{{ $studentAdmissionCapacities?->firstItem() + $key }}</th>

                                        <td>{{ $studentAdmissionCapacity?->province?->name . ' - ' . $studentAdmissionCapacity->county?->name }}
                                        </td>
                                        @if (filterCol('university_type_title') == true)
                                        <td>{{ $studentAdmissionCapacity?->university_type_title }}</td>
                                        @endif
                                        @if (filterCol('gender_title') == true)
                                        <td>{{ $studentAdmissionCapacity?->gender_title }}</td>
                                        @endif
                                        @if (filterCol('department_of_education_title') == true)
                                        <td>{{ $studentAdmissionCapacity?->department_of_education_title }}</td>
                                        @endif
                                        @if (filterCol('student_admission_capacities') == true)
                                        <td>{{ number_format($studentAdmissionCapacity?->student_admission_capacities) }}</td>
                                        @endif
                                        @if (filterCol('year') == true)
                                        <td>{{ $studentAdmissionCapacity?->year }}</td>
                                        @endif
                                        <td>

                                            <a href="{{ route('student.admission.capacity.edit', $studentAdmissionCapacity) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>

                                            <a href="{{ route('student.admission.capacity.destroy', $studentAdmissionCapacity) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $studentAdmissionCapacities->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')

    <script src="{{ mix('/js/app.js') }}"></script>

@endsection