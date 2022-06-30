@extends('layouts.dashboard')

@section('title-tag')
روند تغییرات سهم تولید ناخالص داخلی استان
@endsection

@section('breadcrumb-title')
روند تغییرات سهم تولید ناخالص داخلی استان
@endsection

@section('page-title')
روند تغییرات سهم تولید ناخالص داخلی استان
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
                                    <th>#</th>                                    <th>بخش </th>
                                    <th>شهرستان</th>
                                    <th>بخش</th>
                                    <th>مقدار</th>
                                    <th>سال</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gdpParts as $key => $gdpPart)
                                    <tr>
                                        <th scope="row">{{ $gdpParts?->firstItem() + $key }}</th>
                                        <td>{{ $gdpPart?->province?->name . ' - ' . $gdpPart->county?->name }}</td>
                                        <td>{{ $gdpPart?->part_title }}</td>
                                        <td>{{ $gdpPart?->amount }}</td>
                                        <td>{{ $gdpPart?->year }}</td>
                                        <td>
        
                                            <a href="{{ route('gdp.part.edit', $gdpPart) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>
        
                                            <a href="{{ route('gdp.part.destroy', $gdpPart) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>
        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
        
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $gdpParts->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
