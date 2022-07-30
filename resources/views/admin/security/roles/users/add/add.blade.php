@extends('layouts.dashboard')

@section('title-tag')

    افزودن کاربر به گروه {{ $role->name }}
@endsection

@section('breadcrumb-title')

    افزودن کاربر به گروه {{ $role->name }}
@endsection

@section('page-title')

    افزودن کاربر به گروه {{ $role->name }}
    <span>
        <a href="{{ route("admin.role.edit",$role)}}" class="btn btn-info btn-sm">جزئیات گروه</a>
    </span>
    <span>
        <a href="{{ route("admin.role.users.list",$role)}}" class="btn btn-success btn-sm">لیست کاربران این گروه</a>
    </span>
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
                                        <input type="text" id="full_name" name="full_name"
                                               value="{{ request()->full_name }}"
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

                                        @foreach (config('gostaresh.user_status') as $key => $value)

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                       id="inlineCheckbox{{ $key }}"
                                                       {{ request()->status == $key ? 'checked' : '' }} name="status"
                                                       value="{{ $key }}">
                                                <label class="form-check-label"
                                                       for="inlineCheckbox{{ $key }}">{{ config('gostaresh.user_status')[$key] }}</label>
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
                                <th>نام</th>
                                <th>تلفن تماس</th>
                                <th>وضعیت</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <th scope="row">{{ $users?->firstItem() + $key }}</th>
                                    <td>{{ $user?->first_name . ' ' . $user?->last_name }}</td>

                                    <td>{{ $user?->phone_number }}</td>
                                    <td>
                                        @foreach (config('gostaresh.user_status') as $key => $value)
                                            @if ($key == $user->status)
                                                {{ $value }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @can( 'edit-any-Role')
                                            <form
                                                action="{{ route('admin.role.user.add',[ "user"=>$user->id,"role"=>$role->id])}}"
                                                method="post">
                                                @csrf
                                                <button type="submit"
                                                        title="{{ __('validation.buttons.add') }}"
                                                        class="btn btn-success btn-sm"><i class="fa fa-plus"></i>
                                                </button>
                                            </form>
                                        @endcan
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
