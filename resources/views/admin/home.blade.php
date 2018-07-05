@extends('layouts.admin')

@section('head')
   <title>Администратор</title>
@endsection

@section('content')
   <div class="navbar-fixed ">
      <nav class="teal">
         <div data-role="menu" class="nav-wrapper hide-on-med-and-down tab-in no-padding-v">
            <ul class="right">
               <li>
                  <div class="action-ajax" data-call="preview" data-action="/admin/landing/preview"
                       data-method="get"><a>Предпросмотр</a></div>
               </li>
               <li>
                  <div class="action-ajax" data-call="information" data-action="/admin/table"
                       data-method="get"><a>Информация</a></div>
               </li>
               <li>
                  <div class="action-ajax" data-call="settings" data-action="/admin/settings/profile"
                       data-method="get"><a>Настройки</a></div>
               </li>
               <li>
                  <div class="action-ajax" id="start" data-call="landing" data-action="/admin/about"
                       data-method="get"><a>Документация</a></div>
               </li>
               <li>
                  <div class="action-ajax" data-call="orders" data-action="/admin/orders"
                       data-method="get"><a>Заказы</a></div>
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
         <div class="show-on-medium-and-down right">
            <a href="#" data-target="slide-out" class="sidenav-trigger">
               <i class="material-icons">menu</i>
            </a>
         </div>
      </nav>
   </div>

   <ul id="slide-out" class="sidenav" data-role="menu">
      <li><a class="subheader">Меню</a></li>
      <li>
         <div class="action-ajax" data-call="preview" data-action="/admin/landing/preview"
              data-method="get"><a>Предпросмотр</a></div>
      </li>
      <li>
         <div class="action-ajax" data-call="information" data-action="/admin/table"
              data-method="get"><a>Информация</a></div>
      </li>
      <li>
         <div class="action-ajax" data-call="settings" data-action="/admin/settings/profile"
              data-method="get"><a>Настройки</a></div>
      </li>
      <li>
         <div class="action-ajax" data-call="landing" data-action="/admin/about"
              data-method="get"><a>Документация</a></div>
      </li>
      <li>
         <div class="action-ajax" data-call="orders" data-action="/admin/orders"
              data-method="get"><a>Заказы</a></div>
      </li>
      <li>
         <div class="divider"></div>
      </li>
      <li>
         <a class="btn waves-effect waves-red" href="{{ route('logout') }}"
            onclick="event.preventDefault();document.getElementById('logout-form-min').submit();">
            {{ __('Logout') }}
         </a>
         <form id="logout-form-min" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
         </form>
      </li>
   </ul>

   <div data-role="content"></div>

   <div class="loader" style="display: none;">
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

   <script src="/js/cookie.js"></script>

   <script>
      let menu = "[data-role=menu]";
      let content = "[data-role=content]";


      jQuery(document).ready(function ($) {
         $('.sidenav').sidenav();
         $(menu + " .action-ajax").click(function () {
            Cookies.set('page', $(this).attr('data-call'));
            let token = $('meta[name="csrf-token"]');
            $.ajax({
               url: $(this).attr('data-action'),
               headers: {
                  'X-CSRF-TOKEN': token.attr('content')
               },
               data: '_token=' + token.attr('content'),
               method: 'POST',
               contentType: false,
               cache: false,
               processData: false,
               beforeSend: function () {
                  $(".loader").fadeIn(50);
               },
               success: function (result) {
                  $(".loader").fadeOut(50);
                  $(content).toggle().html(result).fadeIn(200);
               },
               error: function () {
                  $(".loader").fadeOut(50);
                  M.toast({html: 'Неизвестная ошибка'});
               }
            });
            return true;
         });

         if(Cookies.get('page')!==undefined)
         {
            $('[data-call='+Cookies.get('page')+']').click();
         }
      });
   </script>

@endsection
