<div class="container">
   <div class="card-panel card">
      <div class="row">
         <div class="col s12">
            <ul class="tabs">
               <li class="tab col s4"><a class="active" href="#test1">О себе</a></li>
               <li class="tab col s4"><a href="#test2">Настройки</a></li>
               <li class="tab col s4"><a href="#test3">Опасная зона</a></li>
            </ul>
         </div>
      </div>
   </div>
   <div class="row">
      <div id="test1" class="col s12">
         <div class="row">
            <div class="card card-panel">
               <div class="card-title">Настройки</div>
               <form method="POST" action="/admin/settings/set">
                  <div class="card-content">
                     @csrf
                     <div class="input-field">
                        <input name="name" id="name" type="text" class="">
                        <label for="name">Имя</label>
                     </div>
                     <div class="input-field">
                        <input name="email" id="email" type="text" class="">
                        <label for="email">Почта</label>
                     </div>
                     <div class="input-field">
                        <input name="login" id="login" type="text" class="">
                        <label for="login">Логин</label>
                     </div>
                     <div class="input-field">
                        <input name="password" id="password" type="text" class="">
                        <label for="password">Пароль</label>
                     </div>
                  </div>
                  <div class="card-action">
                     <button class="btn waves-effect waves-light">Сохранить</button>
                     @if($vk == '0')
                        <a href="/login/vk" class="btn waves-effect right waves-light">Привязать ВК</a>
                     @elseif ($vk != '0')
                        <a href="/admin/settings/logout" id="vk_logout"
                           class="btn right waves-effect waves-light">Отвязать ВК</a>
                     @endif
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div id="test2" class="col s12">Test 2</div>
      <div id="test3" class="col s12">
         <div class="row">
            <div class="card card-panel">
               Сайт <span class="green-text">включен</span>
            </div>
         </div>
      </div>
   </div>
</div>


<script src="/js/form.js"></script>
<script>
   $(document).ready(function () {
      $('.tabs').tabs();
      $("#test1 input").change(function () {
         ajaxStart('/admin/settings/set', 'get', $(this).attr("id") + '=' + $(this).val());
      });
   });
</script>