@extends('backend.layouts.app')
@push('css')
    <link rel="stylesheet" href="{{asset('backend/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/buttons.bootstrap4.min.css')}}">

@endpush
@section('currentPage','Kategoriler')


@section('content')

    <div class="card">
    @can('Create Category')
        <div class="card-header">
            <h3 class="card-title"><a href="{{route('category.create')}}" class="btn btn-outline-success">@lang('message.add_category')</a></h3>
        </div>
    @endcan

        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Adı</th>
                    <th>Anasayfa</th>
                    <th>Üst Kategori Mi ?</th>
                    <th>Açıklama</th>
                    <th>Slogan</th>
                    <th style="width: 22%">İşlem</th>
                </tr>
                </thead>
                <tbody>
               @foreach($categories as $category)

                   <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->isSpecial == 1 ? 'Evet':'Hayır' }}</td>
                    <td>{{$category->isRoot() ? 'Evet' :'Hayır'}}</td>
                    <td>{{$category->description}}</td>
                    <td>{{$category->slogan}}</td>
                     <td>
                         <button data-toggle="modal" data-category-id="{{$category->id}}" data-target="#modal-lg"  title="Detay" type="button" class="btn btn-primary detailButton"><i class="far fa-eye"></i></button>
                         @can('Update Category')
                         <a href="{{route('category.edit',$category->id)}}" title="Güncelle" type="button" class="btn btn-success"><i class="fas fa-edit"></i></a>
                         @endcan
                        @can('Delete Category')
                         <form style="margin: 0; padding: 0;" class="d-inline" action="{{route('category.destroy',$category->id)}}" method="POST">
                             @csrf
                             @method('DELETE')
                             <button onclick='return confirm("Kategori  Kalıcı Olarak Silinecek emin misiniz ?");' title="Sil" type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                         </form>
                         @endcan

                     </td>
                </tr>
               @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Adı</th>
                    <th>Anasayfa</th>
                    <th>Üst Kategori Mi ?</th>
                    <th>Açıklama</th>
                    <th>Slogan</th>
                    <th style="width: 22%">İşlem</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('backend.category.modals.modals');

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
                let _token   = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: "{{route('get.category.info.with.attributes')}}",
                    type: "POST",
                    data:{
                        _token:_token,
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
                })@can('Export Categories')
                    .buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                 @endcan
            });
        </script>

    @endpush



@endsection
