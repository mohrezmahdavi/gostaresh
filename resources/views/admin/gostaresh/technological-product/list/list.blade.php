@extends('layouts.dashboard')

@section('title-tag')
     تعداد و محصولات فناورانه و نوآورانه اساتید و دانشجویان در دوره 10 سال
@endsection

@section('breadcrumb-title')
     تعداد و محصولات فناورانه و نوآورانه اساتید و دانشجویان در دوره 10 سال
@endsection

@section('page-title')
     تعداد و محصولات فناورانه و نوآورانه اساتید و دانشجویان در دوره 10 سال
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
                                <th>شهرستان</th>
                                <th>واحد</th>
                                <th>تعداد هسته فناور فعال</th>
                                <th>تعداد واحدهای فناور فعال</th>
                                <th>تعداد شرکت دانش بنیان فعال</th>
                                <th>تعداد شرکت های خلاق</th>
                                <th>تعداد طرح ها و ایده های فناورانه و نوآورانه تجاری سازی شده</th>
                                <th>تعداد محصولات دانش بنیان</th>
                                <th>تعداد محصولات بدون مجوز</th>
                                <th>تعداد محصولات با مجوز</th>
                                <th>تعداد استاد فناور فعال</th>
                                <th>تعداد دانشجوی فناور فعال</th>
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($technologicalProducts as $key => $technologicalProduct)
                                <tr>
                                    <th scope="row">{{ $technologicalProducts?->firstItem() + $key }}</th>
                                    <td>{{ $technologicalProduct?->province?->name . ' - ' . $technologicalProduct->county?->name }}
                                    <td>{{ $technologicalProduct?->unit}}</td>
                                    <td>{{ $technologicalProduct?->number_of_active_technology_cores}}</td>
                                    <td>{{ $technologicalProduct?->number_of_active_technology_units}}</td>
                                    <td>{{ $technologicalProduct?->number_of_active_knowledge_based_companies}}</td>
                                    <td>{{ $technologicalProduct?->number_of_creative_companies}}</td>
                                    <td>{{ $technologicalProduct?->number_of_commercialized_ideas}}</td>
                                    <td>{{ $technologicalProduct?->number_of_knowledge_based_products}}</td>
                                    <td>{{ $technologicalProduct?->number_of_products_without_license}}</td>
                                    <td>{{ $technologicalProduct?->number_of_licensed_products}}</td>
                                    <td>{{ $technologicalProduct?->number_of_active_technology_professors}}</td>
                                    <td>{{ $technologicalProduct?->number_of_active_technology_students}}</td>
                                    <td>{{ $technologicalProduct?->year }}</td>
                                    <td>

                                        <a href="{{ route('technological-product.edit', $technologicalProduct) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        {{--                                        <a href="{{ route('research-output-status-analyses.destroy', $technologicalProduct) }}" title="{{ __('validation.buttons.delete') }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $technologicalProducts->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
