@extends('backend.layouts.app')
@push('css')
    <link rel="stylesheet" href="{{asset('backend/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/buttons.bootstrap4.min.css')}}">

@endpush
@section('currentPage','İzinler')


@section('content')

    <div class="card">
        <div class="card-header">
           @can('Create Permission')
            <h3 class="card-title">
                <a href="{{route('permission.create')}}" class="btn btn-outline-success">
                    İzin  Ekle </a></h3>
            @endcan
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>İzin  Adı</th>
                    <th style="width: 22%">İşlem</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)

                    <tr>
                        <td>{{$permission->id}}</td>
                        <td>{{$permission->name}}</td>
                        <td>
                            <button data-toggle="modal" data-role-id="{{$permission->id}}" data-target="#modal-lg"  title="Detay" type="button" class="btn btn-primary detailButton"><i class="far fa-eye"></i></button>
                            <a href="{{route('permission.edit',$permission->id)}}" title="Güncelle" type="button" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <form style="margin: 0; padding: 0;" class="d-inline" action="{{route('permission.destroy',$permission->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick='return confirm("İzin  Kalıcı Olarak Silinecek emin misiniz ?");' title="Sil" type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Rol Adı</th>
                    <th style="width: 22%">İşlem</th>
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
            $('.detailButton').on('click',function (){
                var $category_id=$(this).data('category-id');


                $.ajax({
                    url: "{{route('get.category.info.with.attributes')}}",
                    type: "POST",
                    data:{
                        categoryId:$category_id,
                    },
                    success: function (categoryNameWithDetails) {

                        var categoryName=categoryNameWithDetails.name;
                        $('#categoryName').text('Kategori  Adı :  '+ categoryName);

                        $.each(categoryNameWithDetails.attributes, function(index, attribute) {
                            $("#categoryAttributesBody").
                            append('<tr class="text-center">' +
                                '<td>' + "Özellik -" +attribute.id   + '</td>'+
                                '<td>' + attribute.name + '</td>'+
                                '<td>' + attribute.slug  + '</td>'+
                                '</tr>')
                        });

                    }
                });



            })
        </script>

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
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            });
        </script>

    @endpush



@endsection
