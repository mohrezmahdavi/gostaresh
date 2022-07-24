@extends('layouts.dashboard')

@section('title-tag')
تحلیل وضعیت شاخص ها و برنامه های فرهنگی
@endsection

@section('breadcrumb-title')
تحلیل وضعیت شاخص ها و برنامه های فرهنگی
@endsection

@section('page-title')
تحلیل وضعیت شاخص ها و برنامه های فرهنگی

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('cultural-indicators.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                            @foreach ($culturalIndicators as $key => $culturalIndicator)
                                <tr>
                                    <th scope="row">{{ $culturalIndicators?->firstItem() + $key }}</th>
                                    <td>{{ $culturalIndicator?->province?->name . ' - ' . $culturalIndicator->county?->name }}
                                    @foreach( $filterColumnsCheckBoxes as $key => $value)

                                        @if(in_array($key , \App\Models\Index\CulturalIndicatorsStatusAnalysis::$numeric_fields))
                                            <td>{{ number_format($culturalIndicator?->{$key}) }}</td>
                                        @else
                                            <td>{{ $culturalIndicator?->{$key} }}</td>
                                        @endif
                                    @endforeach

                                    <td>{{ $culturalIndicator?->year }}</td>
                                    <td>

                                        <a href="{{ route('cultural-indicators.edit', $culturalIndicator) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        {{--                                        <a href="{{ route('research-output-status-analyses.destroy', $culturalIndicator) }}" title="{{ __('validation.buttons.delete') }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $culturalIndicators->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
