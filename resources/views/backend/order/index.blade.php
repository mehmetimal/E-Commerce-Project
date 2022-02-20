@extends('backend.layouts.app')
@push('css')
    <link rel="stylesheet" href="{{asset('backend/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/buttons.bootstrap4.min.css')}}">

@endpush
@section('currentPage','Siparişler')


@section('content')

    <div class="card">
        {{--<div class="card-header">
            <h3 class="card-title"><a href="{{route('category.create')}}" class="btn btn-outline-success">@lang('message.add_category')</a></h3>
        </div>--}}
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Sipariş Veren </th>
                    <th>Ücret</th>
                    <th>Tip</th>
                    <th>Durum</th>
                    <th>Sipariş Tarihi</th>
                    <th style="width: 22%">İşlem</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)

                    <tr>
                        <td>SP-{{$order->id}}</td>
                        <td>{{$order->name}} -{{$order->surname}}</td>
                        <td>{{$order->price }} ₺</td>
                        <td>{{$order->order_type == 1 ? 'KAPIDA ÖDEME ' :'KREDİ KARTI '}}</td>
                        <td>{{$order->state}}</td>
                        <td>{{$order->created_at->format('Y-m-d')}}</td>
                        <td>
                            @can('Update Order')
                            <a href="{{route('order.edit',$order->id)}}" title="Güncelle" type="button" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            @endcan
                            @can('Delete Order')
                            <form style="margin: 0; padding: 0;" class="d-inline" action="{{route('order.destroy',$order->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick='return confirm("Sipariş  Kalıcı Olarak Silinecek emin misiniz ?");' title="Sil" type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Sipariş Veren </th>
                    <th>Ücret</th>
                    <th>Tip</th>
                    <th>Durum</th>
                    <th>Sipariş Tarihi</th>
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
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            });
        </script>

    @endpush



@endsection
