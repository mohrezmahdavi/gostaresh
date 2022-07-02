@extends('layouts.dashboard')

@section('title-tag')
    تعداد انتقال فناوری و نوآوری در عرصه بین المللی در دوره 10 سال
@endsection

@section('breadcrumb-title')
    تعداد انتقال فناوری و نوآوری در عرصه بین المللی در دوره 10 سال
@endsection

@section('page-title')
    تعداد انتقال فناوری و نوآوری در عرصه بین المللی در دوره 10 سال
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
                                <th>تعداد مشارکت در انتقال دانش فنی/ فناوری انتقال یافته از خارج به داخل کشور</th>
                                <th>تعداد خدمات فنی و مشاوره ای ارایه شده به موسسات یا شرکت های خارجی</th>
                                <th>میزان کسب درآمد از خدمات فنی و مشاوره ای بین المللی</th>
                                <th>تعداد ثبت و یا فایلینگ اختراعات بین المللی</th>
                                <th>تعداد شرکت های دانش بنیان با فعالیت بین المللی</th>
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($internationalTechnologies as $key => $internationalTechnology)
                                <tr>
                                    <th scope="row">{{ $internationalTechnologies?->firstItem() + $key }}</th>
                                    <td>{{ $internationalTechnology?->province?->name . ' - ' . $internationalTechnology->county?->name }}
                                    <td>{{ $internationalTechnology?->unit}}</td>
                                    <td>{{ $internationalTechnology?->number_of_participation}}</td>
                                    <td>{{ $internationalTechnology?->number_of_technical_services}}</td>
                                    <td>{{ $internationalTechnology?->earnings}}</td>
                                    <td>{{ $internationalTechnology?->number_of_international_inventions}}</td>
                                    <td>{{ $internationalTechnology?->number_of_international_knowledge_based_companies}}</td>
                                    <td>{{ $internationalTechnology?->year }}</td>
                                    <td>

                                        <a href="{{ route('international-technology.edit', $internationalTechnology) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        {{--                                        <a href="{{ route('research-output-status-analyses.destroy', $internationalTechnology) }}" title="{{ __('validation.buttons.delete') }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $internationalTechnologies->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
