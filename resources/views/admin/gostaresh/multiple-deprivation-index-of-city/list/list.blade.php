@extends('layouts.dashboard')

@section('title-tag')
تحلیل وضعیت شاخص محرومیت چندگانه			
@endsection

@section('breadcrumb-title')
تحلیل وضعیت شاخص محرومیت چندگانه			
@endsection

@section('page-title')
تحلیل وضعیت شاخص محرومیت چندگانه	
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
                                @foreach ($multipleDeprivationIndexOfCities as $key => $multipleDeprivationIndexOfCity)
                                    <tr>
                                        <th scope="row">{{ $multipleDeprivationIndexOfCities?->firstItem() + $key }}</th>
        
                                        <td>{{ $multipleDeprivationIndexOfCity?->province?->name . ' - ' . $multipleDeprivationIndexOfCity->county?->name }}
                                        </td>
                                        <td>{{ $multipleDeprivationIndexOfCity?->amount }}</td>
                                        <td>{{ $multipleDeprivationIndexOfCity?->year }}</td>
                                        <td>
        
                                            <a href="{{ route('multiple.deprivation.index.of.city.edit', $multipleDeprivationIndexOfCity) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>
        
                                            <a href="{{ route('multiple.deprivation.index.of.city.destroy', $multipleDeprivationIndexOfCity) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>
        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
        
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $multipleDeprivationIndexOfCities->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
