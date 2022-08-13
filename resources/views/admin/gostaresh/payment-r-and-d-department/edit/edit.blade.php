@extends('layouts.dashboard')

@section('title-tag')
    ویرایش روند تغییرات میزان هزینه کرد در بخش R&D
@endsection

@section('breadcrumb-title')
    ویرایش روند تغییرات میزان هزینه کرد در بخش R&D
@endsection

@section('page-title')
    ویرایش روند تغییرات میزان هزینه کرد در بخش R&D

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>

    <span>
        <a href="{{ route('payment.r.and.d.department.index') }}" class="btn btn-secondary btn-sm">بازگشت به لیست اطلاعات</a>
    </span>
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" id="app">
                    <form class="form-horizontal" method="POST"
                        action="{{ route('payment.r.and.d.department.update', $paymentRAndDDepartment) }}" role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $paymentRAndDDepartment->province_id }}"
                            zone_default="{{ $paymentRAndDDepartment->county->zone }}"
                            county_default="{{ $paymentRAndDDepartment->county_id }}"
                            city_default="{{ $paymentRAndDDepartment->city_id }}"
                            rural_district_default="{{ $paymentRAndDDepartment->rural_district_id }}"
                            :fields="{{ json_encode([
                                'province' => true,
                                'zone' => false,
                                'county' => true,
                                'city' => false,
                            ]) }}">
                        </select-province-component>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="amount_payment_rd">
                                <span>میزان هزینه کرد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" style="direction: rtl" id="amount_payment_rd" name="amount_payment_rd"
                                    value="{{ $paymentRAndDDepartment->amount }}" class="form-control"
                                    placeholder="میزان هزینه کرد را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$paymentRAndDDepartment->year" min="1390" max="1400" :required="false" name="year"></x-select-year>

                        {{-- <x-select-month :default="$paymentRAndDDepartment->month" :required="false" name="month"></x-select-month> --}}



                        <button type="submit" class="btn btn-primary  mt-3">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
