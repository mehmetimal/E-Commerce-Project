@extends('frondend.layouts.app')
@section('content')
   <style>
       /* ==========================================================================
          Base Styles - ! HTML5 Boilerplate v5.0 | MIT License | http://h5bp.com/
          ========================================================================== */

       html,
       body {
           width: 100%;
           height: 100%;
           margin: 0;
           padding: 0;
       }

       ::-moz-selection {
           background: #b3d4fc;
           text-shadow: none;
       }

       ::selection {
           background: #b3d4fc;
           text-shadow: none;
       }

       a{
           color: #4384F5;
           text-decoration: none;
       }

       a:hover{
           opacity: 0.8;
       }

       svg {
           vertical-align: middle;
       }


       /* ==========================================================================
          Main Styles
          ========================================================================== */

       .container {
           display: table;
           font-family: 'Open Sans', sans-serif;
           height: 100%;
           width: 100%;

       }

       .content{
           display: table-cell;
           font-size: 22px;
           text-align: center;
           vertical-align: middle;
           padding: 40px 30px;
       }

       .inner-wrapper{
           display: inline-block;
       }

       .top-title{
           color: #4384F5;
           font-size: 35px;
           font-weight: 700;
           margin-bottom: 25px;
       }

       .main-title{
           line-height: 0;
           font-size: 90px;
           font-weight: 800;
           color: #4384F5;
       }

       .svg-wrap{
           display: inline-block;
           font-size: 0;
           vertical-align: super;
       }

       #lego{
           padding: 5px;
       }

       .blurb{
           margin-top: 30px;
           color: #B6BECC;
       }

       .lego-btn{
           background: #4384F5;
           border-radius: 4px;
           color: #fff;
           display: inline-block;
           margin-top: 30px;
           padding: 12px 25px;
       }

       /* ==========================================================================
          Media Queries
          ========================================================================== */



       @media only screen and (max-width: 440px){

           .main-title{
               font-size: 60px;
           }

           #lego{
               width: 50px;
               height: 55px;
               padding: 10px 5px;
           }

           .blurb,
           .lego-btn{
               font-size: 18px;
           }


       }
   </style>
   <div class="container">

       <div class="content">

           <!-- top container -->
           <div class="inner-wrapper">
               <div class="top-title">Mahcup Olduk !</div>

               <div class="main-title">
                   4
                   <span class="svg-wrap">
<svg width="100px" height="100px" viewBox="0 0 24 24" role="img" xmlns="http://www.w3.org/2000/svg" aria-labelledby="sadFaceIconTitle" stroke="#000000" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#000000"> <title id="sadFaceIconTitle">sad Face</title> <line stroke-linecap="round" x1="9" y1="9" x2="9" y2="9"/> <line stroke-linecap="round" x1="15" y1="9" x2="15" y2="9"/> <path d="M8,16 C9.33333333,15.3333333 10.6656028,15.0003822 11.9968085,15.0011466 C13.3322695,15.0003822 14.6666667,15.3333333 16,16"/> <circle cx="12" cy="12" r="10"/> </svg>

        </span>
                   4
               </div>
           </div>

           <!-- bottom-tagline -->
           <p class="blurb">
              Aradığınız Ürün Veya Sayfayı Bulamadık .<br/>
               <a href="#">Anasayfaya Dön </a>

           </p>


       </div>

   </div>
@endsection
