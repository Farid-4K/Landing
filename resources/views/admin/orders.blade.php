<div class="container">
   <div class="card-panel">
      <div class="row">
         <div class="col s12">
            <ul class="tabs">
               <li class="tab col s6"><a class="active" href="#unfinished">Действующие</a></li>
               <li class="tab col s6"><a href="#finished">Выполненые</a></li>
            </ul>
         </div>
      </div>
   </div>

   <div id="unfinished" class="col s12">
      @foreach($uncompleted as $user)
         <div class="card">
            <div class="card-content">
               <div class="card-title">{{$user['name']}}</div>
               <div class="h5">Почта: {{$user['email']}}</div>
               <div class="h5">Телефон: {{$user['phone']}}</div>
               <div class="h5">Кол-во: {{$user['count']}}</div>
            </div>
            <div class="card-action">
               <button type="submit" data-role=btnDeleteOrder data-delete-id="{{$user['id']}}"
                       class="btn-floating btn-m-l right waves-effect waves-red">
                  <i class="material-icons">delete</i>
               </button>
               <button type="submit" data-role=btnFinishOrder data-delete-id="{{$user['id']}}"
                       class="btn-floating right waves-effect waves-green">
                  <i class="material-icons">check</i>
               </button>
               <a class="black-text btn-flat modal-trigger" href="#modal{{$user['id']}}">Сообщение</a>
            </div>
         </div>
         <div id="modal{{$user['id']}}" class="modal">
            <div class="modal-content flow-text word-break"><p class="word-break">{{$user['message']}}</p></div>
            <div class="modal-footer">
               <a href="#" class="modal-close waves-effect waves-green btn-flat">Закрыть</a>
            </div>
         </div>
      @endforeach
   </div>
   <div id="finished" class="col s12">
      @foreach($completed as $users)
         <div class="card">
            <div class="card-content">
               <div class="card-title">{{$users['name']}}</div>
               <div class="h5">Почта: {{$users['email']}}</div>
               <div class="h5">Телефон: {{$users['phone']}}</div>
               <div class="h5">Кол-во: {{$users['count']}}</div>
            </div>
            <div class="card-action">
               <button type="submit" data-delete-id="{{$users['id']}}" data-role=btnDeleteOrder class="btn waves-effect waves-red">
                  <i class="material-icons">delete</i>
               </button>
               <a class="black-text btn-flat modal-trigger right" href="#modal{{$users['id']}}">Сообщение</a>
            </div>
         </div>
         <div id="modal{{$users['id']}}" class="modal">
            <div class="modal-content flow-text word-break"><p class="word-break">{{$users['message']}}</p></div>
            <div class="modal-footer">
               <a href="#" class="modal-close waves-effect waves-green btn-flat">Закрыть</a>
            </div>
         </div>
      @endforeach
   </div>
</div>
</div>
<script src="/js/form.js"></script>
<script>
   jQuery(function () {
      $('.modal').modal();
      $(".tabs").tabs();

      let btn = {
         Unfinished: {
            finish: '[data-role=btnFinishOrder]',
            delete: '[data-role=btnDeleteOrder]',
         }
      };

      let action = {
         unfinished: {
            delete: '/admin/orders/delete',
            complete: '/admin/orders/complete',
         }
      };

      $(btn.Unfinished.delete).click(function () {
         cardFade($(this));
         ajaxStart(action.unfinished.delete, 'GET', 'id=' + $(this).attr("data-delete-id"));
      });
      $(btn.Unfinished.finish).click(function () {
         cardFade($(this));
         ajaxStart(action.unfinished.complete, 'GET', 'id=' + $(this).attr("data-delete-id"));
      });

      function cardFade(selector) {
         selector.parents('.card').animate({
            bottom: 20,
            opacity: 0
         }, 310, "swing").delay(100).hide("swing");
      }
   });
</script>