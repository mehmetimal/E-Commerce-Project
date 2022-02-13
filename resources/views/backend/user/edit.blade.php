@extends('backend.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('backend/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend/css/select2-bootstrap4.min.css')}}">
@endpush
@section('currentPage','Kullanıcı Güncelleme')
@section('current_tab','Kullanıcı Guncelleme ')
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
            <h3 class="card-title">Kullanıcı Guncelleme </h3>

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
        <form action="{{route('user.update',$user->id)}}" method="Post"  id="image-form"  enctype="multipart/form-data">
            @csrf
            @method('PUT')



            <div class="row">
                <div class="col-6">
                   <div class="form-group">
                        <label>Ad</label>
                       <input name="name" value="{{$user->detail->name ?? ''}}" type="text" class="form-control">

                   </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label >Soyad</label>
                        <input name="surname" value="{{$user->detail->surname ?? ''}}" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>Telefon</label>
                        <input value="{{$user->detail->phone ?? ''}}" name="phone" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                   <div class="form-group">
                    <label>Rol</label>
                       <select name="role_id" class="form-control">
                           <option disabled value="">Rol Seç</option>
                           @foreach($roles as $role)

                               <option
                                   value="{{$role->id}}"
                                   @foreach($user->roles as $userRole)
                                   {{$userRole->pivot->role_id==$role->id ? 'selected' : ''}}
                                   @endforeach
                               >
                                   {{$role->name}}
                               </option>
                        @endforeach
                    </select>
                   </div>
                </div>
            </div>
            <button class="btn btn-success">Guncelle </button>
        </form>
    </div>


    @push('js')


        <!-- Bootstrap Switch -->
        <script src="{{asset('backend/js/bootstrap-switch.min.js')}}"></script>
        <!-- Select2 -->
        <script src="{{asset('backend/js/select2.full.min.js')}}"></script>


    @endpush
@endsection
