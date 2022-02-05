@extends('layouts.backend.app')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-check icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div> {{ isset($role) ? 'Edit' : 'Create' }} | Role
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="{{ route('secure.roles.index') }}"  class="btn-shadow mr-3 btn btn-primary">
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
        <div class="col-md-12">
            <div class="main-card mb-3 card" style="padding: 10px;">

                <form method="post" action="{{ isset($role) ? route('secure.roles.update',$role->id) : route('secure.roles.store') }}">
                    @csrf
                    @isset($role)
                        @method('PUT')
                    @endisset
                    <div class="card-body">
                        <h5 class="card-title"> Manage Roles</h5>

                        <div class="form-group">
                            <label for="name">Role Name</label>
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror " name="name"
                            value="{{ $role->name ?? old('name')}}" required autofocus
                            >
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="text-center">
                            <strong> Manage permission for role</strong>
                            @error('permissions')
                            <p>
                                <span class="text-danger" role="alert">
                                <strong>{{ $message  }}</strong>
                            </span>
                            </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="select-all">
                                <label for="select-all" class="custom-control-label">Select all</label>
                            </div>
                        </div>

                        @forelse($modules->chunk(2) as $key=>$chunks)
                            <div class="form-row">
                                @foreach($chunks as $key=> $module)
                                    <div class="col">
                                        <h5>Module : {{ $module->name }}</h5>
                                        @foreach($module->permissions as $key=>$permission)
                                            <div class=" mb-3 ml-4">
                                                <div class="custom-control custom-checkbox mb-2">

                                                    <label for="permission_{{$permission->id}}">{{ $permission->name }}</label>

                                                    <input type="checkbox"
                                                           id="permission_{{$permission->id}}"
                                                           name="permissions[]"
                                                           value="{{ $permission->id }}"
                                                  @isset($role)
                                                            @foreach($role->permissions as $rolepermission)
                                                                {{ $permission->id == $rolepermission->id ? 'checked' : '' }}
                                                                @endforeach
                                                      @endisset
                                                    >


                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        @empty
                            <div class="row">
                                <div class="text-center">
                                    <strong>No Permission found !</strong>
                                </div>
                            </div>
                        @endforelse

                        <button type="submit" class="btn btn-primary">
                            @isset($role)
                                <i class="fas fa-plus-circle-up"></i>
                                Update
                                @else
                            <i class="fas fa-plus-circle"></i>
                            Create
                            @endisset
                        </button>

                    </div>
                </form>
        </div>
    </div>

@endsection
@push('js')

    <script>


       // listen for click on toggle checkbox
       $("#select-all").click(function (event){

           if (this.checked){
               $(':checkbox').each(function (){
                    this.checked = true;
               });
           }else{
               $(':checked').each(function (){
                  this.checked = false;
               });
           }
       });
    </script>
@endpush
