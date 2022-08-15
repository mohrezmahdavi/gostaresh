@extends('layouts.dashboard')

@section('title-tag')
    تعداد میانگین ھزینه ناشی از اجرای رشته ھای تحصیلی در گروه ھا و مقاطع مختلف تحصیلی
@endsection

@section('breadcrumb-title')
    تعداد میانگین ھزینه ناشی از اجرای رشته ھای تحصیلی در گروه ھا و مقاطع مختلف تحصیلی
@endsection

@section('page-title')
    تعداد میانگین ھزینه ناشی از اجرای رشته ھای تحصیلی در گروه ھا و مقاطع مختلف تحصیلی

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('cost-of-majors.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                    <th>شهرستان</th>


                                    @foreach ($filterColumnsCheckBoxes as $key => $value)
                                        @if (filterCol($key))
                                            <th>{{ $value }}</th>
                                        @endif
                                    @endforeach


                                    <th>سال</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($costOfMajors as $key => $costOfMajor)
                                    <tr>
                                        <th scope="row">{{ $costOfMajors?->firstItem() + $key }}</th>
                                        <td>{{ $costOfMajor?->province?->name . ' - ' . $costOfMajor->county?->name }}
                                            @foreach ($filterColumnsCheckBoxes as $key => $value)
                                                @if (filterCol($key))
                                                    @if (in_array($key, \App\Models\Index\AverageCostOfMajor::$numeric_fields))
                                        <td>{{ $costOfMajor?->{$key} }}</td>
                                    @else
                                        <td>{{ $costOfMajor->{$key} }}</td>
                                @endif
                                @endif
                                @endforeach

                                <td>{{ $costOfMajor?->year }}</td>
                                <td>

                                    <a href="{{ route('cost-of-majors.edit', $costOfMajor) }}"
                                        title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i></a>

                                    <form method="POST" action="{{ route('cost-of-majors.destroy', $costOfMajor) }}" role="form">
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
                                excelLink="{{ route('cost-of-majors.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('cost-of-majors.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('cost-of-majors.list.print', request()->query->all()) }}" />
                        </div>
                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $costOfMajors->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
