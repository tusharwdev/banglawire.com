@extends('layouts.backend.app')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-paper-plane icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>All News
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="{{ route('secure.news.index') }}"  class="btn-shadow mr-3 btn btn-primary">

                    Create News <i class="fas fa-plus-circle"></i>
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
        <div class="col-md-12">
            <div class="main-card mb-3 card" style="padding: 10px;">

                <div class="table-responsive">
                    <table id="datatable" class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Headline</th>
{{--                            <th class="text-center">Description</th>--}}
                            <th class="text-center">Created at</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $key=> $post)

                        <tr>
                            <td class="text-center text-muted">{{ $key + 1 }}</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <div class="widget-content-left">

                                                    <img width="40" class="rounded-circle" src="{{ $post->getFirstMediaUrl('post_img') != null ? $post->getFirstMediaUrl('post_img') : config('app.placeholder').'160' }}" alt="User Avatar">
                                            </div>
                                        </div>
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{ $post->heading }}</div>

                                        </div>
                                    </div>
                                </div>
                            </td>
{{--                            <td class="text-center">--}}
{{--                                 {{ $post->description }}--}}
{{--                            </td>--}}

                            <td class="text-center">
{{--                                ->diffForHumans()--}}
                                <div class="badge badge-warning">{{ $post->created_at }}</div>
                            </td>
                            <td class="text-center">
{{--                                <a href="{{route('secure.users.show',$post->id)}}" class="btn btn-primary btn-sm">--}}
{{--                                    <i class="fas fa-eye"></i>--}}
{{--                                    <span>Show</span>--}}
{{--                                </a>--}}
                                <a href="{{route('secure.post.edit',$post->id)}}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                    <span>Edit</span>
                                </a>
                                <button type="button" onclick="deleteData({{$post->id}})" class=" btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                    <span>Delete</span>
                                </button>

                                <form  action="{{ route('secure.post.destroy',$post->id) }}" id="delete-from-id-{{$post->id}}" method="post" style="display: none">
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
@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
    </script>
@endpush
