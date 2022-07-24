@extends('layouts.dashboard')

@section('title-tag')
تعداد دانشجویان غیرایرانی و بین الملل واحدهای دانشگاهی استان
@endsection

@section('breadcrumb-title')
تعداد دانشجویان غیرایرانی و بین الملل واحدهای دانشگاهی استان
@endsection

@section('page-title')
تعداد دانشجویان غیرایرانی و بین الملل واحدهای دانشگاهی استان
<span>
    <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
</span>
<span>
    <a href="{{ route('number.of.international.course.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                    <th>شهرستان</th>
                                    
                                    @foreach($filterColumnsCheckBoxes as $key => $value)
                                    @if( filterCol($key))
                                        <th>{{$value}}</th>
                                    @endif
                                    @endforeach
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($numberOfInternationalCourses as $key => $numberOfInternationalCourse)
                                    <tr>
                                        <th scope="row">{{ $numberOfInternationalCourses?->firstItem() + $key }}</th>


                                        <td>{{ $numberOfInternationalCourse?->province?->name . ' - ' . $numberOfInternationalCourse->county?->name }}
                                        </td>
                                    
                        
                                        @if (filterCol('unit') == true)
                                        <td>{{ $numberOfInternationalCourse?->unit }}</td>
                                        @endif
                                        @if (filterCol('department_of_education_title') == true)
                                        <td>{{ $numberOfInternationalCourse?->department_of_education_title }}</td>
                                        @endif
                                        @if (filterCol('gender_title') == true)
                                        <td>{{ $numberOfInternationalCourse?->gender_title }}</td>
                                        @endif
                                        @if (filterCol('kardani_count') == true)
                                        <td>{{ number_format($numberOfInternationalCourse?->kardani_count) }}</td>
                                        @endif
                                        @if (filterCol('karshenasi_count') == true)
                                        <td>{{ number_format($numberOfInternationalCourse?->karshenasi_count) }}</td>
                                        @endif
                                        @if (filterCol('karshenasi_arshad_count') == true)
                                        <td>{{ number_format($numberOfInternationalCourse?->karshenasi_arshad_count) }}</td>
                                        @endif
                                        @if (filterCol('docktora_count') == true)
                                        <td>{{ number_format($numberOfInternationalCourse?->docktora_count) }}</td>
                                        @endif
                                        @if (filterCol('year') == true)
                                        <td>{{ $numberOfInternationalCourse?->year }}</td>
                                        @endif
                                        <td>

                                            <a href="{{ route('number.of.international.course.edit', $numberOfInternationalCourse) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>

                                            <a href="{{ route('number.of.international.course.destroy', $numberOfInternationalCourse) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $numberOfInternationalCourses->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')

    <script src="{{ mix('/js/app.js') }}"></script>

@endsection