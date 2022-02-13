@extends('backend.layouts.app')
@push('css')
    <link rel="stylesheet" href="{{asset('backend/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/buttons.bootstrap4.min.css')}}">

@endpush
@section('currentPage','Dükkanlar')


@section('content')

    <div class="card">
       @can('Create Shop')
        <div class="card-header">
            <h3 class="card-title"><a href="{{route('shop.create',['shop_type'=>1])}}" class="btn btn-outline-success">Şahış Şirketi Ekle  </a></h3>
            <h3 class="card-title"><a href="{{route('shop.create',2)}}" class="btn btn-outline-success">Anonim Şahış Şirketi Ekle  </a></h3>
            <h3 class="card-title"><a href="{{route('shop.create',3)}}" class="btn btn-outline-success">LTD/Şirketi Ekle</a></h3>

        </div>

       @endcan
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Dükkan Adı</th>
                    <th>Dükkan Takma Adı</th>
                    <th>İşletme Sahibi  Adı</th>
                    <th>İşletme Sahibi  Soyadı</th>
                    <th>İletişim</th>
                    <th>İşlem</th>
                </tr>
                </thead>
                <tbody>
                @foreach($shops as $shop)
                    <tr>
                        <td>{{$shop->id}}</td>
                        <td>{{$shop->name}}</td>
                        <td>{{$shop->nick_name}}</td>
                        <td>{{$shop->user->detail->name ?? ''}}</td>
                        <td>{{$shop->user->detail->surname ?? ''}}</td>
                        <th>{{$shop->user->detail->phone ?? ''}}</th>
                        <td>
                            <button data-toggle="modal" data-category-id="{{$shop->id}}" data-target="#modal-lg"  title="Detay" type="button" class="btn btn-primary detailButton"><i class="far fa-eye"></i></button>
                            <a href="{{route('shop.edit',$shop->id)}}" title="Güncelle" type="button" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            @can('Delete Shop')
                            <form style="margin: 0; padding: 0;" class="d-inline" action="{{route('shop.destroy',$shop->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick='return confirm("Kullanıcı Kalıcı Olrak Silinecek ");' title="Sil" type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Dükkan Adı</th>
                    <th>Dükkan Takma Adı</th>
                    <th>İşletme Sahibi  Adı</th>
                    <th>İşletme Sahibi  Soyadı</th>
                    <th>İletişim</th>
                    <th>İşlem</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>



    @push('js')

        <script src="{{asset('backend/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('backend/js//dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('backend/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('backend/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('backend/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('backend/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('backend/js/jszip.min.js')}}"></script>
        <script src="{{asset('backend/js/pdfmake.min.js')}}"></script>
        <script src="{{asset('backend/js/vfs_fonts.js')}}"></script>
        <script src="{{asset('backend/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('backend/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('backend/js/buttons.colVis.min.js')}}"></script>


        <script>
            $(function () {
                $("#example1").DataTable({
                    "responsive": true, "lengthChange": true, "autoWidth": false,"ordering":true,
                    "buttons": [ "excel", "pdf", "print", "colvis"],
                    language: {
                        buttons: {
                            colvis: 'Kolonları Gizle',
                            print: 'Yazdır',

                        },
                        lengthMenu: "BİR SAYFADA  _MENU_ KAYIT GÖSTER",
                        zeroRecords: "ARADIĞINIZ KAYITLA EŞLEŞEN BİLGİ YOK ",
                        info: "  _PAGES_ SAYFADAN  _PAGE_ .SAYFADASINIZ ",
                        infoEmpty: "HİÇBİR KAYIT BULUNAMADI ",
                        sSearch: "Ara",
                        paginate: {
                            previous: "ÖNCEKİ SAYFA",
                            next:"SONRAKİ SAYFA",
                        }
                    }
                })@can('Export Shop')
                    .buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                @endcan
            });
        </script>

    @endpush



@endsection
