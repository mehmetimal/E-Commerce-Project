@extends('frondend.layouts.app')
@section('banner_title', 'Ödeme')
@section('banner_text', 'Sipariş Adresini Girin ,İstediğiniz Ödeme Yöntemini Seçin ,Ödemenizi Tamamlayın .İşte Bu Kadar !')
@push('css')
<link rel="stylesheet" href="{{asset('frondend/css/shopping-cart.css')}}">
@endpush

@section('content')


    <!--cart section-->
    <div class="kalles-section cart_page_section container mt__60">
        <div class="frm_cart_page check-out_calculator">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-7">
                    @guest
                    <div id="kalles-section-faqs" class="mt-0 kalles-section nt_section type_faq js_faq_ad mt__50 mb__50">
                    <div class="kalles-tabs sp-tabs">

                        <div class="panel entry-content sp-tab des_mb_2 des_style_2 dn" id="tab_faqs-0">
                            <div class="js_ck_view"></div>
                            <div class="heading bgbl dn">
                                <a class="tab-heading flex al_center fl_between pr cd chp fwm" href="#tab_faqs-0"><span class="txt_h_tab">Kolay Üye Olmak İstiyorum Faydası Nedir ?</span><span class="nav_link_icon ml__5"></span></a>
                            </div>
                            <div class="sp-tab-content">
                                <p class="mb-2">Kolay Üyelik Sayesinde ;</p>
                                <ul class="mb-3">
                                    <li>Sipariş Takibi </li>
                                    <li>Yeniden Adres girmeye gerek kalmadan kolayca sipariş</li>
                                    <li>Kampanya ,İndirimlerden Haberdar OLma </li>
                                </ul>

                                <p class="mb-2"><b class="text-danger">Bilgileriniz Kesinlikle 3. Kişilerle Paylaşılmaz </b> </p>
                                <form action="{{route('register')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <p class="checkout-section__field col-lg-12 col-12 mb-2">
                                            <label for="f-name">Email Adresiniz </label>
                                            <input  name="email" type="text" id="f-name" value="" required>
                                        </p>
                                        <p class="checkout-section__field col-lg-6 col-12">
                                            <label for="f-name">Şifreniz </label>
                                            <input name="password" type="text" id="f-name" value="" required>
                                        </p>
                                        <p class="checkout-section__field col-lg-6 col-12">
                                            <label for="f-name">Şifre Tekrarı</label>
                                            <input type="text" name="password_confirmation" required id="f-name" value="">
                                        </p>
                                        <button>Kolay Üye Ol </button>
                                    </div>

                                </form>
                            </div>

                        </div>

                    </div>

                </div>
                    <div>
                        <p>Zaten Üye Misiniz ? Kayıtlı Adreslerinizi Ve Sipariş  Takibi Görmek <İçin></İçin>
                            <a class="cb chp db push_side" href="#" data-id="#nt_login_canvas">
                                Giriş Yapın</a>
                        </p>
                    </div>

                @endguest
                </div>

              <form id="checkoutForm" action="{{route('place.order')}}" method="POST">
                  @csrf
                  @auth
                      <div id="kalles-section-faqs" class="mt-0 kalles-section nt_section type_faq js_faq_ad mt__50 mb__50">
                          <div class="kalles-tabs sp-tabs">

                              <div class="panel entry-content sp-tab des_mb_2 des_style_2 dn" id="tab_faqs-0">
                                  <div class="js_ck_view"></div>
                                  <div class="heading bgbl dn">
                                      <a class="tab-heading flex al_center fl_between pr cd chp fwm" href="#tab_faqs-0"><span class="txt_h_tab">Kayıtlı Adreslerim </span><span class="nav_link_icon ml__5"></span></a>
                                  </div>
                                  <div class="sp-tab-content">

                                      <div class="card-columns d-inline">
                                          @foreach(\Illuminate\Support\Facades\Auth::user()->addresses as $address)
                                              <div class="card" style="width: 18rem;">
                                                  <div class="card-body">

                                                      <h5 class="card-title"><input type="radio" name="user_address"  checked class="user_address" value="{{$address->id}}">
                                                          Adres Başlığı :  {{$address->title}}
                                                          <br>
                                                          Ad  - Soyad : {{$address->name}} - {{$address->surname}}
                                                          <br>İletişim {{$address->phone}}
                                                          <br> il:{{$address->province}}
                                                          <br>İlçe: {{$address->district}} <br>
                                                      </h5>
                                                      <p class="card-text">{{$address->description}} </p>

                                                  </div>
                                              </div>
                                          @endforeach
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>


                  @endauth
                  <button  type="button" class="btn btn-primary form-control addDiffrentAddress"> Adres Ekle</button>

                  <div class="row ">
                        <div class="col-12 col-md-6 col-lg-7 ">
                            <div class="checkout-section @auth d-none @endauth" id="checkoutDiv">
                                <h3 class="checkout-section__title ">@guest Teslimat  Adresi Bilgileri @else Farklı Adres Ekle @endguest  </h3>
                                <div class="row">
                                                    <p class="checkout-section__field col-lg-6 col-12">
                                                        <label for="f-name">Teslim Alan  Ad</label>
                                                        <input type="text" id="address_user_name" name="address_user_name" value="{{old('address_user_name')}}">
                                                    </p>

                                                    <p class="checkout-section__field col-lg-6 col-12">
                                                        <label for="l-name">Teslim Alan  Soyad</label>
                                                        <input  name="address_user_surname" type="text" id="address_user_surname" value="{{old('address_user_surname')}}">
                                                    </p>

                                                    <p class="checkout-section__field col-12">
                                                        <label for="company">Teslim Alan Telefon </label>
                                                        <input type="text"  name="address_user_phone" id="address_user_phone" value="{{old('address_user_phone')}}">
                                                    </p>
                                                    <p class="checkout-section__field col-12">
                                                        <label for="company">Email </label>
                                                        <input type="email" name="user_email" id="user_email" value="
                                                        {{old('user_email',\Illuminate\Support\Facades\Auth::user()->email ?? '')}}
                                                        ">
                                                    </p>
                                                    <p class="checkout-section__field col-lg-6 col-12">
                                                            <label for="f-name">İl </label>
                                                            <select name="address_user_province" id="address_province_ship">
                                                            @if(!old('address_user_province'))

                                                            <option value="" selected disabled>İl Seçiniz </option>

                                                            @endif

                                                            @foreach($provinces as $province)
                                                                        <option data-province-id="{{$province->id}}" {{old('address_user_province') == $province->name ? 'selected':''}} value="{{$province->name}}" >{{$province->name}} </option>
                                                            @endforeach

                                                            </select>
                                                    </p>

                                                    <p class="checkout-section__field col-lg-6 col-12">
                                                            <label for="l-name">İlçe </label>
                                                            <select  name="address_user_district" id="address_user_district">
                                                                @if(old('address_user_district'))

                                                                    <option value="{{old('address_user_district')}}" selected disabled>{{old('address_user_district')}} </option>

                                                                @endif
                                                            </select>
                                                    </p>

                                                    <p class="checkout-section__field col-12">
                                                            <label for="order_comments" class="">Adres Açıklamsı</label>
                                                            <textarea  id="order_comments" name="address_user_description" placeholder="Detaylı Açık Adres" rows="2" cols="5">{{old('address_user_description')}}</textarea>
                                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-5 mt__50 mb__80 mt-md-0 mb-md-0">
                            <div class="order-review__wrapper">
                                <h3 class="order-review__title">Sipariş Detayı </h3>
                                <div class="checkout-order-review">
                                    <table class="checkout-review-order-table">
                                        <thead>
                                        <tr>
                                            <th class="product-name">Ürün </th>
                                            <th class="product-total">Toplam</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                      @foreach(Cart::content() as $item )
                                        <tr class="cart_item">
                                            <td class="product-name">{{$item->name}} - {{$item->options->product_name}}<strong class="product-quantity">× {{$item->qty}}</strong>
                                            </td>
                                            <td class="product-total"><span class="cart_price">{{$item->price * $item->qty}} ₺</span></td>
                                        </tr>
                                      @endforeach

                                        </tbody>
                                        <tfoot>
                                        <tr class="cart-subtotal cart_item">
                                            <th>Ürün Toplamı </th>
                                            <td><span class="cart_price">{{Cart::subTotal()}} ₺</span></td>
                                        </tr>
                                        <tr class="cart_item">
                                            <th>Kargo Ücreti  </th>
                                            <td><span class="cart_price">{{$site_setting->cargo_price}}₺</span></td>
                                        </tr>
                                        <tr class="order-total cart_item">
                                            <th>Toplam </th>
                                            <td><strong><span class="cart_price amount">{{Cart::subTotal( 2, '.', '' ) + $site_setting->cargo_price}} ₺  </span></strong></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <div class="checkout-payment">
                                        <ul class="payment_methods">
                                            <li class="payment_method">
                                                <input id="payment_method" type="radio" class="input-radio" name="payment_method" value="1" >
                                                <label for="payment_method_bacs">Kapıda Ödeme </label>
                                                <div class="payment_box payment_method_bacs">
                                                    <p>Kargo Yetkilileri Ürününüzü Elden Teslim eder Kredi kartı bilgileri gerekmez
                                                        .</p>
                                                </div>
                                            </li>
                                            <li class="payment_method">
                                                <input id="payment_method" type="radio" class="input-radio" name="payment_method" value="2">
                                                <label for="payment_method_stripe">
                                                    Kredi Kartı
                                                    <img src="{{asset('/images/visa.svg')}}" class="stripe-visa-icon stripe-icon" alt="Visa">
                                                    <img src="{{asset('/images/mastercard.svg')}}" class="stripe-mastercard-icon stripe-icon" alt="Mastercard">
                                                    <img src="{{asset('/images/amex.svg')}}" class="stripe-amex-icon stripe-icon" alt="American Express">
                                                    <img src="{{asset('/images/discover.svg')}}" class="stripe-discover-icon stripe-icon" alt="Discover">
                                                    <img src="{{asset('/images/diners.svg')}}" class="stripe-diners-icon stripe-icon" alt="Diners">
                                                    <img src="{{asset('/images/jcb.svg')}}" class="stripe-jcb-icon stripe-icon" alt="JCB">
                                                </label>
                                                <div class="payment_box payment_method_bacs dn">
                                                    <p>Kredi Karti Bilgileriniz Hiçbir Şekilde KAYDEDİLMEZ ve İyzico Güvencesi altında Güvenle Alışveriş Sağlanır .</p>
                                                    <div class="credit-card-form">
                                                        <div class="form-row form-row-wide">
                                                            <label for="stripe-card-element">Kart Üzerindeki Ad/Soyad <span class="required">*</span></label>
                                                            <div class="stripe-card-group">
                                                                <input type="text" name="payment_card_owner" id="payment_card_owner" value="" placeholder="Ad Soyad">
                                                                <i class="stripe-credit-card-brand stripe-card-brand" alt="Credit Card"></i>
                                                            </div>
                                                        </div>
                                                        <div class="form-row form-row-wide">
                                                            <label for="stripe-card-element">Kart Numarası<span class="required">*</span></label>
                                                            <div class="stripe-card-group">
                                                                <input type="text" name="payment_card_number" id="payment_card_number" value="" placeholder="1234 1234 1234 1234">
                                                                <i class="stripe-credit-card-brand stripe-card-brand" alt="Credit Card"></i>
                                                            </div>
                                                        </div>
                                                        <div class="form-row form-row-first ">
                                                            <label for="stripe-exp-element">Kart Son Kullanım Yıl  *</label>
                                                            <p  class="bg-white">
                                                                <select name="payment_card_expire_date_year" id="payment_card_expire_date_year" >
                                                                   <option selected disabled>Yıl </option>
                                                                    @for( $i=2020 ;$i<2050;$i++)
                                                                        <option  value="{{$i}}" >{{$i}}</option>
                                                                    @endfor
                                                                </select>
                                                            </p>
                                                        </div>
                                                        <div class="form-row form-row-last">
                                                            <label for="stripe-cvc-element">Kart Son Kullanım Ay  *</label>
                                                            <p  class="bg-white">
                                                            <select name="payment_card_expire_date_month" id="payment_card_expire_date_month" >
                                                                <option selected disabled>Ay </option>
                                                                @for( $i=1 ;$i<=12;$i++)
                                                                    <option  value="{{$i}}" >{{$i}}</option>
                                                                @endfor
                                                            </select>
                                                            </p>
                                                        </div>

                                                    </div>
                                                    <div class="credit-card-form">
                                                        <div class="form-row form-row-wide">
                                                            <label for="stripe-cvc-element">Kart Güvenlik Kodu (CVC) *</label>

                                                            <input class="form-control" type="text" name="payment_card_cvc" id="cvc" value="" placeholder="CVC">
                                                        </div>
                                                    </div>


                                                </div>
                                            </li>
                                        </ul>
                                        <p class="checkout-payment__policy-text">Girdiğiniz Adres Bilgileri İletişim Bilgileri Ürünlerinizin Tarafınıza Ulaştırılması İçin Kullanılır .
                                        </p>
                                        <label class="checkout-payment__confirm-terms-and-conditions">
                                            <input type="checkbox" name="terms" id="terms">
                                            <span><a data-toggle="modal" data-target="#distance_sales_contract" href="#">Mesafeli Satış Sözleşmesini </a> ve <a data-toggle="modal" data-target="#privacy"  href="#">Gizlilik Sözleşmesini </a>Okudum Kabul Ediyorum </span>&nbsp;<span class="required">*</span>
                                        </label>
                                        <button type="submit" class="button button_primary btn checkout-payment__btn-place-order">Siparişi Tamamla</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
              </form>
            </div>

        </div>
    </div>
@push('js')
    <script>

        $("#checkoutForm").validate({
            rules: {
                address_user_name:{
                    required:{
                        depends: function(element) {
                            return !$('.user_address').is(':checked')
                    },
                    },


                } ,
                address_user_surname:{
                    required:{
                        depends: function(element) {
                            return !$('.user_address').is(':checked')
                        },
                    },


                },
                address_user_phone:{
                    required:{
                        depends: function(element) {
                            return !$('.user_address').is(':checked')
                        },
                    },
                },
                address_user_province:{
                    required:{
                        depends: function(element) {
                            return !$('.user_address').is(':checked')
                        },
                    },
                },
                address_user_district:{
                    required:{
                        depends: function(element) {
                            return !$('.user_address').is(':checked')
                        },
                    },
                },
                address_user_description:{
                    required:{
                        depends: function(element) {
                            return !$('.user_address').is(':checked')
                        },
                    },
                },
                user_email:{
                    required:{
                        depends: function(element) {
                            return !$('.user_address').is(':checked')
                        },
                    },
                },
                payment_method:{
                    required:true
                },
                payment_card_cvc:{

                required: '.input-radio[value="2"]:checked'

                },
                payment_card_owner:{
                    required: '.input-radio[value="2"]:checked'
                },
                payment_card_number:{
                    required: '.input-radio[value="2"]:checked',
                    digits: true,

                    min:16
                },
                payment_card_expire_date_year:{
                    required: '.input-radio[value="2"]:checked'
                },
                payment_card_expire_date_month:{
                    required: '.input-radio[value="2"]:checked'
                },
                terms:{
                    required:true,
                }


            },
            messages: {
                address_user_name:{
                    required:"Alıcı Adı Zorunludur",

                } ,
                address_user_surname:{
                    required:"Alıcı Soyadı  Zorunludur",

                } ,
                address_user_phone:{
                    required:"İletişim İçin Alıcı Telefonu Gerekldir "
                },
                address_user_province:{
                    required:"Teslim Edilecek İl Seçmediniz ",
                },
                address_user_district:{
                    required:"Teslim Edilecek İlçe  Seçmediniz "
                },
                address_user_description:{
                    required:"Siparişin Hızlı İletilmesi İçin Açık Adres Girmelisiniz "
                },
                payment_method:{
                    required:"Ödeme Tipi Seçmediniz "
                },
                payment_card_cvc:{
                    required:"Güvenlik Numarası Girmediniz ",
                },
                payment_card_owner:{
                    required:"Kart Üzerindeki Ad Soyad Bilgisi Girilmelidir  ",

                },
                payment_card_number:{
                    required:"Kart Numarası Girilmelidir  ",
                    digits: "Kart Numarası Sadece Sayılardan Oluşabilir",

                    min:"Kart Numarası 16 HANELİ Olmalıdır "
                },
                payment_card_expire_date_year:{
                    required:"Kart Son Kullanım Yılı Seçilmelidir  ",

                },
                payment_card_expire_date_month:{
                    required:"Kart Son Kullanım Ayı  Seçilmelidir ",

                },
                user_email:{
                    required:"Siparişinizin Takibi İçin E-Mail Adresniz Gereklidir "
                },
                terms:{
                    required:"Lütfen Sözleşmleri Kabul ediniz"
                }

            }
        });
        $('.addDiffrentAddress').on('click',function (){
            $('#checkoutDiv').toggleClass('d-none')
            $('.user_address').attr('checked',false)
        })
        $('#checkoutForm').submit(function(){
            $(this).find('input[type=submit]').prop('disabled', true);
        });
    </script>
    <script>
        $('#address_province_ship').on('change',function (){
            let  province_id =  $('option:selected', this).attr('data-province-id');

            let _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/get-district-by-province-id',
                type: "POST",
                data: {
                    _token: _token,
                    province_id: province_id
                },
                success: function (districts) {
                    $("#address_user_district").html('')
                    $.each(districts, function(index, district) {
                        console.log(district)
                        $("#address_user_district").
                        append('<option value="'+district.name+'">' + district.name  +'</option>')
                    });
                }

            });




        })
    </script>
@endpush
@endsection



