@extends('layouts.admin')

@section('head')
<title>Администратор</title>
@endsection

@section('content')
<div class="navbar-fixed ">
   <nav class="teal">
      <div class="nav-wrapper main-nav-menu-ID hide-on-med-and-down tab-in no-padding-v">
         <ul class="right">
            <li>
               <a class="action-ajax" href="#call_preview" data-call="preview" data-action="/admin/landing/preview"
               data-method="get">Предпросмотр</a>
            </li>
            <li>
               <a class="action-ajax" href="#call_information" data-call="information" data-action="/admin/table"
               data-method="get">Информация</a>
            </li>
            <li>
               <a class="action-ajax" href="#call_settings" data-call="settings" data-action="/admin/settings/profile"
               data-method="get">Настройки</a>
            </li>
            <li>
               <a class="action-ajax" href="#call_landing" data-call="landing" data-action="/admin/about"
               data-method="get">Лэндинг</a>
            </li>
            <li>
               <a class="action-ajax" href="#call_orders" data-call="orders" data-action="/admin/orders"
               data-method="get">Заказы</a>
            </li>
         </ul>
         <a class="btn waves-effect waves-red" href="{{ route('logout') }}"
         onclick="logout();">
         {{ __('Logout') }}
      </a>
   </div>
   <div class="show-on-medium-and-down right">
      <a href="#" data-target="slide-out" class="sidenav-trigger">
         <i class="material-icons">menu</i>
      </a>
   </div>
</nav>
</div>

<ul id="slide-out" class="sidenav main-nav-menu-ID">
   <li><a class="subheader">Меню</a></li>
   <li>
      <a class="action-ajax" href="#call_preview" data-call="preview" data-action="/admin/landing/preview"
      data-method="get">Предпросмотр</a>
   </li>
   <li>
      <a class="action-ajax" href="#call_information" data-call="information" data-action="/admin/table"
      data-method="get">Информация</a>
   </li>
   <li>
      <a class="action-ajax" href="#call_settings" data-call="settings" data-action="/admin/settings/profile"
      data-method="get">Настройки</a>
   </li>
   <li>
      <a class="action-ajax" href="#call_landing" data-call="landing" data-action="/admin/about"
      data-method="get">Лэндинг</a>
   </li>
   <li>
      <a class="action-ajax" href="#call_orders" data-call="orders" data-action="/admin/orders"
      data-method="get">Заказы</a>
   </li>
   <li><div class="divider"></div></li>
   <li>
      <a class="waves-effect waves-red" href="{{ route('logout') }}"
      onclick="logout();">
      {{ __('Logout') }}
   </a>
</li>
</ul>

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
      function logout()
      {event.preventDefault();document.getElementById('logout-form').submit();}
      M.AutoInit();
      $('.sidenav').sidenav();
      $(".main-nav-menu-ID .action-ajax").click(function () {
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
               $("#mainContentController").css({'opacity': '0'}).html(result).animate({
                  opacity: 1
               }, 250, "swing");
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

<form id="logout-form" action="{{ route('logout') }}" role="form" method="POST" style="display: none;">
   @csrf
   {{ method_field('POST') }}
</form>

@endsection
