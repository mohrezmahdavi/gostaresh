@extends('layouts.dashboard')

@section('title-tag')
وضعیت اشتغال شهرستان های استان
@endsection

@section('breadcrumb-title')
وضعیت اشتغال شهرستان های استان
@endsection

@section('page-title')
وضعیت اشتغال شهرستان های استان

<span>
    <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
</span>
<span>
    <a href="{{ route('employment.of.provincial.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
</span>
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
                                    <th>کشاورزی، شکار و جنگلداری</th>
                                    <th>استخراج معدن - ساخت</th>
                                    <th>تامین آب، برق و گاز طبیعی</th>
                                    <th>ساختمان</th>
                                    <th>عمده فروشی، خرده فروشی، تعمیر وسایل نقلیه و تامین کالا</th>
                                    <th>هتل و رسنوران</th>
                                    <th>حمل و نقل، انبارداری و ارتباطات</th>
                                    <th>واسطه گری های مالی</th>
                                    <th>اداره امور عمومی و خدمات شهری، دفاع، و تامین اجتماعی</th>
                                    <th>آموزش</th>
                                    <th>بهداشت و مددکاری اجتماعی</th>
                                    <th>فعالیت های خانوارهای دارای مستخدم</th>
                                    <th>سازمان ها و هیات های برون مرزی</th>
                                    <th>املاک و مستغلات</th>
                                    <th>فعالیت های حرفه ای ، علمی و فنی</th>
                                    <th>اداری و خدمات پشتیبانی</th>
                                    <th>هنر  و سرگرمی</th>
                                    <th>سایر خدمات</th>
                                    <th>سال</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($employmentOfProvincials as $key => $employmentOfProvincial)
                                    <tr>
                                        <th scope="row">{{ $employmentOfProvincials?->firstItem() + $key }}</th>
        
                                        <td>{{ $employmentOfProvincial?->province?->name . ' - ' . $employmentOfProvincial->county?->name }}
                                        </td>
                                        <td>{{ number_format($employmentOfProvincial?->agriculture_hunting_forestry) }}</td>
                                        <td>{{ number_format($employmentOfProvincial?->mining_construction) }}</td>
                                        <td>{{ number_format($employmentOfProvincial?->water_electricity_natural_gas_supply) }}</td>
                                        <td>{{ number_format($employmentOfProvincial?->building) }}</td>
                                        <td>{{ number_format($employmentOfProvincial?->wholesale_retail_vehicle_repair_supply) }}</td>
                                        <td>{{ number_format($employmentOfProvincial?->hotel_and_restaurant) }}</td>
                                        <td>{{ number_format($employmentOfProvincial?->transportation_warehousing_communications) }}</td>
                                        <td>{{ number_format($employmentOfProvincial?->financial_intermediation) }}</td>
                                        <td>{{ number_format($employmentOfProvincial?->office_of_public_affairs_urban_services) }}</td>
                                        <td>{{ number_format($employmentOfProvincial?->education) }}</td>
                                        <td>{{ number_format($employmentOfProvincial?->health_and_social_work) }}</td>
                                        <td>{{ number_format($employmentOfProvincial?->activities_of_employed_households) }}</td>
                                        <td>{{ number_format($employmentOfProvincial?->overseas_organizations_and_delegations) }}</td>
                                        <td>{{ number_format($employmentOfProvincial?->real_estates) }}</td>
                                        <td>{{ number_format($employmentOfProvincial?->professional_scientific_technical_activities) }}</td>
                                        <td>{{ number_format($employmentOfProvincial?->office_and_support_services) }}</td>
                                        <td>{{ number_format($employmentOfProvincial?->art_and_entertainment) }}</td>
                                        <td>{{ number_format($employmentOfProvincial?->other_services) }}</td>
                                        <td>{{ $employmentOfProvincial?->year }}</td>
                                        <td>
        
                                            <a href="{{ route('employment.of.provincial.edit', $employmentOfProvincial) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>
        
                                            <a href="{{ route('employment.of.provincial.destroy', $employmentOfProvincial) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>
        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
        
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $employmentOfProvincials->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
