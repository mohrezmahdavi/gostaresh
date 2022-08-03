@extends('layouts.dashboard')

@section('title-tag')
    {{ __('titles.new_group') }}
@endsection

@section('breadcrumb-title')
    {{ __('titles.new_group') }}
@endsection

@section('page-title')
    {{ __('titles.new_group') }}
@endsection

@section('styles-head')
    <link href="{{ asset('assets/admin/custom/css/bootstrap-select.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" id="app">
                    @include('admin.partials.row-notifiy-col')
                    <form class="form-horizontal" method="POST" action="{{ route('admin.role.store') }}" role="form">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="name">
                                {{ __('validation.attributes.name') }}
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control"
                                       placeholder="{{ __('validation.attributes.name') }}">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="guard_name">
                                {{ __('validation.attributes.guard') }}
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="guard_name" id="">
                                    @foreach($guards as $key=>$guard)
                                        <option value="{{$guard}}">{{$guard}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="permissions">
                                <span>{{ __('validation.attributes.permissions') }}</span>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control selectpicker" multiple aria-label="multiple select example"
                                        id="permissions" name="permissions[]">

                                    @foreach ($permissions as $permission)
                                        <option class="permission-option" value="{{ $permission->id }}">
                                            @foreach( explode("-",$permission->name) as $key=> $string)
                                                {{  $key!=1?__( 'titles.'.$string):" " }}
                                            @endforeach
                                        </option>
                                    @endforeach

                                </select>

                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary  mt-3">{{ __("validation.buttons.add") }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ asset('assets/admin/custom/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/custom/js/bootstrap-select.min.js') }}"></script>

@endsection
