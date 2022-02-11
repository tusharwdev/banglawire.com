@extends('layouts.backend.app')
@section('content')
    @push('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .dropify-wrapper .dropify-message p{
                font-size: initial;
            }
        </style>
    @endpush


    <div class="row">
        <div class="col-12">

            <form method="post" action="{{ route('logo.update',$site_logo->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <div class="main-card mb-3 card" style="padding: 10px;">
                            <div class="card-body">
                                <h5 class="card-title"> </h5>
                                <h5 class="card-title"> Upload Logo Image</h5>

                                <div class="form-group">
                                    <label for="logo">Logo Image</label>
                                    <input type="file" id="logo" data-default-file="{{ $site_logo->getMedia('site_logo')->first()->getUrl() }}"
                                           class="form-control dropify  @error('logo') is-invalid @enderror "
                                           name="site_logo"
                                    >
                                    @error('site_logo')
                                    <span class="text-danger" role="alert">
                                         <strong>{{ $message  }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-plus-circle"></i>
                                        Update

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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <script>
                $(document).ready(function() {
                    $('.dropify').dropify();
                });
            </script>
    @endpush

@endsection
