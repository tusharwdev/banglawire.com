@extends('layouts.backend.app')
@push('css')

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
                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>
                    News
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class=" mb-3 widget-content bg-dark">
            <div class="widget-content-left">
                <form action="{{ route('secure.news.update',$news->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
            <div class="card-body">
                <h5 class="card-title"> </h5>
                <h5 class="card-title" style="color: white"> Upload Main Banner</h5>

                <div class="form-group">
                    <label for="banner" style="color: white">Main Banner</label>
                    <input type="file" id="banner" data-default-file="{{ $news->getFirstMediaUrl('banner') }}"
                           class="form-control dropify  @error('banner') is-invalid @enderror "
                           name="banner"
                    >
                    @error('banner')
                    <span class="text-danger" role="alert">
                                         <strong>{{ $message  }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group" name="main_heading" >
                    <label for="main_heading" style="color: white">Main News Headline</label>
                    <input type="text" id="main_heading" placeholder="Enter Main Heading..."
                           class="form-control  @error('main_heading') is-invalid @enderror "
                               name="main_heading"
                    >
                    @error('heading')
                    <span class="text-danger" role="alert">
                                         <strong>{{ $message  }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description"><strong style="color: white"> Main News Details</strong></label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"   id="maindescription" cols="30" rows="10">
                                    {{ $post->description ?? old('body')}}
                                </textarea>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message  }}</strong>
                            </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i>
                    Update
                </button>
            </div>
                </form>
            </div>
        </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class=" mb-3 widget-content bg-green-900">
            <div class="widget-content-left">
                <form action="{{ route('secure.post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
            <div class="card-body">
                <h5 class="card-title"> </h5>
                <h5 class="card-title" style="color: white"> All News Section</h5>
                <label for="heading" style="color: white">Select Category</label>
                <div class="form-group">
                    <select class="col-4" id="category_dropdown" name="category_id">
                        <option value="">-select category onec-</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>

                <label for="heading" style="color: white">Select SubCategory</label>
                <div class="form-group">
                    <select class="col-4" id="subcategory_dropdown" name="subcategory_id">
                        <option value="">-select subcategory onec-</option>
                    </select>
                </div>

                <div class="form-group" name="heading" >
                    <label for="heading" style="color: white">News Headline</label>
                    <input type="text" id="heading" placeholder="Enter Heading..."
                           class="form-control  @error('heading') is-invalid @enderror "
                               name="heading"
                    >
                    @error('heading')
                    <span class="text-danger" role="alert">
                                         <strong>{{ $message  }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image" style="color: white">Upload Single Image</label>
                        <input type="file" id="image" data-default-file=""
                               class="form-control dropify  @error('image') is-invalid @enderror "
                               name="image"
                        >
                        @error('image')
                        <span class="text-danger" role="alert">
                                         <strong>{{ $message  }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="description"><strong style="color: white">News Details</strong></label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"   id="description" cols="30" rows="10">
                                    {{ $post->description ?? old('body')}}
                                </textarea>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message  }}</strong>
                            </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i>
                    Submit
                </button>
            </div>
                </form>
            </div>
        </div>
        </div>

    </div>

@endsection
@push('js')
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/g7tqdez78bxuj8fhve8o5qd6d3bcpycego86qlwfwz6y0tc4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
        tinymce.init({
            selector: '#maindescription',
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
            $('.dropify').dropify();
            $('#category_dropdown').change(function(){
             var category_id = $(this).val();
                // alert(category_id);

                 //ajax start here
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
            //custom ajax code start here
            $.ajax({
                type:'POST',
                url:'/get/subcategory',
                data:{category_id:category_id},

                success: function(data){
                    $('#subcategory_dropdown').html(data);
                },
            });
            //end ajax
            });

        });
    </script>
@endpush
