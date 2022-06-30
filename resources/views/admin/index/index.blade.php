@extends('layouts.dashboard')

@section('title-tag')
@endsection

@section('breadcrumb-title')
@endsection

@section('page-title')
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
                                    <th>نام</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (config('gostaresh-urls.url') as $key => $value)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $value['title'] }}</td>

                                        <td>
                                            <a href="{{ route($value['name'] . '.create') }}"
                                            title="افزودن"
                                            class="btn btn-success btn-sm">افزودن</a>
                                            <a href="{{ route($value['name'] . '.index') }}"
                                            title="لیست"
                                            class="btn btn-info btn-sm">لیست</a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end table-responsive-->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
