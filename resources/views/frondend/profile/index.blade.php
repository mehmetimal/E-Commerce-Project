@extends('frondend.profile.layouts.app')


@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Geçmiş Siparişleriniz </h4>
                    <h6 class="card-subtitle"><code>Daha Önceki Siparişlerinize Buradan Ulaşabilirsiniz</code> </h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>

                                <th>Tarih</th>
                                <th>Durum</th>
                                <th>Ücret</th>
                                <th>Sipariş Detayı</th>
                            </tr>
                            </thead>
                            <tbody>
                          @foreach($orders as $order)
                            <tr>
                                <td>SP-{{$order->id}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->state}}</td>
                                <td>{{$order->price}}</td>
                                <td><a href="{{route('order.detail',$order->id)}}">Sipariş Detayı-></a></td>
                            </tr>
                          @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
