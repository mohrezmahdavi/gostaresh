@extends('layouts.dashboard')

@section('title-tag')
تعداد و ترکیب جمعیت دانش آموزی استان
@endsection

@section('breadcrumb-title')
تعداد و ترکیب جمعیت دانش آموزی استان
@endsection

@section('page-title')
تعداد و ترکیب جمعیت دانش آموزی استان
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
                                    <th>مقطع</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($numberStudentPopulations as $key => $numberStudentPopulation)
                                    <tr>
                                        <th scope="row">{{ $numberStudentPopulations?->firstItem() + $key }}</th>

                                        <td>{{ $numberStudentPopulation?->province?->name . ' - ' . $numberStudentPopulation->county?->name }}</td>
                                        <td>{{ $numberStudentPopulation?->gender_title }}</td>
                                        <td>{{ $numberStudentPopulation?->grade }}</td>
                                        <td>
                                            <a href="{{ route('number.student.population.edit', $numberStudentPopulation) }}"
                                                title="{{ __('validation.buttons.edit') }}"
                                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                            
                                            <a href="{{ route('number.student.population.destroy', $numberStudentPopulation) }}" }}"
                                                title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $numberStudentPopulations->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')

@endsection