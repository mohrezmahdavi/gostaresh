@extends('layouts.dashboard')

@section('title-tag')
تحلیل وضعیت تعداد برنامه های درسی
@endsection

@section('breadcrumb-title')
تحلیل وضعیت تعداد برنامه های درسی
@endsection

@section('page-title')
تحلیل وضعیت تعداد برنامه های درسی
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
                                    <th>تعداد کل برنامه های درسی (رشته گرایش ها) </th>
                                    <th>تعداد برنامه های درسی بازنگری و اصلاح شده با رویکرد مهارت آموزی</th>
                                    <th>برنامه های درسی جدید میان رشته ای مورد اجرا</th>
                                    <th>کل برنامه های درسی جدید میان رشته ای مورد اجرا</th>
                                    <th>تعداد برنامه های درسی مشترک اجرا شده با سایر دانشگاه های جهان</th>
                                    <th>تعداد برنامه درسی تدوین شده جهت تاسیس رشته جدید تحصیلی توسط واحد دانشگاهی مورد نظر</th>
                                    <th>سال</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($statusAnalysisOfTheNumberOfCurriculas as $key => $statusAnalysisOfTheNumberOfCurricula)
                                    <tr>
                                        <th scope="row">{{ $statusAnalysisOfTheNumberOfCurriculas?->firstItem() + $key }}</th>
        

                                        <td>{{ $statusAnalysisOfTheNumberOfCurricula?->province?->name . ' - ' . $statusAnalysisOfTheNumberOfCurricula->county?->name }}
                                        </td>
                                        <td>{{ $statusAnalysisOfTheNumberOfCurricula?->unit }}</td>
                                        <td>{{ $statusAnalysisOfTheNumberOfCurricula?->total_number_of_curricula }}</td>
                                        <td>{{ $statusAnalysisOfTheNumberOfCurricula?->number_of_modified_curricula }}</td>
                                        <td>{{ $statusAnalysisOfTheNumberOfCurricula?->new_interdisciplinary_curricula_implemented }}</td>
                                        <td>{{ $statusAnalysisOfTheNumberOfCurricula?->complete_new_interdisciplinary_curricula }}</td>
                                        <td>{{ $statusAnalysisOfTheNumberOfCurricula?->number_of_common_curricula_with_the_world }}</td>
                                        <td>{{ $statusAnalysisOfTheNumberOfCurricula?->number_of_curricula_developed }}</td>

                                        <td>{{ $statusAnalysisOfTheNumberOfCurricula?->year }}</td>
                                        <td>
        
                                            <a href="{{ route('status.analysis.of.the.number.of.curricula.edit', $statusAnalysisOfTheNumberOfCurricula) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>
        
                                            <a href="{{ route('status.analysis.of.the.number.of.curricula.destroy', $statusAnalysisOfTheNumberOfCurricula) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $statusAnalysisOfTheNumberOfCurriculas->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
