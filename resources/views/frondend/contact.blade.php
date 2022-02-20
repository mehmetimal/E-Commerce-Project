@extends('frondend.layouts.app')

@section('banner_title', 'İletişim ')
@section('banner_text','Bizimle İstediğiniz Yolla İletişime geçebilir , satıcımız olabilir , öneri ve sorunlarınızı bize iletebilirsiniz')


@section('content')



    <div class="kalles-section container mb__50 cb">
        <div class="row fl_center">
            <div class="contact-form col-12 col-md-6 order-1 order-md-0">
                <form method="post" action="{{route('store.contact.request')}}" class="contact-form">
                    @csrf
                    <h3 class="mb__20 mt__40">MESAJ BIRAKIN </h3>
                    <div class="row">
                    <p class="col-6">
                        <label for="ct-name">Adınız  (*) </label>
                        <input required="required" type="text" id="ct-name" name="name" value="">
                    </p>
                        <p class="col-6">
                            <label for="ct-name">Soyadınız (*) </label>
                            <input required="required" type="text" id="ct-name" name="surname" value="">
                        </p>
                    </div>
                    <p>
                        <label for="ct-email">Mail Adresiniz  (*)</label>
                        <input required="required" type="email" id="ct-email" name="email" value="">
                    </p>
                    <p>
                        <label for="ct-phone">Telefon Adresiniz </label>
                        <input type="tel" id="ct-phone" name="phone" pattern="[0-9\-]*" value="">
                    </p>
                    <p>
                        <label for="ct-message">Mesajınız </label>
                        <textarea rows="20" id="ct-message" name="message" required="required"></textarea>
                    </p>
                    <input type="submit" class="button w__100" value="Mesajınızı Yollayın Size Dönüş Sağlayalım ">
                </form>
            </div>
            <div class="contact-content col-12 col-md-6 order-0 order-md-1">
                <h3 class="mb__20 mt__40">İletişim Hakkında </h3>
                <p>Size hizmet vermekten mutluluk duyuyoruz .. Bu amaçla bize sosyal medya hesaplarımızdan mail adresimizden her zaman sorularınızı iletebilir iletişimde kalabilirsiniz </p>
                <p class="mb__5 d-flex"><i class="las la-home fs__20 mr__10 text-primary"></i> {{$site_setting->address}}</p>
                <p class="mb__5 d-flex"><i class="las la-phone fs__20 mr__10 text-primary"></i> {{$site_setting->phone}}</p>
                <p class="mb__5 d-flex"><i class="las la-envelope fs__20 mr__10 text-primary"></i> {{$site_setting->phone}}</p>
                <a href="https://wa.me/{{$site_setting->phone}}?text=Merhaba%20Bir%20Konuda%20Bilgi%20Almak%20İstiyorum"><p class="mb__5 d-flex"><i class="lab  la-whatsapp fs__20 mr__10 text-primary"></i> WhatssApp İletişim </p></a>
                <a href="{{$site_setting->instagram}}"><p class="mb__5 d-flex"><i class="lab la-instagram fs__20 mr__10 text-primary"></i> Instagram Sayfamız</p></a>
                    <a href="{{$site_setting->facebook}}"><p class="mb__5 d-flex"><i class="lab  la-facebook fs__20 mr__10 text-primary"></i> Faceook Sayfamız</p></a>
                    <a href="{{$site_setting->pinterest}}"><p class="mb__5 d-flex"><i class="lab  la-pinterest fs__20 mr__10 text-primary"></i> Pinterest Sayfamız</p></a>
                <a><p class="mb__5 d-flex"><i class="las la-clock fs__20 mr__10 text-primary"></i> Hergün  9:00-17:00</p>
            </div>
        </div>
    </div>


@endsection
