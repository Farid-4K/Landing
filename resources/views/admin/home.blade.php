@extends('layouts.admin')

@section('head')
   <title>Администратор</title>
@endsection

@section('content')
   <div class="navbar-fixed">
      <nav class="teal">
         <div class="nav-wrapper tab-in no-padding-v">
            <ul class="right">
               <li>
                  <a href="#call_preview" data-call="preview" data-action="/admin/landing/preview"
                     data-method="get">Предпросмотр</a>
               </li>
               <li>
                  <a href="#call_information" data-call="information" data-action="/admin/table"
                     data-method="get">Информация</a>
               </li>
               <li>
                  <a href="#call_settings" data-call="settings" data-action="/admin/settings/profile"
                     data-method="get">Настройки</a>
               </li>
               <li>
                  <a href="#call_landing" data-call="landing" data-action="/admin/about"
                     data-method="get">Лэндинг</a>
               </li>
               <li>
                  <a href="#call_orders" data-call="orders" data-action="/admin/orders"
                     data-method="get">Заказы</a>
               </li>
            </ul>
            <a class="btn waves-effect waves-red" href="{{ route('logout') }}"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
               {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               @csrf
            </form>
         </div>
      </nav>
   </div>

   <div id="mainContentController"></div>

   <div class="loader hidden">
      <div class="preloader-wrapper big active">
         <div class="spinner-layer spinner-blue-only">
            <div class="circle-clipper left">
               <div class="circle"></div>
            </div>
            <div class="gap-patch">
               <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
               <div class="circle"></div>
            </div>
         </div>
      </div>
   </div>

   <script>
      $(function () {
         M.AutoInit();
         $("nav li>a").click(function () {
            $.ajax({
               type: $(this).attr('data-method'),
               url: $(this).attr('data-action'),
               data: 'page=' + $(this).attr('data-call'),
               contentType: false,
               cache: false,
               processData: false,
               beforeSend: function () {
                  $(".loader").css("opacity", "1").removeClass("hidden");
               },
               success: function (result) {
                  $(".loader").animate({
                     opacity: 0,
                  }, 310, "swing", function () {
                     $(this).addClass("hidden");
                  });
                  $("#mainContentController").css({'opacity': '0'}).html(result).delay(310).animate({
                     opacity: 1
                  }, 310, "swing");
               },
               error: function () {
                  $(".loader").animate({
                     opacity: 0,
                  }, 310, "swing", function () {
                     $(this).addClass("hidden");
                  });
                  M.toast({html: 'Неизвестная ошибка'});
               }
            });
         });
         $("a[data-call='"+location.hash.substr(6)+"']").click();

      });
   </script>

@endsection