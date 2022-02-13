@extends('backend.layouts.app')
@push('css')
    <link rel="stylesheet" href="{{asset('backend/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/buttons.bootstrap4.min.css')}}">

@endpush
@section('currentPage','Varyantlar ')


@section('content')

    <div class="card">
      @can('Create Variant')
        <div class="card-header">
            <h3 class="card-title"><a href="{{route('variant.create')}}" class="btn btn-outline-success">Varyant Ekle </a></h3>
        </div>
      @endcan
          @can('Create Variant')
              <div class="card-header">
                  <h3 class="card-title"><a href="{{route('not_published_variants')}}" class="btn btn-outline-success">Yayında Olmayan Ürünleri Görüntüle  </a></h3>
              </div>
          @endcan

      <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Dükkan</th>
                    <th>Adı</th>
                    <th>Fiyat</th>
                    <th>Adedi</th>

                    <th style="width: 22%">İşlem</th>
                </tr>
                </thead>
                <tbody>
                @foreach($variants as $variant)

                    <tr>
                        <td>Varynt - {{$variant->barcode}}</td>
                        <td>{{$variant->product->shop->name}}</td>
                        <td>{{$variant->name}} - {{$variant->product_name}}</td>
                        <td>{{$variant->price}} ₺</td>
                        <td>{{$variant->quantity}} Adet</td>
                        <td>
                            @can('Update Variant Publish')
                                <a data-is-published="{{$variant->is_published}}" data-variant_id="{{$variant->id}}"  title="Yayına Al Olarak İşaretle " type="button" class="btn {{$variant->is_published == 1 ? 'btn-info' :'btn-default'}} isPublishedButton"><i class="{{$variant->is_published == 1 ? 'fa fa-bell' :'fa fa-bell'}}"></i></a>
                            @endcan
                            @can('Update Variant')
                            <a data-is-sold="{{$variant->is_sold}}" data-variant_id="{{$variant->id}}"  title="Satıldı Olarak İşaretle " type="button" class="btn {{$variant->is_sold == 1 ? 'btn-warning' :'btn-primary'}} isSoldButton"><i class="{{$variant->is_sold == 1 ? 'fa fa-minus' :'fa fa-plus'}}"></i></a>
                            @endcan
                            @can('Update Variant')
                                 <a href="{{route('variant.edit',$variant->id)}}" title="Güncelle" type="button" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            @endcan
                            @can('Delete Variant')
                            <form style="margin: 0; padding: 0;" class="d-inline" action="{{route('variant.destroy',$variant->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick='return confirm("Varyant  Kalıcı Olarak Silinecek emin misiniz ?");' title="Sil" type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                            </form>
                            @endcan

                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Dükkan</th>
                    <th>Adı</th>
                    <th>Fiyat</th>
                    <th>Adedi</th>
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
                })@can('Export Variant')
                     .buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                @endcan
            });
            $('.isSoldButton').on('click',function (){
                let _token   = $('meta[name="csrf-token"]').attr('content');
                let isSold = $(this).data('is-sold');
                let variant_id = $(this).data('variant_id');
                let updatedSold ;
                if (isSold  ===  0){
                   updatedSold = 1 ;
                }else {
                   updatedSold = 0;
                }

                $.ajax({
                    url: "{{route('update.variant.isSold')}}",
                    type: "POST",
                    data:{
                        _token:_token,
                        isSold:updatedSold,
                        variant_id:variant_id
                    },
                    success: function () {
                        window.location.reload();
                    },
                });
            })
        </script>
<script>
    $('.isPublishedButton').on('click',function (){
    console.log('bastım');
        let _token   = $('meta[name="csrf-token"]').attr('content');
        let isPublished = $(this).data('is-published');
        let variant_id = $(this).data('variant_id');
        let updatedPublished ;
        if (isPublished  ===  0){
            updatedPublished = 1 ;
        }else {
            updatedPublished = 0;
        }

        $.ajax({
            url: "{{route('update.variant.isPublished')}}",
            type: "POST",
            data:{
                _token:_token,
                isPublished:updatedPublished,
                variant_id:variant_id
            },
            success: function () {
                window.location.reload();
            },
        });
    })
</script>
    @endpush



@endsection
