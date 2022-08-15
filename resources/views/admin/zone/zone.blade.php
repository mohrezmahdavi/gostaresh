@extends('layouts.dashboard')

@section('title-tag')
    مدیریت مناطق
@endsection

@section('breadcrumb-title')
    مدیریت مناطق
@endsection

@section('page-title')
    مدیریت مناطق
@endsection

@section('styles-head')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" id="app">
                    @include('admin.partials.row-notifiy-col')
                    <form class="form-horizontal" enctype="multipart/form-data" method="POST"
                        action="{{ route('admin.zone.store') }}" role="form">
                        @csrf

                        <div class="form-group row" id="province_div">
                            <label class="col-sm-2 col-form-label" for="province">
                                <span> استان ها </span>&nbsp
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control" id="province">
                                    @foreach($provinces as $province)
                                        <option @if(isset($_REQUEST['province_id'])) {{$_REQUEST['province_id'] == $province->id ? 'selected' : ''}} @endif
                                                id="{{$province->id}}">{{$province->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @foreach($counties as $county)
                            <div class="form-group row mt-2">
                                <label class="col-sm-2 col-form-label" for="{{$county->id}}">
                                    <span>{{$county->name}}</span>&nbsp
                                </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="{{$county->id}}" name="{{$county->id}}" value="{{ old($county->id) ?? $county->zone }}">
                                </div>
                            </div>
                        @endforeach
                        <input type="hidden" id="province_id" name="province_id" value="{{$_REQUEST['province_id'] ?? $provinces[0]->id}}">

                        <button type="submit" class="btn btn-primary  mt-3">ثبت</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>

    <script>
        $("#province").change(function() {
            window.location.href = "{{url()->current()}}?province_id=" + $(this).children(':selected').attr("id");
        });
    </script>
@endsection
