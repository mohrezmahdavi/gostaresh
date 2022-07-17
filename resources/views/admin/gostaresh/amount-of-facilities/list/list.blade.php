@extends('layouts.dashboard')

@section('title-tag')
    تعداد میزان تسھیلات و حمایت ھای مالی صورت گرفته از دستاوردھای پژوھشی اساتید و دانشجویان در دوره 10 سال
@endsection

@section('breadcrumb-title')
    تعداد میزان تسھیلات و حمایت ھای مالی صورت گرفته از دستاوردھای پژوھشی اساتید و دانشجویان در دوره 10 سال
@endsection

@section('page-title')
    تعداد میزان تسھیلات و حمایت ھای مالی صورت گرفته از دستاوردھای پژوھشی اساتید و دانشجویان در دوره 10 سال

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('amount-of-facilities.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                <th>میزان</th>
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                            @foreach ($amountOfFacilities as $key => $amountOfFacility)
                                <tr>
                                    <th scope="row">{{ $amountOfFacilities?->firstItem() + $key }}</th>
                                    <td>{{ $amountOfFacility?->province?->name . ' - ' . $amountOfFacility->county?->name }}
                                    <td>{{ $amountOfFacility?->unit}}</td>
                                    <td>{{ number_format($amountOfFacility?->amount)}}</td>
                                    <td>{{ $amountOfFacility?->year }}</td>
                                    <td>

                                        <a href="{{ route('amount-of-facilities.edit', $amountOfFacility) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

{{--                                        <a href="{{ route('research-output-status-analyses.destroy', $amountOfFacility) }}" title="{{ __('validation.buttons.delete') }}"--}}
{{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $amountOfFacilities->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
