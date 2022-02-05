@extends('layouts.backend.app')


@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Users
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="{{ route('secure.users.edit',$user->id) }}"  class="btn-shadow mr-3 btn btn-primary">

                    Create user <i class="fas fa-edit"></i>
                </a>
                <a href="{{ route('secure.users.index') }}"  class="btn-shadow mr-3 btn btn-primary">
                    <i class="fas fa-arrow-circle-left"></i>
                    Back

                </a>
                <div class="d-inline-block dropdown">

                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-inbox"></i>
                                    <span>
                                                        Inbox
                                                    </span>
                                    <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-book"></i>
                                    <span>
                                                        Book
                                                    </span>
                                    <div class="ml-auto badge badge-pill badge-danger">5</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-picture"></i>
                                    <span>
                                                        Picture
                                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a disabled href="javascript:void(0);" class="nav-link disabled">
                                    <i class="nav-link-icon lnr-file-empty"></i>
                                    <span>
                                                        File Disabled
                                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

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
        <div class="col-md-2">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <img src="{{ $user->getFirstMediaUrl('avatar') }}" class="img-fluid img-thumbnail" alt="avatar">
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="main-card mb-3 card" style="padding: 10px;">

                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <tbody>
                        <tr>
                            <th scope="row">Name :</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email :</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Role :</th>
                            <td>
                                @if($user->role)
                                    <span class="badge badge-info">{{ $user->role->name }}</span>
                                @else
                                    <span class="badge badge-danger">No Role Found :(</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Status :</th>
                            <td>
                                @if($user->status == true)
                                    <span class="badge badge-info">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Joined at :</th>
                            <td>
                               {{ $user->created_at->diffForHumans() }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Last Modified at :</th>
                            <td>
                               {{ $user->updated_at->diffForHumans() }}
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>

@endsection

