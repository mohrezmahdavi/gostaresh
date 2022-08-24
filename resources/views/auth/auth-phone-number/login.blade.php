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
            <p class="text-muted mb-4 mt-2">برای ورود، شماره همراه خود را وارد کنید.</p>
        </div>

        <form method="POST" action="{{ route('do.login.phone') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="phone_number">شماره همراه</label>
                <input class="form-control @error('phone_number') is-invalid @enderror" type="tel" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus placeholder="شماره همراه خود را وارد کنید...">
                @error('phone_number')
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
                <span>برای ورود از طریق نام کاربری و رمز عبور </span>
                <a href="{{ route('login.username') }}">کلیک کنید . </a>
            </div>
        </div>

    </div> <!-- end card-body -->
</div>
<!-- end card -->
</div> <!-- end col -->


@endsection
