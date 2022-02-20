@extends('backend.layouts.app')

@section('currentPage','Sipariş Detayı')
@section('current_tab','Sipariş detayı')
@section('content')

    <div class="row">
        <!-- column -->
        <div class="col-6">
           <form action="{{route('order.update',$order->id)}}" method="POST">
           @csrf
                @method('PUT')
                <div class="col">
               <label>Sipariş Durumu</label> <button class="btn btn-success" type="Submit">Güncelle</button>
               <select class="form-control" name="status">
                   @foreach($orderStatus as $status)
                    <option {{$status==$order->state ? 'selected' :''}} value="{{$status}}">{{$status}} </option>
                   @endforeach

               </select>
           </div>

           </form>
           <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Adres   </h4>
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
                                <td>{{$order->name}}</td>
                                <td>{{$order->surname}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->province}}</td>
                                <td>{{$order->district}}</td>
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
                    <h6 class="card-subtitle"> </h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Sipariş Kodunuz </th>

                                <th>Tarih</th>
                                <th>Durum</th>

                                <th>Ücret</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td>SP-{{$order->id}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->state}}</td>
                                <td>{{$order->price}}</td>
                            </tr>
                            <tr >
                                <td colspan="4">
                                    {{$order->order_type== 1 ?'Kapıda Ödeme ' :'Kredi Kartı'}}
                                </td>
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
                    <h4 class="card-title">Sipariş Detay </h4>
                    <h6 class="card-subtitle"> </h6>
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
                            @foreach($order->basket->items as $basketItem)

                                <tr>
                                    <td><img src="{{$basketItem->image_url}}" width="150" height="150"></td>
                                    <td>{{$basketItem->name}}</td>
                                    <td>{{$basketItem->price}}</td>
                                    <td>{{$basketItem->qty}}</td>
                                    @if($order->order_type == 2 && $basketItem->is_applied==0)
                                        <td><a href="{{route('approve.item',$basketItem->transaction_id)}}" class="btn btn-success">Ürünü Onayla</a></td>
                                    @else
                                        <td>Kapıda Ödeme Veya Ürün Onaylanmış </td>

                                    @endif
                                    <td>{{$basketItem->qty * $basketItem->price}}</a></td>

                                </tr>

                            @endforeach
                            <tr >
                                <td ></td>
                                <td ></td>
                                <td ></td>
                                <td ></td>
                                <td ></td>
                                <td ><b>{{collect($order->basket->items)->sum(function ($item){return $item->price*$item->qty;})}} +KARGO</b></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

