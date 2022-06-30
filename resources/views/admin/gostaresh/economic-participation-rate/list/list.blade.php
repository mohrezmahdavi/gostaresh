@extends('layouts.dashboard')

@section('title-tag')
وضعیت نرخ مشارکت اقتصادی	
@endsection

@section('breadcrumb-title')
وضعیت نرخ مشارکت اقتصادی	
@endsection

@section('page-title')
وضعیت نرخ مشارکت اقتصادی	
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
                                    <th>تحصیلات</th>
                                    <th>مقدار </th>
                                    <th>سال</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($economicParticipationRates as $key => $economicParticipationRate)
                                    <tr>
                                        <th scope="row">{{ $economicParticipationRates?->firstItem() + $key }}</th>
        
                                        <td>{{ $economicParticipationRate?->province?->name . ' - ' . $economicParticipationRate->county?->name }}
                                        </td>
                                        <td>{{ $economicParticipationRate?->education_title }}</td>
                                        <td>{{ $economicParticipationRate?->amount }}</td>
                                        <td>{{ $economicParticipationRate?->year }}</td>
                                        <td>
        
                                            <a href="{{ route('economic.participation.rate.edit', $economicParticipationRate) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>
        
                                            <a href="{{ route('economic.participation.rate.destroy', $economicParticipationRate) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>
        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
        
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $economicParticipationRates->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
