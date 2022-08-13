@extends('layouts.dashboard')

@section('title-tag')
    نرخ رشد دانشجویان غیرایرانی و بین الملل واحدهای دانشگاهی
@endsection

@section('breadcrumb-title')
    نرخ رشد دانشجویان غیرایرانی و بین الملل واحدهای دانشگاهی
@endsection

@section('page-title')
    نرخ رشد دانشجویان غیرایرانی و بین الملل واحدهای دانشگاهی

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('international.student.growth.rate.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
    </span>
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')



    <x-gostaresh.filter-table-list.filter-table-list-component :filterColumnsCheckBoxes="$filterColumnsCheckBoxes" :yearSelectedList="$yearSelectedList" :fieldsProvinceSelect="[
        'province' => true,
        'zone' => false,
        'county' => true,
        'city' => false,
    ]" />

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-light">

                                <tr>
                                    <th>#</th>
                                    @include('admin.gostaresh.international-student-growth-rate.list.partials.thead')

                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($internationalStudentGrowthRates as $key => $internationalStudentGrowthRate)
                                    <tr>
                                        <th scope="row">{{ $internationalStudentGrowthRates?->firstItem() + $key }}</th>
                                        @include('admin.gostaresh.international-student-growth-rate.list.partials.tbody')


                                        <td>

                                            <a href="{{ route('international.student.growth.rate.edit', $internationalStudentGrowthRate) }}"
                                                title="{{ __('validation.buttons.edit') }}"
                                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                                            <form method="POST" action="{{ route('international.student.growth.rate.destroy', $internationalStudentGrowthRate) }}" role="form">
                                                @csrf
                                                {{ method_field('delete') }}
                                                <button  type="submit" class="btn btn-danger btn-sm" title="{{ __('validation.buttons.delete') }}">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-end mt-3">
                            <x-exports.export-links
                                excelLink="{{ route('international.student.growth.rate.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('international.student.growth.rate.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('international.student.growth.rate.list.print', request()->query->all()) }}" />
                        </div>
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $internationalStudentGrowthRates->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
