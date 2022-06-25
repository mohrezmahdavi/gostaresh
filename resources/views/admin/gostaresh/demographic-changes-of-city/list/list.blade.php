@extends('layouts.dashboard')

@section('title-tag')
    لیست روند تحولات جمعیتی شهرستان های استان
@endsection

@section('breadcrumb-title')
    لیست روند تحولات جمعیتی شهرستان های استان
@endsection

@section('page-title')
    لیست روند تحولات جمعیتی شهرستان های استان
@endsection

@section('styles-head')

@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')

    <form action="" method="get">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class=" col-form-label" for="full_name">بر اساس نام</label>
                                    <div class="">
                                        <input type="text" id="full_name" name="full_name" value="{{ request()->full_name }}"
                                               class="form-control" placeholder="نام را وارد کنید ...">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class=" col-form-label" for="phone_number">شماره همراه</label>
                                    <div class="">
                                        <input type="text" id="phone_number" name="phone_number"
                                               value="{{ request()->phone_number }}" class="form-control"
                                               placeholder="شماره همراه را وارد کنید ...">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class=" col-form-label">بر اساس وضعیت</label>
                                    <div class="">

                                        @foreach (config('saan.user_status') as $key => $value)

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="inlineCheckbox{{ $key }}"
                                                       {{ request()->status == $key ? 'checked' : '' }} name="status" value="{{ $key }}">
                                                <label class="form-check-label"
                                                       for="inlineCheckbox{{ $key }}">{{ config('saan.user_status')[$key] }}</label>
                                            </div>

                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-3">
                            <div class="col">
                                <button type="submit" class="btn btn-success my-2 my-sm-0">جستجو</button>
                                <a href="{{ request()->url() }}" type="submit" class="btn btn-danger my-2 my-sm-0">حذف
                                    فیلتر</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-light">

                                <tr>
                                    <th>#</th>
                                    <th>سال</th>
                                    <th>جمعیت (نفر)</th>
                                    <th>نرخ مهاجرت</th>
                                    <th>نرخ رشد</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($demographicChangesOfCities as $key => $demographicChangesOfCity)
                                    <tr>
                                        <th scope="row">{{ $demographicChangesOfCities?->firstItem() + $key }}</th>
                                        <td>{{ $demographicChangesOfCity?->first_name . ' ' . $user?->last_name }}</td>

                                        <td>{{ $user?->phone_number }}</td>
                                        <td>
                                            @foreach (config('saan.user_status') as $key => $value)
                                                @if ($key == $user->status)
                                                    {{ $value }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>

                                            <a href="{{ route('admin.user.edit', $user) }}"
                                                title="{{ __('validation.buttons.edit') }}"
                                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                            
                                            <a href="{{ route('admin.user.delete', $user) }}"
                                                title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $users->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')

@endsection