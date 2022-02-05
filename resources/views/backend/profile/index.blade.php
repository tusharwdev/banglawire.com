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
                <div>Profile
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
            <div class="page-title-actions">

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
            <form method="post" action="{{ route('secure.profile.update') }}" enctype="multipart/form-data">
                @csrf

                    @method('PUT')

            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card" style="padding: 10px;">


                        <div class="card-body">
                            <h5 class="card-title"> Profile Photo</h5>
                            <div class="form-group">
                                <label for="avatar">Avatar</label>
                                <input type="file" id="avatar"
                                       data-default-file="{{ \Illuminate\Support\Facades\Auth::user()->getFirstMediaUrl('avatar')}}"
                                       class="form-control dropify  @error('avatar') is-invalid @enderror "
                                       name="avatar"
{{--                                    {{ !isset($user) ? 'required' : '' }}--}}

                                >

                                @error('avatar')
                                <span class="text-danger" role="alert">
                                <strong>{{ $message  }}</strong>
                            </span>
                                @enderror
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="main-card mb-3 card" style="padding: 10px;">


                        <div class="card-body">
                            <h5 class="card-title"> Users Info</h5>

                            <div class="form-group">
                                <label for="name">User Name</label>
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror " name="name"
                                       value="{{ \Illuminate\Support\Facades\Auth::user()->name  }}"  autofocus
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
                                       value="{{ \Illuminate\Support\Facades\Auth::user()->email  }}"
                                       required
                                >
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message  }}</strong>
                            </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-plus-circle-up"></i>
                                Update
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
