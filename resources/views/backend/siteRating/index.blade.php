@extends('backend.layouts.app')
@push('css')
    <link rel="stylesheet" href="{{asset('backend/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/buttons.bootstrap4.min.css')}}">

@endpush
@section('currentPage','Site Yorumları')


@section('content')

    <div class="card">


    <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Yorum Yapan Ad Soyad </th>
                    <th>Yorum</th>
                    <th style="width: 22%">İşlem</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)

                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$comment->name}} -{{$comment->surname}}</td>
                        <td>{{$comment->comment}}</td>
                        <td>
                            @role('Super Admin|Admin')
                                <a href="{{route('update.is.published',['comment_id'=>$comment->id,'is_published'=>$comment->is_published])}}" title="Güncelle" type="button" class="btn {{$comment->is_published == 1 ? 'btn-success' :'btn-danger'}}"><i class="fas {{$comment->is_published == 1 ? 'fa-minus' :'fa-plus'}}"></i></a>
                            @endrole
                          {{--  @can('Delete Category')
                                <form style="margin: 0; padding: 0;" class="d-inline" action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick='return confirm("Yorum  Kalıcı Olarak Silinecek emin misiniz ?");' title="Sil" type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                </form>
                            @endcan--}}

                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Yorum Yapan Ad Soyad </th>
                    <th>Yorum</th>
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
