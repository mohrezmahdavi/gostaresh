@extends('layouts.dashboard')

@section('title-tag')
    ویرایش کاربر مورد نظر
@endsection

@section('breadcrumb-title')
    ویرایش کاربر مورد نظر
@endsection

@section('page-title')
    ویرایش کاربر مورد نظر
@endsection

@section('styles-head')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" id="app">
                    @include('admin.partials.row-notifiy-col')
                    <form class="form-horizontal" method="POST" action="{{ route('admin.user.update', $user) }}"
                        role="form">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="first_name">
                                <span> نام </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="first_name" name="first_name" value="{{ $user->first_name }}"
                                    class="form-control" placeholder="نام خود را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="last_name">
                                <span> نام خانوادگی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}"
                                    class="form-control" placeholder="نام خود را وارد کنید...">
                            </div>
                        </div>



                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="status">وضعیت</label>
                            <div class="col-sm-10">

                                <select class="form-control" required id="status_user" name="status">
                                    <option label="انتخاب کنید"></option>
                                    @foreach (config('gostaresh.user_status') as $key => $value)
                                        <option {{ $user->status == $key ? 'selected' : '' }}
                                            value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        {{-- <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="role">نقش کاربری
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>

                            </label>

                            <div class="col-sm-10">

                                <select class="form-control" required id="role" name="role">
                                    <option label="انتخاب کنید"></option>
                                    @foreach (config('gostaresh.user_roles') as $key => $value)
                                        <option {{ $user->role == $key ? 'selected' : '' }} value="{{ $key }}">
                                            {{ $value }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div> --}}


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="phone_number">
                                <span> شماره همراه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="phone_number" name="phone_number"
                                    value="{{ $user->phone_number }}" class="form-control"
                                    placeholder="شماره همراه خود را وارد کنید...">
                            </div>
                        </div>

                        <select-province-component province_default="{{ $user->province_id }}"
                                                   county_default="{{ $user->county_id }}"
                                                   city_default="{{ $user->city_id }}"
                                                   rural_district_default="{{ $user->rural_district_id }}">
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
@endsection
