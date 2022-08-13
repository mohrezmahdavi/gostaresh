{{-- Table 40 View --}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش تعداد و محصولات فناورانه و نوآورانه اساتید و دانشجویان در دوره 10 سال
@endsection

@section('breadcrumb-title')
    ویرایش تعداد و محصولات فناورانه و نوآورانه اساتید و دانشجویان در دوره 10 سال
@endsection

@section('page-title')
    ویرایش تعداد و محصولات فناورانه و نوآورانه اساتید و دانشجویان در دوره 10 سال

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>

    <span>
        <a href="{{ route('technological-product.index') }}" class="btn btn-secondary btn-sm">بازگشت به لیست اطلاعات</a>
    </span>
@endsection

@section('styles-head')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" id="app">
                    @include('admin.partials.row-notifiy-col')
                    <form class="form-horizontal" method="POST"
                        action="{{ route('technological-product.update', $technologicalProduct) }}" role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $technologicalProduct->province_id ?? ''}}"
                            zone_default="{{ $technologicalProduct->county->zone ?? ''}}"
                            county_default="{{ $technologicalProduct->county_id ?? ''}}"
                            city_default="{{ $technologicalProduct->city_id ?? ''}}"
                            rural_district_default="{{ $technologicalProduct->rural_district_id ?? ''}}"
                            :fields="{{ json_encode([
                                'province' => true,
                                'zone' => false,
                                'county' => true,
                                'city' => false,
                            ]) }}">
                        </select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unit">
                                <span>واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit"
                                    value="{{ $technologicalProduct->unit }}" class="form-control"
                                    placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_active_technology_cores">
                                <span>تعداد هسته فناور فعال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_active_technology_cores"
                                    name="number_of_active_technology_cores"
                                    value="{{ $technologicalProduct->number_of_active_technology_cores }}"
                                    class="form-control" placeholder=" تعداد هسته فناور فعال را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_active_technology_units">
                                <span>تعداد واحدهای فناور فعال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_active_technology_units"
                                    name="number_of_active_technology_units"
                                    value="{{ $technologicalProduct->number_of_active_technology_units }}"
                                    class="form-control" placeholder=" تعداد واحدهای فناور فعال را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_active_knowledge_based_companies">
                                <span>تعداد شرکت دانش بنیان فعال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_active_knowledge_based_companies"
                                    name="number_of_active_knowledge_based_companies"
                                    value="{{ $technologicalProduct->number_of_active_knowledge_based_companies }}"
                                    class="form-control" placeholder=" تعداد شرکت دانش بنیان فعال را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_creative_companies">
                                <span>تعداد شرکت های خلاق </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_creative_companies" name="number_of_creative_companies"
                                    value="{{ $technologicalProduct->number_of_creative_companies }}" class="form-control"
                                    placeholder=" تعداد شرکت های خلاق را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_commercialized_ideas">
                                <span>تعداد طرح ها و ایده های فناورانه و نوآورانه تجاری سازی شده </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_commercialized_ideas"
                                    name="number_of_commercialized_ideas"
                                    value="{{ $technologicalProduct->number_of_commercialized_ideas }}"
                                    class="form-control"
                                    placeholder=" تعداد طرح ها و ایده های فناورانه و نوآورانه تجاری سازی شده را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_knowledge_based_products">
                                <span>تعداد محصولات دانش بنیان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_knowledge_based_products"
                                    name="number_of_knowledge_based_products"
                                    value="{{ $technologicalProduct->number_of_knowledge_based_products }}"
                                    class="form-control" placeholder=" تعداد محصولات دانش بنیان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_products_without_license">
                                <span>تعداد محصولات بدون مجوز </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_products_without_license"
                                    name="number_of_products_without_license"
                                    value="{{ $technologicalProduct->number_of_products_without_license }}"
                                    class="form-control" placeholder=" تعداد محصولات بدون مجوز را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_licensed_products">
                                <span>تعداد محصولات با مجوز </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_licensed_products" name="number_of_licensed_products"
                                    value="{{ $technologicalProduct->number_of_licensed_products }}" class="form-control"
                                    placeholder=" تعداد محصولات با مجوز را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_active_technology_professors">
                                <span>تعداد استاد فناور فعال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_active_technology_professors"
                                    name="number_of_active_technology_professors"
                                    value="{{ $technologicalProduct->number_of_active_technology_professors }}"
                                    class="form-control" placeholder=" تعداد استاد فناور فعال را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_active_technology_students">
                                <span>تعداد دانشجوی فناور فعال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_active_technology_students"
                                    name="number_of_active_technology_students"
                                    value="{{ $technologicalProduct->number_of_active_technology_students }}"
                                    class="form-control" placeholder=" تعداد دانشجوی فناور فعال را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="year">
                                <span> سال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="year" id="year" class="form-select">
                                    @for ($i = config('gostaresh.year.min', 1370); $i <= config('gostaresh.year.max', 1405); $i++)
                                        <option {{ $i == $technologicalProduct->year ? 'selected' : '' }}
                                            value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor

                                </select>

                            </div>
                        </div>

                        {{-- <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="month">
                                <span> ماه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="month" id="month" class="form-select">
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option {{ $i == $technologicalProduct->month ? 'selected' : '' }}
                                            value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor

                                </select>

                            </div>
                        </div> --}}

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
