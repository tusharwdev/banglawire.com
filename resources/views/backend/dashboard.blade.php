@extends('layouts.backend.app')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>
                    @role('admin')
                    Admin Dashboard
                    @else
                        Dashboard
                    @endrole

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-midnight-bloom">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Users</div>
                        <div class="widget-subheading">All users</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $usersCount }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-arielle-smile">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Roles</div>
{{--                        <div class="widget-subheading">Total Clients Profit</div>--}}
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $rolesCount }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Pages</div>
{{--                        <div class="widget-subheading">People Interested</div>--}}
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $pagesCount }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-premium-dark">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Products Sold</div>
                        <div class="widget-subheading">Revenue streams</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warning"><span>$14M</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Recent New Users

                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Created at</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key=> $user)

                            <tr>
                                <td class="text-center text-muted">{{ $key + 1 }}</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">

                                                    <img width="40" class="rounded-circle" src="{{ $user->getFirstMediaUrl('avatar') != null ? $user->getFirstMediaUrl('avatar') : config('app.placeholder').'160' }}" alt="User Avatar">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{ $user->name }}</div>
                                                <div class="widget-subheading opacity-7">
                                                    @if($user->role)
                                                        <span class="badge badge-info">{{ $user->role->name }}</span>
                                                    @else
                                                        <span class="badge badge-danger">No Role Found :(</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    {{ $user->email }}
                                </td>
                                <td class="text-center">
                                    @if($user->status == true)
                                        <span class="badge badge-info">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="badge badge-warning">{{ $user->created_at->diffForHumans() }}</div>
                                </td>
                                <td class="text-center">
                                    <a href="{{route('secure.users.show',$user->id)}}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-eye"></i>
                                        <span>Show</span>
                                    </a>
                                    <a href="{{route('secure.users.edit',$user->id)}}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i>
                                        <span>Edit</span>
                                    </a>
                                    <button type="button" onclick="deleteData({{$user->id}})" class=" btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                        <span>Delete</span>
                                    </button>

                                    <form  action="{{ route('secure.users.destroy',$user->id) }}" id="delete-from-id-{{$user->id}}" method="post" style="display: none">
                                        @csrf
                                        @method('DELETE')

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection
