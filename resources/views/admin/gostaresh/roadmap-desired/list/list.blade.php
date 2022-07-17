@extends('layouts.dashboard')

@section('title-tag')
    ایجاد نقشه راه دستیابی به وضع مطلوب در واحد دانشگاھی X
@endsection

@section('breadcrumb-title')
    ایجاد نقشه راه دستیابی به وضع مطلوب در واحد دانشگاھی X
@endsection

@section('page-title')
    ایجاد نقشه راه دستیابی به وضع مطلوب در واحد دانشگاھی X

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('roadmap-desired.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                <th>عنوان سیاست آزمایشی</th>
                                <th>عنوان محور</th>
                                <th>عنوان پروژه</th>
                                <th>هدف کمی</th>
                                <th>سنجش</th>
                                <th>سطح پیشرفت و تحقق سالانه</th>
                                <th>مسئول پیگیری</th>
                                <th>ملاحظات</th>
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                            @foreach ($roadmapDesireds as $key => $roadmapDesired)
                                <tr>
                                    <th scope="row">{{ $roadmapDesireds?->firstItem() + $key }}</th>
                                    <td>{{ $roadmapDesired?->province?->name . ' - ' . $roadmapDesired->county?->name }}
                                    <td>{{ $roadmapDesired?->experimental_policy_title}}</td>
                                    <td>{{ $roadmapDesired?->title_axis}}</td>
                                    <td>{{ $roadmapDesired?->project_title}}</td>
                                    <td>{{ $roadmapDesired?->quantitative_goal}}</td>
                                    <td>{{ $roadmapDesired?->test}}</td>
                                    <td>{{ $roadmapDesired?->annual_progress_level}}</td>
                                    <td>{{ $roadmapDesired?->responsible_for_track}}</td>
                                    <td>{{ $roadmapDesired?->considerations}}</td>
                                    <td>{{ $roadmapDesired?->year }}</td>
                                    <td>

                                        <a href="{{ route('roadmap-desired.edit', $roadmapDesired) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        {{--                                        <a href="{{ route('research-output-status-analyses.destroy', $roadmapDesired) }}" title="{{ __('validation.buttons.delete') }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $roadmapDesireds->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
