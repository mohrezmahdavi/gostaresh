@extends('layouts.dashboard')

@section('title-tag')
    ویرایش وضعیت جغرافیایی واحد و دسترسی به آن در استان
@endsection

@section('breadcrumb-title')
ویرایش وضعیت جغرافیایی واحد و دسترسی به آن در استان
@endsection

@section('page-title')
ویرایش وضعیت جغرافیایی واحد و دسترسی به آن در استان
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" id="app">
                    @include('admin.partials.row-notifiy-col')
                    <form class="form-horizontal" method="POST" action="{{ route('geographical.location.unit.update', $geographicalLocationOfUnit) }}" role="form">
                        @csrf

                        <select-province-component 
                            province_default="{{ $geographicalLocationOfUnit->province_id }}" 
                            county_default="{{ $geographicalLocationOfUnit->county_id }}" 
                            city_default="{{ $geographicalLocationOfUnit->city_id }}"  
                            rural_district_default="{{ $geographicalLocationOfUnit->rural_district_id }}">
                        </select-province-component>
                        
                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unit_university">
                                <span> واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit_university" name="unit_university" value="{{ $geographicalLocationOfUnit->unit_university }}"
                                    class="form-control" placeholder="واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="university_building">
                                <span> ساختمان واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="university_building" name="university_building" value="{{ $geographicalLocationOfUnit->university_building }}"
                                    class="form-control" placeholder="ساختمان واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="distance_from_population_density_of_city">
                                <span> فاصله از تراکم جمعیتی شهر </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="distance_from_population_density_of_city" name="distance_from_population_density_of_city" value="{{ $geographicalLocationOfUnit->distance_from_population_density_of_city }}"
                                    class="form-control" placeholder="فاصله از تراکم جمعیتی شهر را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="distance_from_center_of_province">
                                <span> فاصله از مرکز استان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="distance_from_center_of_province" name="distance_from_center_of_province" value="{{ $geographicalLocationOfUnit->distance_from_center_of_province }}"
                                    class="form-control" placeholder="فاصله از مرکز استان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="climate_type_and_weather_conditions">
                                <span> نوع اقلیم و شرایط آب و هوایی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="climate_type_and_weather_conditions" id="climate_type_and_weather_conditions" class="form-select" >
                                    @foreach (config('gostaresh.climates') as $key => $value)
                                    <option {{ ($key == $geographicalLocationOfUnit->climate_type_and_weather_conditions ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="distance_to_the_nearest_higher_education_center">
                                <span> فاصله تا نزدیکترین مرکز آموزش عالی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="distance_to_the_nearest_higher_education_center" name="distance_to_the_nearest_higher_education_center" value="{{ $geographicalLocationOfUnit->distance_to_the_nearest_higher_education_center }}"
                                    class="form-control" placeholder="فاصله تا نزدیکترین مرکز آموزش عالی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="distance_to_the_nearest_unit_of_azad_university">
                                <span> فاصله تا نزدیکترین واحد دانشگاه آزاد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="distance_to_the_nearest_unit_of_azad_university" name="distance_to_the_nearest_unit_of_azad_university" value="{{ $geographicalLocationOfUnit->distance_to_the_nearest_higher_education_center }}"
                                    class="form-control" placeholder="فاصله تا نزدیکترین واحد دانشگاه آزاد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="level_and_quality_of_access">
                                <span> سطح و کیفیت دسترسی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="level_and_quality_of_access" id="level_and_quality_of_access" class="form-select" >
                                    @foreach (config('gostaresh.qualities') as $key => $value)
                                    <option {{ ($key == $geographicalLocationOfUnit->level_and_quality_of_access ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="international_opportunities_geographical_location">
                                <span> فرصت های بین الملی موقعیت جغرافیایی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="international_opportunities_geographical_location" id="international_opportunities_geographical_location" class="form-select" >
                                    @foreach (config('gostaresh.qualities') as $key => $value)
                                    <option {{ ($key == $geographicalLocationOfUnit->international_opportunities_geographical_location ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="year">
                                <span> سال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="year" id="year" class="form-select" >
                                    @for ($i = 1250; $i <= 1405; $i++)
                                    <option {{ ($i == $geographicalLocationOfUnit->year ? 'selected' : '') }} value="{{ $i }}">{{ $i }}</option>
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
                                <select name="month" id="month" class="form-select" >
                                    @for ($i = 1; $i <= 12; $i++)
                                    <option {{ ($i == $geographicalLocationOfUnit->month ? 'selected' : '') }} value="{{ $i }}">{{ $i }}</option>
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
