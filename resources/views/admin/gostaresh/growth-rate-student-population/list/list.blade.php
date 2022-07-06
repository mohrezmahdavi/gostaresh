@extends('layouts.dashboard')

@section('title-tag')
نرخ رشد و ترکیب جمعیت دانش آموزی
@endsection

@section('breadcrumb-title')
نرخ رشد و ترکیب جمعیت دانش آموزی
@endsection

@section('page-title')
نرخ رشد و ترکیب جمعیت دانش آموزی
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
                                    <th>جنسیت</th>
                                    {{-- <th>مقطع</th> --}}
                                    <th>ابتدایی</th>
                                    <th>متوسطه اول</th>
                                    <th>متوسطه دوم (علوم انسانی)</th>
                                    <th>متوسطه دوم (ریاضی)</th>
                                    <th>متوسطه دوم (علوم تجربی)</th>
                                    <th>متوسطه دوم (کار و دانش و فنی و حرفه ای)</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($growthRateStudentPopulations as $key => $growthRateStudentPopulation)
                                    <tr>
                                        <th scope="row">{{ $growthRateStudentPopulations?->firstItem() + $key }}</th>

                                        <td>{{ $growthRateStudentPopulation?->province?->name . ' - ' . $growthRateStudentPopulation->county?->name }}</td>
                                        <td>{{ $growthRateStudentPopulation?->gender_title }}</td>
                                        {{-- <td>{{ $growthRateStudentPopulation?->grade }}</td> --}}
                                        <td>{{ $growthRateStudentPopulation?->ebtedai }}</td>
                                        <td>{{ $growthRateStudentPopulation?->motevasete_1 }}</td>
                                        <td>{{ $growthRateStudentPopulation?->motevasete_2_ensani }}</td>
                                        <td>{{ $growthRateStudentPopulation?->motevasete_2_math }}</td>
                                        <td>{{ $growthRateStudentPopulation?->motevasete_2_science }}</td>
                                        <td>{{ $growthRateStudentPopulation?->motevasete_2_kar_danesh }}</td>
                                        <td>
                                            <a href="{{ route('growth.rate.student.population.edit', $growthRateStudentPopulation) }}"
                                                title="{{ __('validation.buttons.edit') }}"
                                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                            
                                            <a href="{{ route('growth.rate.student.population.destroy', $growthRateStudentPopulation) }}" }}"
                                                title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $growthRateStudentPopulations->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')

@endsection