@extends('layouts.dashboard')

@section('title-tag')
    {{ __('titles.groups') }}
@endsection

@section('breadcrumb-title')
    {{ __('titles.groups') }}
@endsection

@section('page-title')
    {{ __('titles.groups') }}

    <span>
    <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
</span>
    <span>
    <a href="{{ route('admin.role.create') }}"
       class="btn btn-success btn-sm">{{__('titles.create')." ".__('titles.group')}}</a>
</span>
@endsection

@section('styles-head')

@endsection

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Modal -->
    {{--    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"--}}
    {{--         aria-hidden="true">--}}
    {{--        <div class="modal-dialog" role="document">--}}
    {{--            <div class="modal-content">--}}
    {{--                <div class="modal-header">--}}
    {{--                    <h5 class="modal-title" id="deleteModalLabel">حذف</h5>--}}
    {{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
    {{--                        <span aria-hidden="true">&times;</span>--}}
    {{--                    </button>--}}
    {{--                </div>--}}
    {{--                <div class="modal-body">--}}
    {{--                    آیا حذف شود؟--}}
    {{--                </div>--}}
    {{--                <div class="modal-footer">--}}
    {{--                    <input type="hidden" name="element_id" id="element_id" value=""/>--}}
    {{--                    <button type="button" class="btn btn-primary" onclick="del()">بله</button>--}}
    {{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('admin.partials.row-notifiy-col')

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-light">

                            <tr>
                                <th>#</th>
                                <th>{{ __('titles.name') }}</th>
                                <th>{{ __('titles.users') }}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as $key => $role)

                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        {{ $role->users_count }}
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-xs">
                                            @can("delete-any-Role")
                                                    <form method="post"
                                                          action="{{route("admin.role.destroy",$role->id)}}">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button type="submit"
                                                                title="{{ __('validation.buttons.delete') }}"
                                                                data-id="{{$role->id}}"
                                                                class="btn btn-danger btn-sm deleteModal"
                                                                data-toggle="modal" data-target="#deleteModal">
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                    </form>
                                            @endcan
                                            @can("edit-any-Role")

                                                <a href="{{ route('admin.role.edit',$role) }}"
                                                   title="{{ __('validation.buttons.edit') }}"
                                                   class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>


                                                <a href="{{ route('admin.role.users.list',$role) }}"
                                                   title="{{ __('validation.buttons.edit') }}"
                                                   class="btn btn-info btn-sm"><i class="fa fa-users"></i></a>

                                            @endcan

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    {{--    <script>--}}
    {{--        $(document).on("click", ".deleteModal", function () {--}}
    {{--            const id = $(this).data('id');--}}
    {{--            $("#element_id").val(id);--}}
    {{--            $("#deleteModal").show();--}}
    {{--        });--}}

    {{--        function del() {--}}
    {{--            $.ajax({--}}
    {{--                headers: {--}}
    {{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
    {{--                },--}}
    {{--                method: 'delete',--}}
    {{--                url: "{{url('admin/roles')}}" + '/' + $("#element_id").val(),--}}
    {{--                contentType: false,--}}
    {{--                processData: false--}}
    {{--            }).done(function () {--}}
    {{--                location.reload();--}}
    {{--            });--}}
    {{--        }--}}
    {{--    </script>--}}
@endsection
