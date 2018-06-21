@extends('layouts.admin')

@section('content')
   <div class="container">
      <div class="row">
         <div class="col l8 offset-l2 s12">
            <div class="card card-panel flex-center">
               <h5>Страницы несуществует</h5>
            </div>
            <div class="card card-panel">
               <div class="card-title">Что произошло?</div>
               <div class="card-content">
                  <ul class="browser-default">
                     <li>Возможно вы ввели неверный адрес</li>
                     <li>Вы перешли по устаревшей ссылке</li>
                  </ul>
               </div>
               <div class="card-action flex-center">
                  <a href="/" class="btn-flat">На главную</a>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection