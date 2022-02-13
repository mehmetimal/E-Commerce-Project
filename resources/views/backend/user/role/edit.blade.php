@extends('backend.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('backend/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend/css/select2-bootstrap4.min.css')}}">

    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{asset('backend/css/dropzone.min.css')}}">
@endpush
@section('currentPage','Role Ekle')
@section('current_tab','Rol  Ekle ')
@section('content')
    <style>
        .select2-selection__rendered {
            line-height: 45px !important;
        }
        .select2-container .select2-selection--single {
            height: 45px !important;
        }
        .select2-selection__arrow {
            height: 44px !important;
        }
        .file {
            visibility: hidden;
            position: absolute;
        }
    </style>
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Rol Adı Giriniz </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <form action="{{route('role.update',$role->id)}}" method="Post"  id="image-form"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-group ">
                                <label>Rol Adı </label>
                                <input  class="form-control" value="{{$role->name}}"  name="name" type="text" placeholder="Rol Adı">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row mb-2">
                    <div class="col-12">
                        <select name ="permissions[]" class="form-control permissions" multiple>
                            <option></option>
                            @foreach($permissions as $permission)
                                <option
                                    @foreach($role->permissions as $rolePermission)
                                    {{$rolePermission->pivot->permission_id == $permission->id ? 'selected' : ''}}
                                    @endforeach
                                    value="{{$permission->id}}">
                                    {{$permission->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <button class="btn btn-primary" type="submit" id="submit-all"> Rol Guncelle </button>
                </div>
                <!-- /.row -->
            </div>

        </form>
    </div>

@push('js')
<script src="{{asset('backend/js/select2.full.min.js')}}"></script>

<script>
    $('.permissions').select2({
        placeholder:'İzin Seç'
    });
</script>
@endpush
@endsection
