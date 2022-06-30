@extends('layouts.dashboard')

@section('title-tag')
نرخ فقر شهرستان های استان	
@endsection

@section('breadcrumb-title')
نرخ فقر شهرستان های استان	
@endsection

@section('page-title')
نرخ فقر شهرستان های استان	
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
                                @foreach ($povertyOfProvincialCities as $key => $povertyOfProvincialCity)
                                    <tr>
                                        <th scope="row">{{ $povertyOfProvincialCities?->firstItem() + $key }}</th>
        
                                        <td>{{ $povertyOfProvincialCity?->province?->name . ' - ' . $povertyOfProvincialCity->county?->name }}
                                        </td>
                                        <td>{{ $povertyOfProvincialCity?->amount }}</td>
                                        <td>{{ $povertyOfProvincialCity?->year }}</td>
                                        <td>
        
                                            <a href="{{ route('poverty.of.provincial.city.edit', $povertyOfProvincialCity) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>
        
                                            <a href="{{ route('poverty.of.provincial.city.destroy', $povertyOfProvincialCity) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>
        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
        
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $povertyOfProvincialCities->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
