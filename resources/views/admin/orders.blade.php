<div class="container">
   <div class="card-panel">
      <div class="row">
         <div class="col s12">
            <ul class="tabs">
               <li class="tab col s6"><a class="active" href="#test1">Действующие</a></li>
               <li class="tab col s6"><a href="#test2">Выполненые</a></li>
            </ul>
         </div>
      </div>
   </div>

   <div id="test1" class="col s12">
      @foreach($uncompleted as $user)
         <div class="card">
            <div class="card-content">
               <div class="card-title">{{$user['name']}}</div>
               <div class="h5">Почта: {{$user['email']}}</div>
               <div class="h5">Телефон: {{$user['phone']}}</div>
               <div class="h5">Кол-во: {{$user['count']}}</div>
            </div>
            <div class="card-action">
               <button type="submit" data-delete-id="{{$user['id']}}"
                       class="btn deleteData-ID waves-effect waves-red tooltipped" data-position="top"
                       data-tooltip="Удалить">
                  <i class="material-icons">delete</i>
               </button>
               <button type="submit" data-delete-id="{{$user['id']}}"
                       class="btn completeData-ID waves-effect waves-green tooltipped" data-position="top"
                       data-tooltip="Выполнено">
                  <i class="material-icons">check</i>
               </button>
               <a class="black-text btn-flat modal-trigger right" href="#modal{{$user['id']}}">Сообщение</a>
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
   <div id="test2" class="col s12">
      @foreach($completed as $users)
         <div class="card">
            <div class="card-content">
               <div class="card-title">{{$users['name']}}</div>
               <div class="h5">Почта: {{$users['email']}}</div>
               <div class="h5">Телефон: {{$users['phone']}}</div>
               <div class="h5">Кол-во: {{$users['count']}}</div>
            </div>
            <div class="card-action">
               <button type="submit" data-delete-id="{{$users['id']}}" class="btn deleteData-ID waves-effect waves-red">
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
        $('.deleteData-ID').click(function () {
            $(this).parent().parent().slideUp('slow');
            ajaxStart('/admin/orders/delete', 'GET', 'id=' + $(this).attr("data-delete-id"));
        });
        $('.completeData-ID').click(function () {
            $(this).parent().parent().slideUp('slow');
            ajaxStart('/admin/orders/complete', 'GET', 'id=' + $(this).attr("data-delete-id"));
        });
    });
</script>