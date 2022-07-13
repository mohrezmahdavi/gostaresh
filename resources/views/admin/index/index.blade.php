@extends('layouts.dashboard')

@section('title-tag')
@endsection

@section('breadcrumb-title')
@endsection

@section('page-title')
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-2 pb-2 border-bottom">منوی درختی شاخص ها</h4>

                    <ul class="sitemap">
                        @foreach (config('gostaresh-urls.url') as $keyParent => $valueParent)
                            <li>

                                <a role="link" aria-disabled="true" class="text-uppercase fw-bold">
                                    <span>{{ $keyParent }}</span>
                                </a>


                                @if (count($valueParent) > 0)
                                    <ul>
                                        @foreach ($valueParent as $keyMiddle => $valueMiddle)
                                            <li>

                                                <a role="link" aria-disabled="true">
                                                    {{ $keyMiddle }}

                                                </a>


                                                @if (count($valueMiddle) > 0)
                                                    <ul>
                                                        @foreach ($valueMiddle as $key => $value)
                                                            <li>

                                                                <a href="{{ route($value['name'] . '.index') }}" >
                                                                    {{ $value['title'] }}

                                                                </a>

                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach

                    </ul>

















                    {{-- @foreach (config('gostaresh-urls.url') as $key => $value)

                            

                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $value['title'] }}</td>

                                <td>
                                    <a href="{{ route($value['name'] . '.create') }}" title="افزودن"
                                        class="btn btn-success btn-sm">افزودن</a>
                                    <a href="{{ route($value['name'] . '.index') }}" title="لیست"
                                        class="btn btn-info btn-sm">لیست</a>
                                </td>

                            </tr>
                        @endforeach --}}


                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
