<!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="utf-8">
   <title>Типа.Лэндинг</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
   <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900|Montserrat:400,700'
         rel='stylesheet' type='text/css'>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
   <link rel="stylesheet" href="/css/main.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
</head>

<body>

<header style="background: url({{$main_image}}) no-repeat center center">
   <div class="">
      <div class="row">
         <div class="col l3 offset-l9 s12">
            <a href="#"><img src="{{$logo}}" alt=""></a>
         </div>
      </div>
      <div class="row">
         <div class="header-info">
            <div class="col s12">
               <h1 class="text-shadow hide-on-small-only breack-word center-align">{{$full_title}}</h1>
               <h4 class="text-shadow hide-on-med-and-up white-text breack-word center-align">{{$full_title}}</h4>
               <p class="lead flow-text text-shadow center-align">{{$header_info}}</p>
            </div>

            <div class="row">
               <div class="col s12 flex-center">
                  <div class="flex-center">
                     <a href="#invite" class="btn waves-effect waves-light btn-large scroll">Заказать</a>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </div>
</header>

<div class="mouse-icon hide-on-small-only">
   <div class="scroll"></div>
</div>

<section id="main-info" class="pad-xl">
   <div class="container">
      <div class="row">
         <div class="col s12 m3">
            <div class="flex-center fixed-h-100">
               <img src="{{$ef1}}" alt="" class="responsive-img">
            </div>
            <hr class="line purple">
            <h5 class="center-align">{{$ef1_inf}}</h5>
         </div>
         <div class="col s12 m3">
            <div class="flex-center fixed-h-100">
               <img src="{{$ef2}}" alt="" class="responsive-img">
            </div>
            <hr class="line blue">
            <h5 class="center-align">{{$ef2_inf}}</h5>
         </div>
         <div class="col s12 m3">
            <div class="flex-center fixed-h-100">
               <img src="{{$ef3}}" alt="" class="responsive-img">
            </div>
            <hr class="line yellow">
            <h5 class="center-align">{{$ef3_inf}}</h5>
         </div>
         <div class="col s12 m3">
            <div class="flex-center fixed-h-100">
               <img src="{{$ef4}}" alt="" class="responsive-img">
            </div>
            <hr class="line blue">
            <h5 class="center-align">{{$ef4_inf}}</h5>
         </div>
      </div>
   </div>
</section>

<section id="pricing" class="pad-lg">
   <div class="container">
      <div class="row margin-40">
         <div class="col s12 center-align">
            <h2 class="breack-word">{{$title_2}}</h2>
         </div>
      </div>

      <div class="row fixed-cards-500 margin-50">

         <div class="col s12 m12 l6">
            <div class="card">
               <div class="card-image">
                  <img src="{{$ef5}}" class="half-img" alt="">
               </div>
               <div class="center-align">
                  <h5>{{$ef5_title}}</h5>
               </div>
               <div class="card-content center-align">
                  {{$ef5_content}}
               </div>
            </div>
         </div>

         <div class="col l6 s12 m12">
            <div class="card">
               <div class="card-image">
                  <img src="{{$ef8}}" alt="" class="half-img">
               </div>
               <div class="center-align">
                  <h5>{{$ef8_title}}</h5>
               </div>
               <div class="card-content center-align">
                  {{$ef8_content}}
               </div>
            </div>
         </div>
         <div class="col s12 m12 l6">
            <div class="card">
               <div class="card-image">
                  <img src="{{$ef6}}" alt="" class="half-img">
               </div>
               <div class="center-align">
                  <h5>{{$ef6_title}}</h5>
               </div>
               <div class="card-content center-align">
                  {{$ef6_content}}
               </div>
            </div>
         </div>

         <div class="col s12 m12 l6">
            <div class="card">
               <div class="card-image">
                  <img src="{{$ef7}}" alt="" class="half-img">
               </div>
               <div class="center-align">
                  <h5>{{$ef7_title}}</h5>
               </div>
               <div class="card-content center-align">
                  {{$ef7_content}}
               </div>
            </div>
         </div>


         <div class="col offset-l3 s12 m12 l6">
            <div class="card">
               <div class="card-image">
                  <img src="{{$ef9}}" alt="" class="half-img">
               </div>
               <div class="center-align">
                  <h5>{{$ef9_title}}</h5>
               </div>
               <div class="card-content center-align">
                  {{$ef9_content}}
               </div>
            </div>
         </div>

      </div>
   </div>
</section>

<section id="invite" class="pad-lg light-gray-bg">
   <div class="container">
      <div class="row">
         <div class="col offset-l2 offset-m2 m8 l8 s12">
            <div class="card-panel">
               <div class="excellent flex-center" style="display: none">
                  <h2>Заказ оформлен</h2>
               </div>
               <form action="/main/add" method="POST" id="form">
                  @csrf
                  <div class="input-field">
                     <input name="name" id="form_name" type="text" class="validate">
                     <label for="form_name">Имя</label>
                  </div>
                  <div class="input-field">
                     <input name="email" id="form_email" type="text" class="validate">
                     <label for="form_email">Почта</label>
                  </div>
                  <div class="input-field">
                     <input name="phone" id="form_phone" class="phone" type="tel"
                            placeholder="+7 ( ) - -">
                     <label for="form_phone">Контактный телефон</label>
                  </div>
                  <div class="input-field">
                     <input name="message" id="form_lorem" type="text" class="validate">
                     <label for="form_lorem">Доп. информация</label>
                  </div>
                  <div class="input-field">
                     <div><span class="p range-slider">Кол-во товара</span></div>
                     <div class="range-slider flex-center">
                        <input class="range-slider__range" type="range" name="count" value="5" min="1" max="25">
                        <span class="range-slider__value">0</span>
                     </div>
                  </div>
                  <div class="input-box">
                     <label>
                        <input name="grant" type="checkbox">
                        <span>Согласие на обработку персональных данных</span>
                     </label>
                  </div>
                  @captcha()
                  <div class="input-box">
                     <button name="start" value="start" class="btn waves-effect waves-light">оформить</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>

<footer class="page-footer cyan darken-2">
   <div class="container">
      <div class="row">
         <div class="col l4 m6 s12">
            <h5 class="white-text">О КОМПАНИИ</h5>
            <ul>
               <li>Новости Good Line</li>
               <li>Центры обслуживания</li>
               <li>Документы</li>
               <li>Реквизиты</li>
               <li>Вакансии</li>
            </ul>
         </div>
         <div class="col l4 m6 s12">
            <h5 class="white-text">УСЛУГИ</h5>
            <ul>
               <li>Сервис и оборудование</li>
               <li>Роутер Good Line</li>
               <li>Калькулятор услуг</li>
               <li>Бамбук ТВ</li>
               <li>Dr.Web</li>
               <li>Wi-Fi зоны</li>
            </ul>
         </div>
         <div class="col l4 m6 s12">
            <h5 class="white-text">ПОМОЩЬ</h5>
            <ul>
               <li>Удаленный помощник</li>
               <li>Приложение «Техподдержка»</li>
               <li>Подключен ли ваш дом?</li>
               <li>Инструкция по настройке ТВ</li>
               <li>Конфиденциальность</li>
            </ul>
         </div>
      </div>
   </div>
   <div class="footer-copyright">
      <div class="container">
         © 2014 Copyright Text
         <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
      </div>
   </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/js/mask.js"></script>
<script>
   $(function () {


      var rangeSlider = function () {
         var slider = $('.range-slider'),
            range = $('.range-slider__range'),
            value = $('.range-slider__value');

         slider.each(function () {

            value.each(function () {
               var value = $(this).prev().attr('value');
               $(this).html(value);
            });

            range.on('input', function () {
               $(this).next(value).html(this.value);
            });
         });
      };
      $("#form_phone").mask("+9(999)999-99-99");
      rangeSlider();

      $('form').submit(function (event) {
         event.preventDefault();
         $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
               $(".loader").removeClass("hidden");
            },
            success: function (result) {
               $(".loader").addClass("hidden");
               let response = grecaptcha.getResponse();
               if (response.length >= 10) {
                  let current = $("button[name=start]").parent().parent();
                  current.fadeOut();
                  $(".excellent").delay(500).fadeIn();
                  let height = current.height();
                  let width = current.width();
                  $(".excellent").width(width).height(height);
               }
               else {
                  M.toast({html: 'Капча не прошла'});
               }
               M.toast({html: result});
            },
            error: function (result) {
               let data = result.responseJSON.message;
               let error = result.responseJSON.errors;
               if (data !== undefined) {
                  M.toast({html: error[Object.keys(error)[0]]});
               }
               $(".loader").addClass("hidden");
            },
         });
      });

   })
</script>
</body>
</html>
