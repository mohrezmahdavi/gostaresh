@extends('layouts.dashboard')

@section('title-tag')
    {{ __('titles.edit_group') }}
@endsection

@section('breadcrumb-title')
    {{ __('titles.edit_group') }}
@endsection

@section('page-title')
    {{ __('titles.edit_group') }}
    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route("admin.role.users.list",$role)}}" class="btn btn-success btn-sm">لیست کاربران این گروه</a>
    </span>

@endsection

@section('styles-head')
    <link href="{{ asset('assets/admin/custom/css/bootstrap-select.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('admin.partials.row-notifiy-col')
                    <form class="form-horizontal" method="POST" action="{{ route('admin.role.update',$role) }}"
                          role="form">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="name">
                                {{ __('validation.attributes.name') }}
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="name" name="name" value="{{ $role->name }}" class="form-control"
                                       placeholder="{{ __('validation.placeholders.role_name') }}">
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
                            <label class="col-sm-2 col-form-label"
                                   for="permissions">{{ __('validation.attributes.permissions') }}</label>

                            <div class="col-sm-10">
                                <select class="form-control selectpicker" id="permissions" name="permissions[]" multiple
                                        aria-label="multiple select example">
                                    @foreach ($permissions as $permission)
                                        <?php $flag = false ?>
                                        @foreach ($role->permissions as $isPermission)
                                            @if ($permission->id == $isPermission->id)
                                                <?php $flag = true ?>
                                            @endif
                                        @endforeach
                                        <option
                                            {{ ($flag == true)? 'selected' : '' }} value="{{ $permission->id }}">
                                            @foreach( explode("-",$permission->name) as $key=> $string)
                                                {{  $key!=1?__( 'titles.'.$string):" " }}
                                            @endforeach
                                        </option>
                                        <?php $flag = false ?>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('validation.buttons.edit') }}</button>
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
