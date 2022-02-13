@extends('frondend.profile.layouts.app')


@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Adres Detayınız  </h4>
                    <h6 class="card-subtitle"><code>Siparişiniz için vermiş olduğunuz adres bilgileri aşağıdadır </code> </h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Ad</th>

                                <th>Soyad</th>
                                <th>İletişim</th>
                                <th>İl</th>
                                <th>İlçe</th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>{{$orderWithDetails->name}}</td>
                                    <td>{{$orderWithDetails->surname}}</td>
                                    <td>{{$orderWithDetails->phone}}</td>
                                    <td>{{$orderWithDetails->province}}</td>
                                    <td>{{$orderWithDetails->district}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ödeme Detayları </h4>
                    <h6 class="card-subtitle"><code>Ödemenize ait tercih ettiğiniz yöntemler </code> </h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Sipariş Kodunuz </th>

                                <th>Tarih</th>
                                <th>Durum</th>
                                <th>Durum</th>
                                <th>Ücret</th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>SP-{{$orderWithDetails->id}}</td>
                                    <td>{{$orderWithDetails->created_at}}</td>
                                    <td>{{$orderWithDetails->state}}</td>
                                    <td>{{$orderWithDetails->price}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sipariş Detauyınız </h4>
                    <h6 class="card-subtitle"><code>Siparişinize Ait Ürün Ve Detaylar </code> </h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Ürün Görseli </th>

                                <th>Ürün</th>
                                <th>Birim Fiyat</th>
                                <th>Adet</th>
                                <th>Durum</th>
                                <th>Toplam</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderWithDetails->basket->items as $basketItem)

                                <tr>
                                    <td><img src="{{$basketItem->image_url}}" width="150" height="150"></td>
                                    <td>{{$basketItem->name}}</td>
                                    <td>{{$basketItem->price}}</td>
                                    <td>{{$basketItem->qty}}</td>
                                    <td>{{$basketItem->is_refunded == 1 ? 'İade Edildi' :'İade Edilmedi'}}</a></td>
                                    <td>{{$basketItem->qty * $basketItem->price}}</a></td>

                                </tr>

                            @endforeach
                            <tr >
                                <td ></td>
                                <td ></td>
                                <td ></td>
                                <td ></td>
                                <td ></td>
                                <td ><b>{{collect($orderWithDetails->basket->items)->sum(function ($item){

return $item->price*$item->qty;
})}} +KARGO</b></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
