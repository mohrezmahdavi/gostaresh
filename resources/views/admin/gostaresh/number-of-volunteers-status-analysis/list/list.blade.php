@extends('layouts.dashboard')

@section('title-tag')
تحلیل وضعیت تعداد داوطلبان
@endsection

@section('breadcrumb-title')
تحلیل وضعیت تعداد داوطلبان
@endsection

@section('page-title')
تحلیل وضعیت تعداد داوطلبان
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
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($numberOfVolunteersStatusAnalyses as $key => $numberOfVolunteersStatusAnalysis)
                                    <tr>
                                        <th scope="row">{{ $numberOfVolunteersStatusAnalyses?->firstItem() + $key }}</th>

                                        <td>{{ $numberOfVolunteersStatusAnalysis?->province?->name . ' - ' . $numberOfVolunteersStatusAnalysis->county?->name }}
                                        </td>
                                        <td>{{ $numberOfVolunteersStatusAnalysis?->university_type_title }}</td>
                                        <td>{{ $numberOfVolunteersStatusAnalysis?->gender_title }}</td>
                                        <td>{{ $numberOfVolunteersStatusAnalysis?->department_of_education_title }}</td>
                                        <td>{{ $numberOfVolunteersStatusAnalysis?->number_of_volunteers }}</td>
                                        <td>{{ $numberOfVolunteersStatusAnalysis?->year }}</td>
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
@endsection
