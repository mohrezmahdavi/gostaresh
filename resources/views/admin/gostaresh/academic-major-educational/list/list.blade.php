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
                                    <th>گروه تحصیلی </th>
                                    <th>دانشگاه آزاد اسلامی واحد</th>
                                    <th>دولتی</th>
                                    <th>پیام نور</th>
                                    <th>موسسات غیرانتفاعی</th>
                                    <th>علمی-کاربردی</th>

                                    <th>سال</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($academicMajorEducationals as $key => $academicMajorEducational)
                                    <tr>
                                        <th scope="row">{{ $academicMajorEducationals?->firstItem() + $key }}</th>
        
                                        <td>{{ $academicMajorEducational?->province?->name . ' - ' . $academicMajorEducational->county?->name }}
                                        </td>
                                        <td>{{ $academicMajorEducational?->department_of_education_title }}</td>
                                        <td>{{ $academicMajorEducational?->azad_eslami_count }}</td>
                                        <td>{{ $academicMajorEducational?->dolati_count }}</td>
                                        <td>{{ $academicMajorEducational?->payam_noor_count }}</td>
                                        <td>{{ $academicMajorEducational?->gheir_entefai_count }}</td>
                                        <td>{{ $academicMajorEducational?->elmi_karbordi_count }}</td>
                                        <td>{{ $academicMajorEducational?->year }}</td>
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
@endsection
