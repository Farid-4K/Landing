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

<header>
   <div class="container">
      <div class="row">
         <div class="col-xs-6 fadeInUp" style="z-index: 2">
            <a href="#"><h1>{{$title}}</h1></a>
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
         <div class="col-sm-4 wow fadeIn" data-wow-delay="0.4s">
            <hr class="line purple">
            <h3>Lorem ipsum dolor sit.</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra orci ut est facilisis, eu
               elementum mi volutpat. Pellentesque ac tristique nisi.</p>
         </div>
         <div class="col-sm-4 wow fadeIn" data-wow-delay="0.8s">
            <hr class="line blue">
            <h3>Lorem ipsum dolor sit.</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra orci ut est facilisis, eu
               elementum mi volutpat. Pellentesque ac tristique nisi.</p>
         </div>
         <div class="col-sm-4 wow fadeIn" data-wow-delay="1.2s">
            <hr class="line yellow">
            <h3>Lorem ipsum dolor sit.</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra orci ut est facilisis, eu
               elementum mi volutpat. Pellentesque ac tristique nisi.</p>
         </div>
      </div>
   </div>
</section>

<section id="pricing" class="pad-lg">
   <div class="container">
      <div class="row margin-40">
         <div class="col s8 offset-m2 text-center">
            <h2>Pricing</h2>
            <p class="white-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra orci
               ut.</p>
         </div>
      </div>

      <div class="row margin-50">

         <div class="col s4">
            <br/>
            <ul class="text-center z-depth-3">
               <li class="headline"><h5>Personal</h5></li>
               <li class="price">
                  <div class="amount">150 рублей</div>
               </li>
               <li class="info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, voluptatum.
               </li>
               <li class="features first">Up To 25 Projects</li>
               <li class="features">10GB Storage</li>
               <li class="features">Other info</li>
               <li class="features">
                  <button class="btn waves-effect waves-light">Купить</button>
               </li>
            </ul>
         </div>

         <div class="col s4">
            <ul class="text-center z-depth-3">
               <li class="headline"><h5>Professional</h5></li>
               <li class="price">
                  <div class="amount">250 рублей</div>
               </li>
               <li class="info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, unde!</li>
               <li class="features first">до 25 проектов</li>
               <li class="features">10GB Места</li>
               <li class="features">Lorem lorem</li>
               <li class="features">lorem lorem</li>
               <li class="features">
                  <button class="btn waves-effect waves-light">Купить
                  </button>
               </li>
            </ul>
         </div>

         <div class="col s4">
            <br/>
            <ul class="text-center z-depth-3">
               <li class="headline"><h5>Business</h5></li>
               <li class="price">
                  <div class="amount">400 рублей</div>
               </li>
               <li class="info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, nobis!</li>
               <li class="features first">до 25 проектов</li>
               <li class="features">10GB места</li>
               <li class="features">lorem lorem</li>
               <li class="features">
                  <button class="btn waves-effect waves-light">Купить</button>
               </li>
            </ul>
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
                     <input name="count" id="form_lorem" type="text" class="validate">
                     <label for="form_lorem">Кол-во товара</label>
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