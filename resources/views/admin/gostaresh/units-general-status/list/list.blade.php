@extends('layouts.dashboard')

@section('title-tag')
    تعداد وضعیت کلی واحدھا و مراکز آموزشی شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    تعداد وضعیت کلی واحدھا و مراکز آموزشی شھرستان ھای استان
@endsection

@section('page-title')
    تعداد وضعیت کلی واحدھا و مراکز آموزشی شھرستان ھای استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('units-general-status.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                <th>شهرستان</th>
                                <th>واحد</th>
                                <th>درجه/رتبه</th>
                                <th>امتیاز</th>
                                <th>سال تاسیس</th>
                                <th>تعداد و عناوین دانشکده مصوب</th>
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                            @foreach ($unitsGeneralStatuses as $key => $unitsGeneralStatus)
                                <tr>
                                    <th scope="row">{{ $unitsGeneralStatuses?->firstItem() + $key }}</th>
                                    <td>{{ $unitsGeneralStatus?->province?->name . ' - ' . $unitsGeneralStatus->county?->name }}
                                    <td>{{ $unitsGeneralStatus?->unit}}</td>
                                    <td>{{ $unitsGeneralStatus['degree/rank'] ?? ''}}</td>
                                    <td>{{ $unitsGeneralStatus?->score}}</td>
                                    <td>{{ $unitsGeneralStatus?->established_year}}</td>
                                    <td>{{ $unitsGeneralStatus?->approved_number_and_titles_of_the_faculty}}</td>
                                    <td>{{ $unitsGeneralStatus?->year }}</td>
                                    <td>

                                        <a href="{{ route('units-general-status.edit', $unitsGeneralStatus) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        {{--                                        <a href="{{ route('research-output-status-analyses.destroy', $unitsGeneralStatus) }}" title="{{ __('validation.buttons.delete') }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $unitsGeneralStatuses->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
