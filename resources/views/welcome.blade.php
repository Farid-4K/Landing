<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <title>Типа.Лэндинг</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

   <link rel="stylesheet" href="/css/font-awesome.min.css">
   <link rel="stylesheet" href="/css/animate.css">
   <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900|Montserrat:400,700'
         rel='stylesheet' type='text/css'>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
   <link rel="stylesheet" href="/css/bootstrap.min.css">
   <link rel="stylesheet" href="/css/main.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

   <script src="/js/landing/modernizr-2.7.1.js"></script>

</head>

<body>

<header style="background: url({{$main_image}}) no-repeat center center">
   <div class="container">
      <div class="row">
         <div class="col-xs-6 fadeInUp" style="z-index: 2">
            <a href="#"><img src="{{$logo}}" alt=""></a>
         </div>
      </div>

      <div class="row">
         <div class="header-info">
            <div class="col s12 text-center">
               <h1 class="wow text-shadow fadeIn">{{$full_title}}</h1>
               <p class="lead text-shadow wow fadeIn" data-wow-delay="0.5s">{{$header_info}}</p>
            </div>

            <div class="row">
               <div class="col s12 flex-center">
                  <div class="wow flex-center fadeInUp" data-wow-delay="1.4s">
                     <a href="#invite" class="btn waves-effect waves-light btn-large scroll">Заказать</a>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </div>
</header>

<div class="mouse-icon hidden-xs">
   <div class="scroll"></div>
</div>

<section id="main-info" class="pad-xl">
   <div class="container">
      <div class="row">
         <div class="col-sm-3 wow fadeIn" data-wow-delay="0.4s">
            <div class="flex-center">
               <img src="{{$ef1}}" alt="" class="responsive-img">
            </div>
            <hr class="line purple">
            <h5>{{$ef1_inf}}</h5>
         </div>
         <div class="col-sm-3 wow fadeIn" data-wow-delay="0.8s">
            <div class="flex-center">
               <img src="{{$ef2}}" alt="" class="responsive-img">
            </div>
            <hr class="line blue">
            <h5>{{$ef2_inf}}</h5>
         </div>
         <div class="col-sm-3 wow fadeIn" data-wow-delay="1.2s">
            <div class="flex-center">
               <img src="{{$ef3}}" alt="" class="responsive-img">
            </div>
            <hr class="line yellow">
            <h5>{{$ef3_inf}}</h5>
         </div>
         <div class="col-sm-3 wow fadeIn" data-wow-delay="1.2s">
            <div class="flex-center">
               <img src="{{$ef4}}" alt="" class="responsive-img">
            </div>
            <hr class="line yellow">
            <h5>{{$ef4_inf}}</h5>
         </div>
      </div>
   </div>
</section>

<section id="pricing" class="pad-lg">
   <div class="container">
      <div class="row margin-40">
         <div class="col s8 offset-m2 text-center">
            <h2>{{$title_2}}</h2>
         </div>
      </div>

      <div class="row fixed-cards-500 margin-50">

         <div class="col s4">
            <div class="card card-panel">
               <div class="card-image">
                  <img src="{{$ef5}}" class="half-img" alt="">
               </div>
               <div class="card-title text-center">
                  {{$ef5_title}}
               </div>
               <div class="card-content text-center">
                  {{$ef5_content}}
               </div>
            </div>
         </div>

         <div class="col s4">
            <div class="card card-panel">
               <div class="card-image">
                  <img src="{{$ef6}}" alt="" class="half-img">
               </div>
               <div class="card-title text-center">
                  {{$ef6_title}}
               </div>
               <div class="card-content text-center">
                  {{$ef6_content}}
               </div>
            </div>
         </div>

         <div class="col s4">
            <div class="card card-panel">
               <div class="card-image">
                  <img src="{{$ef7}}" alt="" class="half-img">
               </div>
               <div class="card-title text-center">
                  {{$ef7_title}}
               </div>
               <div class="card-content text-center">
                  {{$ef7_content}}
               </div>
            </div>
         </div>

            <div class="col offset-s2 s4">
               <div class="card card-panel">
                  <div class="card-image">
                     <img src="{{$ef8}}" alt="" class="half-img">
                  </div>
                  <div class="card-title text-center">
                     {{$ef8_title}}
                  </div>
                  <div class="card-content text-center">
                     {{$ef8_content}}
                  </div>
               </div>
            </div>

            <div class="col s4">
               <div class="card card-panel">
                  <div class="card-image">
                     <img src="{{$ef9}}" alt="" class="half-img">
                  </div>
                  <div class="card-title text-center">
                     {{$ef9_title}}
                  </div>
                  <div class="card-content text-center">
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
               <form action="/main/add" method="POST" id="form">
                  @csrf
                  <div class="input-field">
                     <input name="name" id="form_name" type="text" class="validate">
                     <label for="form_name">Ф.И.О</label>
                  </div>
                  <div class="input-field">
                     <input name="email" id="form_email" type="text" class="validate">
                     <label for="form_email">Почта</label>
                  </div>
                  <div class="input-field">
                     <input name="phone" id="form_phone" type="text" class="validate">
                     <label for="form_phone">Номер телефона</label>
                  </div>
                  <div class="input-field">
                     <input name="message" id="form_lorem" type="text" class="validate">
                     <label for="form_lorem">Сообщение</label>
                  </div>
                  <div class="input-field">
                     <input name="count" id="form_count" type="text" class="validate">
                     <label for="form_count">Кол-во товара</label>
                  </div>
                  <div class="input-box">
                     <label>
                        <input name="grant" type="checkbox">
                        <span>Даю соглаие на обработку персональных данных</span>
                     </label>
                  </div>
                  <div class="input-box">
                     <button name="start" class="btn waves-effect waves-light">оформить</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>

<footer>
   <div class="container">

      <div class="row">
         <div class="col-sm-8 margin-20">
            <ul class="list-inline social">
               <li>Зацените нас в</li>
               <li><a href="#"><i class="fa fa-twitter"></i></a></li>
               <li><a href="#"><i class="fa fa-facebook"></i></a></li>
               <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
         </div>

         <div class="col-sm-4 text-right">
            <p>
               <small>2018 типа.лэндинг проект Гудлайн.<br>
                  Создано <a href="http://visualsoldiers.com">Кем-то</a></small>
            </p>
         </div>
      </div>

   </div>
</footer>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="/js/form.js"></script>
</body>
</html>