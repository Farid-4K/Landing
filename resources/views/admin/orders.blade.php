<div class="container">
   <div class="row">
      @foreach($users as $user)
         <div class="card card-panel flow-text">
            <div class="card-title">{{$user['name']}}</div>
            <div class="card-content">
               <div>Почта: {{$user['email']}}</div>
               <div>Телефон: {{$user['phone']}}</div>
               <div>Кол-во: {{$user['count']}}</div>
               <div>Согласие: {{$user['grant']}}</div>
            </div>
            <div class="card-action">
               <button type="submit" data-delete-id="{{$user['id']}}"
                       class="btn deleteData-ID waves-effect waves-red tooltipped" data-position="top"
                       data-tooltip="Удалить">
                  <i class="material-icons">delete</i>
               </button>
               <a class="waves-effect waves-light btn modal-trigger right" href="#modal{{$user['id']}}">Сообщение</a>
            </div>
         </div>
         <div id="modal{{$user['id']}}" class="modal">
            <div class="modal-content flow-text">{{$user['message']}}</div>
            <div class="modal-footer">
               <a href="#" class="modal-close waves-effect waves-green btn-flat">Закрыть</a>
            </div>
         </div>
      @endforeach
   </div>
</div>
<script src="/js/form.js"></script>
<script>
   $(document).ready(function () {
      $('.modal').modal();
      $('.deleteData-ID').click(function () {
         $(this).parent().parent().slideUp('slow');
         ajaxStart('/admin/orders/delete', 'GET', 'id=' + $(this).attr("data-delete-id"));
      });
   });
</script>