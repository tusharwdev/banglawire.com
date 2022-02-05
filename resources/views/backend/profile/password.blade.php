@extends('layouts.backend.app')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-lock icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Profile Password
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
            <form method="post" action="{{ route('secure.profile.password.update') }}">
                @csrf
                @method('PUT')

            <div class="row">

                <div class="col-md-12">
                    <div class="main-card mb-3 card" style="padding: 10px;">


                        <div class="card-body">
                            <h5 class="card-title"> Update Password</h5>

                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input type="password" id="current_password" class="form-control
                                    @error('current_password') is-invalid @enderror " name="current_password"
                                      autofocus
                                       required
                                >
                                @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message  }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" id="password" class="form-control
                                    @error('password') is-invalid @enderror " name="password"

                                       required
                                >
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message  }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" class="form-control
                                    @error('password') is-invalid @enderror " name="password_confirmation"

                                       required
                                >
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
