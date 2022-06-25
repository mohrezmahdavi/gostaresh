@extends('layouts.dashboard-auth')

@section('content')
<div class="col-md-8 col-lg-6">
<div class="card">
    <div class="card-header bg-success pt-1 pb-1">
        <h4 class="text-white">ایجاد پروفایل کاربران روستایی</h4>
    </div>
    <div class="card-body p-4">
        @include('admin.partials.row-notifiy-col')
        
        {{-- <div class="text-center w-75 m-auto">
            <div class="auth-logo">
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
            </div>
            <p class="text-muted mb-4 mt-3">برای ورود، شماره همراه خود را وارد کنید.</p>
        </div> --}}

        <form method="POST" action="{{ route('phone.user.do.register') }}" id="app">
            @csrf
            <div class="form-group mb-3">
                <label for="first_name">نام</label>
                <input class="form-control @error('first_name') is-invalid @enderror" type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="نام خود را وارد کنید...">
                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="last_name">نام خانوادگی</label>
                <input class="form-control @error('last_name') is-invalid @enderror" type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="نام خانوادگی خود را وارد کنید...">
                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="phone_number">شماره همراه</label>
                <input class="form-control @error('phone_number') is-invalid @enderror" type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus placeholder="شماره همراه خود را وارد کنید...">
                @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3" >
                <label for="place">محل</label>
                <select-provice-city-component is_required="1" name_input="place"></select-provice-city-component>
                @error('place')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <user-type-select-component :user_types="{{ json_encode(__('titles.user_types')) }}"></user-type-select-component>
            
            <div class="form-group mb-3">
                <label for="product_type1">نوع محصول 1</label>
                <select name="product_type1" class="form-control" id="product_type1">
                  <option value="">انتخاب کنید...</option>
                  @if ($products != null)
                    @foreach ($products as $product)
                        <option value="{{ $product->getKey() }}">{{ $product->name }}</option>
                    @endforeach
                  @endif
                  
                </select>
              </div>
              <div class="form-group mb-3">
                <label for="product_type2">نوع محصول 2</label>
                <select name="product_type2" class="form-control" id="product_type2">
                  <option value="">انتخاب کنید...</option>
                  @if ($products != null)
                    @foreach ($products as $product)
                        <option value="{{ $product->getKey() }}">{{ $product->name }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
              <div class="form-group mb-3">
                <label for="product_type3">نوع محصول 3</label>
                <select name="product_type3" class="form-control" id="product_type3">
                  <option value="">انتخاب کنید...</option>
                  @if ($products != null)
                    @foreach ($products as $product)
                        <option value="{{ $product->getKey() }}">{{ $product->name }}</option>
                    @endforeach
                  @endif
                </select>
              </div>

              <div class="form-group mb-3">
                <label for="created_at">تاریخ ثبت</label>
                <input class="form-control " type="text" disabled id="created_at" name="created_at" value="{{ Verta::now()->format('Y-m-d') }}" >
                
            </div>

            <div class="form-group mb-0 text-center">
                <button class="btn btn-success btn-block" type="submit">ثبت نام</button>
            </div>

        </form>

        

    </div> <!-- end card-body -->
</div>
<!-- end card -->
</div>

@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection