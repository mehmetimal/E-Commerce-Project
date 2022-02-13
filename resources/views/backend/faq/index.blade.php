@extends('backend.layouts.app')
@push('css')
    <link rel="stylesheet" href="{{asset('backend/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/buttons.bootstrap4.min.css')}}">

@endpush
@section('currentPage','Kategoriler')


@section('content')

    <div class="card">
        @can('Create Faq')
        <div class="card-header">
            <h3 class="card-title"><a href="{{route('faq.create')}}" class="btn btn-outline-success">Soru Ekle </a></h3>
        </div>
        @endcan
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Soru</th>
                    <th>Cevap</th>
                    <th style="width: 22%">İşlem</th>
                </tr>
                </thead>
                <tbody>
                @foreach($faqs as $faq)

                    <tr>
                        <td>{{$faq->id}}</td>
                        <td>{{$faq->question}}</td>
                        <td>{{$faq->answer }}</td>
                        <td>
                           @can('Update Faq')
                            <a href="{{route('faq.edit',$faq->id)}}" title="Güncelle" type="button" class="btn btn-success"><i class="fas fa-edit"></i></a>
                           @endcan
                               @can('Delete Faw')
                                   <form style="margin: 0; padding: 0;" class="d-inline" action="{{route('faq.destroy',$faq->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick='return confirm("Soru  Kalıcı Olarak Silinecek emin misiniz ?");' title="Sil" type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                    </form>
                               @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Soru</th>
                    <th>Cevap</th>
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
