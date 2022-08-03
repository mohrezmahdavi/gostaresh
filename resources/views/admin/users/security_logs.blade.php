@extends('layouts.dashboard')

@section('title-tag')
    گزارش امنیتی کاربر
@endsection

@section('breadcrumb-title')
    گزارش امنیتی کاربر
@endsection

@section('page-title')
    گزارش امنیتی کاربر
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
                                <th>رویداد</th>
                                <th>آدرس آی پی</th>
                                <th>مرورگر</th>
                                <th>سیستم عامل</th>
                                <th>رخ داده در</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($logs as $key => $log)
                                <tr>
                                    <th scope="row">{{ $logs?->firstItem() + $key }}</th>
                                    <td>{{ $log?->event }}</td>

                                    <td>{{ $log?->ip_address }}</td>
                                    <td>
                                        {{$log?->browser}}
                                    </td>
                                    <td>
                                        {{$log?->operating_system}}
                                    </td>
                                    <td>
                                        {{ verta( $log?->created_at) }}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $logs->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')

@endsection
