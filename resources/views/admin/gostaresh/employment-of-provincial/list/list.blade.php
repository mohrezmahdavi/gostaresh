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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="{{ asset('assets/datepicker/mds.bs.datetimepicker.style.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/datepicker/mds.bs.datetimepicker.js') }}"></script>
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')

    <x-gostaresh.filter-table-list.filter-table-list-component :filterColumnsCheckBoxes="$filterColumnsCheckBoxes"
                                                               :yearSelectedList="$yearSelectedList"/>

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

                                    @if (filterCol('agriculture_hunting_forestry') == true)
                                    <th>کشاورزی، شکار و جنگلداری</th>
                                    @endif
                                    @if (filterCol('mining_construction') == true)
                                    <th>استخراج معدن - ساخت</th>
                                    @endif
                                    @if (filterCol('water_electricity_natural_gas_supply') == true)
                                    <th>تامین آب، برق و گاز طبیعی</th>
                                    @endif
                                    @if (filterCol('building') == true)
                                    <th>ساختمان</th>
                                    @endif
                                    @if (filterCol('wholesale_retail_vehicle_repair_supply') == true)
                                    <th>عمده فروشی، خرده فروشی، تعمیر وسایل نقلیه و تامین کالا</th>
                                    @endif
                                    @if (filterCol('hotel_and_restaurant') == true)
                                    <th>هتل و رسنوران</th>
                                    @endif
                                    @if (filterCol('transportation_warehousing_communications') == true)
                                    <th>حمل و نقل، انبارداری و ارتباطات</th>
                                    @endif
                                    @if (filterCol('financial_intermediation') == true)
                                    <th>واسطه گری های مالی</th>
                                    @endif
                                    @if (filterCol('office_of_public_affairs_urban_services') == true)
                                    <th>اداره امور عمومی و خدمات شهری، دفاع، و تامین اجتماعی</th>
                                    @endif
                                    @if (filterCol('education') == true)
                                    <th>آموزش</th>
                                    @endif
                                    @if (filterCol('health_and_social_work') == true)
                                    <th>بهداشت و مددکاری اجتماعی</th>
                                    @endif
                                    @if (filterCol('activities_of_employed_households') == true)
                                    <th>فعالیت های خانوارهای دارای مستخدم</th>
                                    @endif
                                    @if (filterCol('overseas_organizations_and_delegations') == true)
                                    <th>سازمان ها و هیات های برون مرزی</th>
                                    @endif
                                    @if (filterCol('real_estates') == true)
                                    <th>املاک و مستغلات</th>
                                    @endif
                                    @if (filterCol('professional_scientific_technical_activities') == true)
                                    <th>فعالیت های حرفه ای ، علمی و فنی</th>
                                    @endif
                                    @if (filterCol('office_and_support_services') == true)
                                    <th>اداری و خدمات پشتیبانی</th>
                                    @endif
                                    @if (filterCol('art_and_entertainment') == true)
                                    <th>هنر و سرگرمی</th>
                                    @endif
                                    @if (filterCol('other_services') == true)
                                    <th>سایر خدمات</th>
                                    @endif
                                    @if (filterCol('year') == true)
                                        <th>سال</th>
                                    @endif
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($employmentOfProvincials as $key => $employmentOfProvincial)
                                    <tr>
                                        <th scope="row">{{ $employmentOfProvincials?->firstItem() + $key }}</th>

                                        <td>{{ $employmentOfProvincial?->province?->name . ' - ' . $employmentOfProvincial->county?->name }}
                                        </td>

                                        @if (filterCol('agriculture_hunting_forestry') == true)
                                        <td>{{ number_format($employmentOfProvincial?->agriculture_hunting_forestry) }}</td>
                                        @endif
                                        @if (filterCol('mining_construction') == true)
                                        <td>{{ number_format($employmentOfProvincial?->mining_construction) }}</td>
                                        @endif
                                        @if (filterCol('water_electricity_natural_gas_supply') == true)
                                        <td>{{ number_format($employmentOfProvincial?->water_electricity_natural_gas_supply) }}</td>
                                        @endif
                                        @if (filterCol('building') == true)
                                        <td>{{ number_format($employmentOfProvincial?->building) }}</td>
                                        @endif
                                        @if (filterCol('wholesale_retail_vehicle_repair_supply') == true)
                                        <td>{{ number_format($employmentOfProvincial?->wholesale_retail_vehicle_repair_supply) }}</td>
                                        @endif
                                        @if (filterCol('hotel_and_restaurant') == true)
                                        <td>{{ number_format($employmentOfProvincial?->hotel_and_restaurant) }}</td>
                                        @endif
                                        @if (filterCol('transportation_warehousing_communications') == true)
                                        <td>{{ number_format($employmentOfProvincial?->transportation_warehousing_communications) }}</td>
                                        @endif
                                        @if (filterCol('financial_intermediation') == true)
                                        <td>{{ number_format($employmentOfProvincial?->financial_intermediation) }}</td>
                                        @endif
                                        @if (filterCol('office_of_public_affairs_urban_services') == true)
                                        <td>{{ number_format($employmentOfProvincial?->office_of_public_affairs_urban_services) }}</td>
                                        @endif
                                        @if (filterCol('education') == true)
                                        <td>{{ number_format($employmentOfProvincial?->education) }}</td>
                                        @endif
                                        @if (filterCol('health_and_social_work') == true)
                                        <td>{{ number_format($employmentOfProvincial?->health_and_social_work) }}</td>
                                        @endif
                                        @if (filterCol('activities_of_employed_households') == true)
                                        <td>{{ number_format($employmentOfProvincial?->activities_of_employed_households) }}</td>
                                        @endif
                                        @if (filterCol('overseas_organizations_and_delegations') == true)
                                        <td>{{ number_format($employmentOfProvincial?->overseas_organizations_and_delegations) }}</td>
                                        @endif
                                        @if (filterCol('real_estates') == true)
                                        <td>{{ number_format($employmentOfProvincial?->real_estates) }}</td>
                                        @endif
                                        @if (filterCol('professional_scientific_technical_activities') == true)
                                        <td>{{ number_format($employmentOfProvincial?->professional_scientific_technical_activities) }}</td>
                                        @endif
                                        @if (filterCol('office_and_support_services') == true)
                                        <td>{{ number_format($employmentOfProvincial?->office_and_support_services) }}</td>
                                        @endif
                                        @if (filterCol('art_and_entertainment') == true)
                                        <td>{{ number_format($employmentOfProvincial?->art_and_entertainment) }}</td>
                                        @endif
                                        @if (filterCol('other_services') == true)
                                        <td>{{ number_format($employmentOfProvincial?->other_services) }}</td>
                                        @endif
                                        @if (filterCol('year') == true)
                                        <td>{{ $employmentOfProvincial?->year }}</td>
                                        @endif
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
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
