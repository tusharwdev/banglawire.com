@extends('layouts.backend.app')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .dropify-wrapper .dropify-message p{
            font-size: initial;
        }
    </style>
@endpush


@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-check icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div> {{ isset($user) ? 'Edit' : 'Create' }} | User
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
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
        <div class="col-12">
            <form method="post" action="{{ isset($user) ? route('secure.users.update',$user->id) : route('secure.users.store') }}" enctype="multipart/form-data">
                @csrf
                @isset($user)
                    @method('PUT')
                @endisset
            <div class="row">
                <div class="col-md-8">
                    <div class="main-card mb-3 card" style="padding: 10px;">


                        <div class="card-body">
                            <h5 class="card-title"> Users Info</h5>

                            <div class="form-group">
                                <label for="name">User Name</label>
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror " name="name"
                                       value="{{ $user->name ?? old('name')}}"  autofocus
                                       required
                                >
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message  }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">User Email</label>
                                <input type="text" id="email" class="form-control @error('email') is-invalid @enderror " name="email"
                                       value="{{ $user->email ?? old('name')}}"
                                       required
                                >
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message  }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">User Password</label>
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror " name="password"
                                       value="{{ $user->password ?? old('password')}}"
                                    {{ !isset($user) ? 'required' : '' }}

                                >
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message  }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Password Confirmation</label>
                                <input type="password" id="password_confirmation" class="form-control @error('password') is-invalid @enderror "
                                       name="password_confirmation"
                                    {{ !isset($user) ? 'required' : '' }}

                                >
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message  }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="main-card mb-3 card" style="padding: 10px;">


                        <div class="card-body">
                            <h5 class="card-title"> Select Role and Status</h5>


                            <div class="form-group">
                                <label for="role">Select Role</label>
                                <select id="role" class="form-control js-example-basic-single @error('role') is-invalid @enderror "
                                       name="role"
                                        required

                                >
{{--                                    <option value="#" selected>Select One</option>--}}
                                    @foreach($roles as $role)

                                        <option value="{{ $role->id }}"

                                                @isset($user)
                                                    {{ $user->role->id == $role->id ? 'selected' : '' }}
                                                    @endisset

                                        >{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message  }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="avatar">Avatar</label>
                                <input type="file" id="avatar" data-default-file="{{ isset($user) ? $user->getFirstMediaUrl('avatar') : '' }}"
                                       class="form-control dropify  @error('avatar') is-invalid @enderror "
                                        name="avatar"
                                       {{ !isset($user) ? 'required' : '' }}

                                >

                                @error('avatar')
                                <span class="text-danger" role="alert">
                                <strong>{{ $message  }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" @isset($user) {{ $user->status == 1 ? 'checked' : '' }} @endisset
                                           class="custom-control-input" id="status" name="status" {{ !isset($user) ? 'required' : '' }}>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message  }}</strong>
                            </span>
                                    @enderror
                                    <label class="custom-control-label" for="status">Status</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                @isset($user)
                                    <i class="fas fa-plus-circle-up"></i>
                                    Update
                                @else
                                    <i class="fas fa-plus-circle"></i>
                                    Create
                                @endisset
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            </form>
    </div>

@endsection
@push('js')
            <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>

            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            $('.dropify').dropify();
        });

    </script>
@endpush
