{{--Table 40 View--}}
@extends('layouts.dashboard')

@section('title-tag')
ایجاد تعداد و محصولات فناورانه و نوآورانه اساتید و دانشجویان در دوره 10 سال
@endsection

@section('breadcrumb-title')
ایجاد تعداد و محصولات فناورانه و نوآورانه اساتید و دانشجویان در دوره 10 سال
@endsection

@section('page-title')
ایجاد تعداد و محصولات فناورانه و نوآورانه اساتید و دانشجویان در دوره 10 سال
@endsection

@section('styles-head')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" id="app">
                    @include('admin.partials.row-notifiy-col')
                    <form class="form-horizontal" method="POST" action="{{ route('technological-product.store') }}" role="form">
                        @csrf

                        <select-province-component></select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unit">
                                <span>واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit"
                                       value="{{ old('unit') }}" class="form-control"
                                       placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_active_technology_cores">
                                <span>تعداد هسته فناور فعال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_active_technology_cores" name="number_of_active_technology_cores"
                                       value="{{ old('number_of_active_technology_cores') }}" class="form-control"
                                       placeholder=" تعداد هسته فناور فعال را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_active_technology_units">
                                <span>تعداد واحدهای فناور فعال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_active_technology_units" name="number_of_active_technology_units"
                                       value="{{ old('number_of_active_technology_units') }}" class="form-control"
                                       placeholder=" تعداد واحدهای فناور فعال را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_active_knowledge_based_companies">
                                <span>تعداد شرکت دانش بنیان فعال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_active_knowledge_based_companies" name="number_of_active_knowledge_based_companies"
                                       value="{{ old('number_of_active_knowledge_based_companies') }}" class="form-control"
                                       placeholder=" تعداد شرکت دانش بنیان فعال را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_creative_companies">
                                <span>تعداد شرکت های خلاق </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_creative_companies" name="number_of_creative_companies"
                                       value="{{ old('number_of_creative_companies') }}" class="form-control"
                                       placeholder=" تعداد شرکت های خلاق را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_commercialized_ideas">
                                <span>تعداد طرح ها و ایده های فناورانه و نوآورانه تجاری سازی شده </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_commercialized_ideas" name="number_of_commercialized_ideas"
                                       value="{{ old('number_of_commercialized_ideas') }}" class="form-control"
                                       placeholder=" تعداد طرح ها و ایده های فناورانه و نوآورانه تجاری سازی شده را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_knowledge_based_products">
                                <span>تعداد محصولات دانش بنیان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_knowledge_based_products" name="number_of_knowledge_based_products"
                                       value="{{ old('number_of_knowledge_based_products') }}" class="form-control"
                                       placeholder=" تعداد محصولات دانش بنیان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_products_without_license">
                                <span>تعداد محصولات بدون مجوز </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_products_without_license" name="number_of_products_without_license"
                                       value="{{ old('number_of_products_without_license') }}" class="form-control"
                                       placeholder=" تعداد محصولات بدون مجوز را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_licensed_products">
                                <span>تعداد محصولات با مجوز </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_licensed_products" name="number_of_licensed_products"
                                       value="{{ old('number_of_licensed_products') }}" class="form-control"
                                       placeholder=" تعداد محصولات با مجوز را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_active_technology_professors">
                                <span>تعداد استاد فناور فعال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_active_technology_professors" name="number_of_active_technology_professors"
                                       value="{{ old('number_of_active_technology_professors') }}" class="form-control"
                                       placeholder=" تعداد استاد فناور فعال را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_active_technology_students">
                                <span>تعداد دانشجوی فناور فعال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_active_technology_students" name="number_of_active_technology_students"
                                       value="{{ old('number_of_active_technology_students') }}" class="form-control"
                                       placeholder=" تعداد دانشجوی فناور فعال را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="year">
                                <span> سال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="year" id="year" class="form-select">
                                    @for ($i = 1250; $i <= 1405; $i++)
                                        <option {{ $i == old('year') ? 'selected' : '' }} value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor

                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="month">
                                <span> ماه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="month" id="month" class="form-select">
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option {{ $i == old('month') ? 'selected' : '' }} value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor

                                </select>

                            </div>
                        </div>

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
