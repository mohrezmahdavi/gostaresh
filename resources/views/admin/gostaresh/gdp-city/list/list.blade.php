@extends('layouts.dashboard')

@section('title-tag')
    روند تغییرات سهم تولید ناخالص داخلی شهرستان
@endsection

@section('breadcrumb-title')
    روند تغییرات سهم تولید ناخالص داخلی شهرستان
@endsection

@section('page-title')
    روند تغییرات سهم تولید ناخالص داخلی شهرستان
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-light">
        
                                <tr>
                                    <th>#</th>
                                    <th>شهرستان </th>
                                    <th>مقدار </th>
                                    <th>سال</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gdpCities as $key => $gdpCity)
                                    <tr>
                                        <th scope="row">{{ $gdpCities?->firstItem() + $key }}</th>
        
                                        <td>{{ $gdpCity?->province?->name . ' - ' . $gdpCity->county?->name }}
                                        </td>
                                        <td>{{ $gdpCity?->amount }}</td>
                                        <td>{{ $gdpCity?->year }}</td>
                                        <td>
        
                                            <a href="{{ route('gdp.city.edit', $gdpCity) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>
        
                                            <a href="{{ route('gdp.city.destroy', $gdpCity) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>
        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
        
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $gdpCities->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
