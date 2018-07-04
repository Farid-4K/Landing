<style>
   .card{
      padding    : 20px;
      display    : block;
      background : #fff;
      box-shadow : 0 0 7px rgba(0, 0, 0, 0.3);
   }
</style>

<div class="card">
   <div><h1>Сделан заказ.</h1></div>
   <div><h3>{{$name}}</h3></div>
   <div><h3>{{$email}}</h3></div>
   <div><h3>Заказал - {{$count}} шт.</h3></div>
   <div><h3>{{$phone}}</h3></div>
   <div><h3>{{$userMessage}}</h3></div>
</div>