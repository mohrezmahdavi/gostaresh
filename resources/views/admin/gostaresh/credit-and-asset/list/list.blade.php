@extends('layouts.dashboard')

@section('title-tag')
    تعداد تحلیل اعتبارات و دارایی ھای دانشگاه در واحدھای دانشگاھی استان
@endsection

@section('breadcrumb-title')
    تعداد تحلیل اعتبارات و دارایی ھای دانشگاه در واحدھای دانشگاھی استان
@endsection

@section('page-title')
    تعداد تحلیل اعتبارات و دارایی ھای دانشگاه در واحدھای دانشگاھی استان
    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('credit-and-asset.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                <th>شهرستان</th>
                                <th>واحد</th>
                                <th>اعتبارات اداری</th>
                                <th>اعتبارات آموزشی</th>
                                <th>اعتبارات پژوهشی</th>
                                <th>اعتبارات فرهنگی</th>
                                <th>اعتبارات فناورانه و نوآورانه</th>
                                <th>اعتبارات حوزه مهارتی</th>
                                <th>کل اعتبارات دانشگاه</th>
                                <th>کل دارایی های دانشگاه</th>
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                            @foreach ($creditAndAssets as $key => $creditAndAsset)
                                <tr>
                                    <th scope="row">{{ $creditAndAssets?->firstItem() + $key }}</th>
                                    <td>{{ $creditAndAsset?->province?->name . ' - ' . $creditAndAsset->county?->name }}
                                    <td>{{ $creditAndAsset?->unit}}</td>
                                    <td>{{ number_format($creditAndAsset?->administrative_credits)}}</td>
                                    <td>{{ number_format($creditAndAsset?->educational_credits)}}</td>
                                    <td>{{ number_format($creditAndAsset?->research_credits)}}</td>
                                    <td>{{ number_format($creditAndAsset?->cultural_credits)}}</td>
                                    <td>{{ number_format($creditAndAsset?->innovative_credits)}}</td>
                                    <td>{{ number_format($creditAndAsset?->skills_credits)}}</td>
                                    <td>{{ number_format($creditAndAsset?->total_University_credits)}}</td>
                                    <td>{{ number_format($creditAndAsset?->total_university_assets)}}</td>
                                    <td>{{ $creditAndAsset?->year }}</td>
                                    <td>

                                        <a href="{{ route('credit-and-asset.edit', $creditAndAsset) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        {{--                                        <a href="{{ route('research-output-status-analyses.destroy', $creditAndAsset) }}" title="{{ __('validation.buttons.delete') }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $creditAndAssets->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
