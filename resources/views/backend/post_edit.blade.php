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
                    <i class="pe-7s-news-paper icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div> News Edit
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="{{ route('secure.post.index') }}"  class="btn-shadow mr-3 btn btn-primary">
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
            <form method="post" action="{{ route('secure.post.update',$post->id) }}" enctype="multipart/form-data">
                @csrf
                @isset($post)
                    @method('PUT')
                @endisset
            <div class="row">
                <div class="col-md-8">
                    <div class="main-card mb-3 card" style="padding: 10px;">
                        <div class="card-body">
                            <h5 class="card-title"> Basic Info</h5>
                            <div class="form-group">
                                <label for="heading">News Headline</label>
                                <input type="text" id="heading" class="form-control @error('heading') is-invalid @enderror " name="heading"
                                       value="{{ $post->heading ?? old('title')}}"  autofocus
                                       required
                                >
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message  }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"   id="description" cols="30" rows="10">
                                    {{ $post->description ?? old('description')}}
                                </textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message  }}</strong>
                            </span>
                                    @enderror
                                </div>


                                <button type="submit" class="btn btn-primary">
                                    @isset($post)
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
                <div class="col-md-4">
                    <div class="main-card mb-3 card" style="padding: 10px;">

                        <div class="card-body">
                            <h5 class="card-title"> Select Image and Status</h5>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" id="image" data-default-file="{{ isset($post) ? $post->getFirstMediaUrl('post_img') : '' }}"
                                       class="form-control dropify  @error('image') is-invalid @enderror "
                                        name="image"
                                       {{ !isset($post) ? 'required' : '' }}

                                >

                                @error('image')
                                <span class="text-danger" role="alert">
                                <strong>{{ $message  }}</strong>
                            </span>
                                @enderror
                            </div>

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

            <script src="https://cdn.tiny.cloud/1/g7tqdez78bxuj8fhve8o5qd6d3bcpycego86qlwfwz6y0tc4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        tinymce.init({
            selector: '#description',
            plugins: 'print preview paste importcss searchreplace autolink directionality code visualblocks visualchars image link media codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
            imagetools_cors_hosts: ['picsum.photos'],
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | preview | insertfile image media link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            image_advtab: true,
            content_css: '//www.tiny.cloud/css/codepen.min.css',
            importcss_append: true,
            height: 400,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_noneditable_class: "mceNonEditable",
            toolbar_mode: 'sliding',
            contextmenu: "link image imagetools table",
        });

        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            $('.dropify').dropify();
        });



    </script>

@endpush
