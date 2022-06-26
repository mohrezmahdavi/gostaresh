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
                    <form class="form-horizontal" method="POST" action="{{ route('number.student.population.update', $numberStudentPopulation) }}" role="form">
                        @csrf

                        <select-province-component 
                            province_default="{{ $numberStudentPopulation->province_id }}" 
                            county_default="{{ $numberStudentPopulation->county_id }}" 
                            city_default="{{ $numberStudentPopulation->city_id }}"  
                            rural_district_default="{{ $numberStudentPopulation->rural_district_id }}">
                        </select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="gender_id">
                                <span>جنسیت  </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="gender_id" id="gender_id" class="form-select" >
                                    @foreach (config('gostaresh.gender') as $key => $value)
                                    <option {{ ($key == $numberStudentPopulation->gender_id ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>

                        <select-grade-component
                            grade_default="{{ $numberStudentPopulation->grade_id }}"
                            sub_grade_default="{{ $numberStudentPopulation->sub_grade_id }}"
                            major_default="{{ $numberStudentPopulation->major_id }}"
                            minor_default="{{ $numberStudentPopulation->minor_id }}"
                        >
                        </select-grade-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_persons">
                                <span> تعداد نفرات </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_persons" name="number_of_persons" value="{{ $numberStudentPopulation->number_of_persons }}"
                                    class="form-control" placeholder="تعداد نفرات را وارد کنید...">
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
                                    <option {{ ($i == $numberStudentPopulation->year ? 'selected' : '') }} value="{{ $i }}">{{ $i }}</option>
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
                                    <option {{ ($i == $numberStudentPopulation->month ? 'selected' : '') }} value="{{ $i }}">{{ $i }}</option>
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
