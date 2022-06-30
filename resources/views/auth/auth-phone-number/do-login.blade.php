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
            <p class="text-muted mb-4 mt-2">لطفا کد فعال سازی را وارد کنید.</p>
        </div>

        <form method="POST" action="{{ route('do.login.phone.verify') }}">
            @csrf
            <div class="form-group mb-3">
                <input type="hidden" name="next" value="{{ app('request')->next }}">
                <input type="hidden" name="phone_number" value="{{ $phone_number }}">
                <label for="code">کد تایید</label>
                <input class="form-control @error('code') is-invalid @enderror" type="text" id="code" name="code"  required autocomplete="off"  autofocus placeholder="کد تایید را وارد کنید...">
                @error('code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-0 text-center">
                <button class="btn btn-success btn-block" type="submit">ورود</button>
            </div>

        </form>
        <div class="row mt-2">
            <div class="col-md-12">
                <form method="POST" action="{{ route('do.login.phone') }}" >
                    @csrf
                    <input type="hidden" name="phone_number"  value="{{ $phone_number }}">
                    <input type="submit" style="border: none; background-color: white; " class="link-dark" value="ارسال مجدد کد تایید">
                </form>
            </div>
            
        </div>

        

    </div> <!-- end card-body -->
</div>
<!-- end card -->
</div>

@endsection
