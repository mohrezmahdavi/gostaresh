@extends('layouts.dashboard')

@section('title-tag')
    ویرایش اطلاعات پروفایل کاربری
@endsection

@section('breadcrumb-title')
    ویرایش اطلاعات پروفایل کاربری
@endsection

@section('page-title')
    ویرایش اطلاعات پروفایل کاربری
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
                        action="{{ route('admin.profile.update') }}" role="form">
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


                        <button type="submit" class="btn btn-primary  mt-3">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
