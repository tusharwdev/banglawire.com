@extends('layouts.backend.app')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-settings icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div> General Settings
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="{{ route('secure.dashborad') }}"  class="btn-shadow mr-3 btn btn-primary">
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
        <div class="col-md-3">
            @include('backend.settings.sidebar')
        </div>
        <div class="col-md-9">
{{--            how to use callout--}}
            <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">How To Use:</h5>
                        <p class="card-text">
                            You can get the value of each setting anywhere in the application by using <code>config('setting.key')</code>
                        </p>
                </div>

            </div>
            <form method="post" action="{{ route('secure.settings.general.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="main-card mb-3 card" style="padding: 10px;">

                    <div class="card-body">

                        <div class="form-group">
                            <label for="site_title">Site Title</label>
                            <input type="text" id="site_title" class="form-control @error('site_title') is-invalid @enderror " name="site_title"
                                   value="{{ setting('site_title') ?? old('site_title')}}"  autofocus
                                 required
                            >
                            @error('site_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="site_description">Site Description</label>
                            <input type="text" id="site_description" class="form-control @error('site_description') is-invalid @enderror " name="site_description"
                                   value="{{ setting('site_description') ?? old('site_description')}}"

                            >
                            @error('site_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="site_address">Site Address</label>
                            <input type="text" id="site_address" class="form-control @error('site_address') is-invalid @enderror " name="site_address"
                                   value="{{ setting('site_address') ?? old('site_address')}}"

                            >
                            @error('site_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">
                                Update
                        </button>
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
                    selector: '#body',
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
