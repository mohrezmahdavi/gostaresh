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
                                @foreach ($amountOfFacilities as $key => $amountOfFacility)
                                    <tr>
                                        <th scope="row">{{ $amountOfFacilities?->firstItem() + $key }}</th>
                                        <td>{{ $amountOfFacility?->province?->name . ' - ' . $amountOfFacility->county?->name }}
                                            @foreach ($filterColumnsCheckBoxes as $key => $value)
                                                @if (filterCol($key))
                                                    @if (in_array($key, \App\Models\Index\AmountOfFacilitiesForResearchAchievements::$numeric_fields))
                                        <td>{{ $amountOfFacility?->{$key} }}</td>
                                    @else
                                        <td>{{ $amountOfFacility?->{$key} }}</td>
                                @endif
                                @endif
                                @endforeach
                                <td>{{ $amountOfFacility?->year }}</td>
                                <td>

                                    <a href="{{ route('amount-of-facilities.edit', $amountOfFacility) }}"
                                        title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i></a>

                                    {{-- <a href="{{ route('research-output-status-analyses.destroy', $amountOfFacility) }}" title="{{ __('validation.buttons.delete') }}" --}}
                                    {{-- class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a> --}}
                                </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="text-end mt-3">
                            <x-exports.export-links
                                excelLink="{{ route('amount-of-facilities.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('amount-of-facilities.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('amount-of-facilities.list.print', request()->query->all()) }}" />
                        </div>
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
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
