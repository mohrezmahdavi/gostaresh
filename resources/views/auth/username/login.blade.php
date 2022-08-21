@extends('layouts.dashboard-auth')

@section('content')
<div class="col-md-8 col-lg-6 col-xl-4">
<div class="card">
    <div class="card-header bg-success pt-1 pb-1">
        <h4 class="text-white">ورود به سامانه</h4>
    </div>
    <div class="card-body p-4">
        @include('admin.partials.row-notifiy-col')
        
        <div class="text-center w-75 m-auto">
            {{-- <div class="auth-logo">
                <a href="index.html" class="logo logo-dark text-center">
                    <span class="logo-lg">
                        ورود
                        <img src="../assets/images/logo-dark.png" alt="" height="22">
                    </span>
                </a>

                <a href="index.html" class="logo logo-light text-center">
                    <span class="logo-lg">
                        ورود
                        <img src="../assets/images/logo-light.png" alt="" height="22">
                    </span>
                </a>
            </div> --}}
            <p class="text-muted mb-4 mt-2">برای ورود، نام کاربری و رمز عبور خود را وارد کنید.</p>
        </div>

        <form method="POST" action="{{ route('do.login.username') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="phone_number">نام کاربری</label>
                <input class="form-control @error('username') is-invalid @enderror" type="text" id="username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder=" نام کاربری خود را وارد کنید...">
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="password">رمز عبور</label>
                <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus placeholder="رمز عبور خود را وارد کنید...">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-0 text-center">
                <button class="btn btn-success btn-block" type="submit">ورود</button>
            </div>

        </form>

        <div class="row mt-4">
            <div class="col-md-12">
                <span>برای ورود از طریق شماره همراه  </span>
                <a href="{{ route('login') }}">کلیک کنید . </a>
            </div>
        </div>

    </div> <!-- end card-body -->
</div>
<!-- end card -->
</div> <!-- end col -->


@endsection
