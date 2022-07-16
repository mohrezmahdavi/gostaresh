@extends('layouts.dashboard')

@section('title-tag')
    افزودن کاربر جدید
@endsection

@section('breadcrumb-title')
    افزودن کاربر جدید
@endsection

@section('page-title')
    افزودن کاربر جدید
@endsection

@section('styles-head')
    <link href="{{ asset('assets/admin/custom/css/bootstrap-select.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" id="app">
                    @include('admin.partials.row-notifiy-col')
                    <form class="form-horizontal" method="POST" action="{{ route('admin.user.store') }}" role="form">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="first_name">
                                <span> نام </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                                    class="form-control" placeholder="نام خود را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="last_name">
                                <span> نام خانوادگی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                                    class="form-control" placeholder="نام خود را وارد کنید...">
                            </div>
                        </div>



                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="status">وضعیت</label>
                            <div class="col-sm-10">

                                <select class="form-control" required id="status_user" name="status">
                                    <option label="انتخاب کنید"></option>
                                    @foreach (config('gostaresh.user_status') as $key => $value)
                                        <option {{ (old('status') == $key) ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="role">نقش کاربری
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control selectpicker" multiple aria-label="multiple select example" id="roles" name="roles[]">
                                    @foreach ($all_roles_in_database as $role)
                                        <option value="{{ $role->id }}">
                                            {{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="phone_number">
                                <span> شماره همراه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}"
                                    class="form-control" placeholder="شماره همراه خود را وارد کنید...">
                            </div>
                        </div>

                        <select-province-component
                            province_default="{{ auth()->user()->province_id ?? '' }}"
                            county_default="{{ auth()->user()->county_id ?? '' }}"
                            city_default="{{ auth()->user()->city_id ?? '' }}"
                            rural_district_default="{{ auth()->user()->rural_district_id ?? '' }}">
                        </select-province-component>

                        <button type="submit" class="btn btn-primary  mt-3">افزودن</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="{{ asset('assets/admin/custom/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/custom/js/bootstrap-select.min.js') }}"></script>
@endsection
