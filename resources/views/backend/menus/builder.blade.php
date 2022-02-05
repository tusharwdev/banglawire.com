@extends('layouts.backend.app')
@section('title', 'Menu Builder')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.css" />
    <style>
     /*menu builder*/

        .menu-builder .dd {
            position: relative;
            display: block;
            margin: 0;
            padding: 0;
            max-width: inherit;
            list-style: none;
            font-size: 13px;
            line-height: 20px;
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
                <div> Menu | Builder ({{ $menu->name }})
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="{{ route('secure.menus.item.create',$menu->id) }}"  class="btn-shadow mr-3 btn btn-success">
                    <i class="fas fa-plus-circle"></i>
                    Create Menu Item

                </a>
                <a href="{{ route('secure.menus.index') }}"  class="btn-shadow mr-3 btn btn-primary">
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
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            {{-- how to use callout --}}
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">How To Use:</h5>
                    <p>You can output a menu anywhere on your site by calling <code>menu('name')</code></p>
                </div>
            </div>

            <div class="main-card mb-3 card">
                <div class="card-body menu-builder">
                    <h5 class="card-title">Drag and drop the menu Items below to re-arrange them.</h5>

                    <div class="dd">
                        <ol class="dd-list">
                            @forelse($menu->menuItems as $item)
                                <li class="dd-item" data-id="{{ $item->id }}">
                                   <div class="pull-right item_actions">
                                       <a href="{{route('secure.menus.item.edit',['id' => $menu->id,'itemId' => $item->id])}}" class="btn btn-info btn-sm">
                                           <i class="fas fa-edit"></i>
                                           <span>Edit</span>
                                       </a>
                                       <button type="button" onclick="deleteData({{ $item->id }})" class=" btn btn-danger btn-sm">
                                           <i class="fas fa-trash-alt"></i>
                                           <span>Delete</span>
                                       </button>

                                       <form  action="{{ route('secure.menus.item.destroy',['id' => $menu->id,'itemId' => $item->id])}}" id="delete-from-id-{{$item->id}}" method="POST" style="display: none">
                                           @csrf
                                           @method('DELETE')

                                       </form>
                                   </div>

                                    <div class="dd-handle">
                                        @if($item->type == 'divider')
                                            <strong>Divider: {{ $item->divider_title }}</strong>
                                        @else
                                            <span>{{ $item->title }}</span>
                                            <small>{{ $item->url }}</small>
                                        @endif

                                    </div>
                                    @if(!$item->childs->isEmpty())
                                        <ol class="dd-list">
                                            @foreach($item->childs as $childItem)
                                                <li class="dd-item" data-id="{{ $childItem->id }}">
                                                    <div class="pull-right item_actions">
                                                        <a href="{{route('secure.menus.item.edit',['id' => $menu->id,'itemId' => $childItem->id])}}" class="btn btn-info btn-sm">
                                                            <i class="fas fa-edit"></i>
                                                            <span>Edit</span>
                                                        </a>

                                                        <button type="button" onclick="deleteData({{$childItem->id}})" class=" btn btn-danger btn-sm">
                                                            <i class="fas fa-trash-alt"></i>
                                                            <span>Delete</span>
                                                        </button>

                                                        <form action="{{ route('secure.menus.item.destroy',['id' => $menu->id,'itemId' => $childItem->id]) }}" id="delete-from-id-{{$childItem->id}}" method="post" style="display: none">
                                                            @csrf
                                                            @method('DELETE')

                                                        </form>
                                                    </div>

                                                    <div class="dd-handle">
                                                        @if($childItem->type == 'divider')
                                                            <strong>Divider: {{ $childItem->divider_title }}</strong>
                                                        @else
                                                            <span>{{ $childItem->title }}</span>
                                                            <small>{{ $childItem->url }}</small>
                                                        @endif
                                                    </div>
                                                </li>
                                                @endforeach
                                        </ol>
                                    @endif
                                </li>

                            @empty
                                <div class="text-center">
                                    <strong>No Menu Item Found !</strong>
                                </div>
                                    @endforelse
                        </ol>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>


        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js"></script>
        <script>
        (function($) {
                    $(document).ready(function() {
                        $('.dd').nestable({maxDepth: 2});
                        $('.dd').on('change', function (e) {
                            $.post('{{ route('secure.menus.order',$menu->id) }}',
                                {
                                    _token: '{{ csrf_token() }}',
                                    order: JSON.stringify($('.dd').nestable('serialize')),
                                },
                                function(data){
                                    iziToast.success({
                                        title: 'Success',
                                        message: 'Successfully updated menu order.',
                                    });
                                });
                        });
                    });
                })(jQuery);

            </script>
    </div>


@endsection
