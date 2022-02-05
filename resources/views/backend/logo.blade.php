@extends('layouts.backend.app')
@section('content')

    @push('css')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
            .dropify-wrapper .dropify-message p{
                font-size: initial;
            }
        </style>
    @endpush





    <div class="row">
        <div class="col-12">
            <form method="post" action="{{ route('logo.store') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-md-4">
                        <div class="main-card mb-3 card" style="padding: 10px;">
                            <div class="card-body">
                                @foreach($site_logo as $logo)

                                    <img src="{{$logo->getFirstMediaUrl('site_logo')}}" alt="Image">
                                @endforeach
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="main-card mb-3 card" style="padding: 10px;">
                            <div class="card-body">
                                <h5 class="card-title"> </h5>
                                <h5 class="card-title"> Upload Logo Image</h5>

                                <div class="form-group">
                                    <label for="logo">Logo Image</label>
                                    <input type="file" id="logo" data-default-file="{{ $logo->getFirstMediaUrl('site_logo') }}"
                                           class="form-control dropify  @error('logo') is-invalid @enderror "
                                           name="site_logo"
                                    >
                                    @error('avatar')
                                    <span class="text-danger" role="alert">
                                         <strong>{{ $message  }}</strong>
                                    </span>
                                    @enderror
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

@endsection
