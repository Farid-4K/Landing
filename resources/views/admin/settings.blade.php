<div class="container">
   <div class="card-panel card">
      <div class="row">
         <div class="col s12">
            <ul class="tabs">
               <li class="tab col s4"><a class="active" href="#tabAbout">О себе</a></li>
               <li class="tab col s4"><a href="#tabSettings">Настройки</a></li>
               <li class="tab col s4"><a href="#tabDanger">Опасная зона</a></li>
            </ul>
         </div>
      </div>
   </div>
   <div class="row">

      <div data-role="tabAbout" id="tabAbout" class="col s12">
         <div class="row">
            <div class="card">
               <form data-role="saveAdminData">
                  <div class="card-content">
                     <div class="card-title">Настройки</div>
                     @csrf
                     <div class="input-field">
                        <input name="name" id="name" type="text" class="" value="{{$name}}">
                        <label class="active" for="name">Имя</label>
                     </div>
                     <div class="input-field">
                        <input name="email" id="email" type="text" class="" value="{{$email}}">
                        <label class="active" for="email">Email</label>
                     </div>
                     <div class="input-field">
                        <input name="login" id="login" type="text" class="" value="{{$login}}">
                        <label class="active" for="login">Логин</label>
                     </div>
                     <a href="#modal"
                        class="waves-effect waves-light btn modal-trigger"
                        data-position="right">
                        <span>Изменить пароль</span>
                     </a>
                  </div>
                  <div class="card-action">
                     <span data-role="saveNewSettings" class="btn waves-effect waves-light">Сохранить</span>
                     @if($vk == '0')
                        <a href="/login/vk" class="btn waves-effect right waves-light">Привязать ВК</a>
                     @elseif ($vk != '0')
                        <a href="/admin/settings/untie" id="vk_logout"
                           class="btn right waves-effect waves-light">Отвязать ВК</a>
                     @endif
                  </div>
               </form>
            </div>
         </div>
      </div>

      <div data-role="tabSettings" id="tabSettings" class="col s12">

         <div class="row">
            <div class="col s12">
               <div class="card-panel">
                  <div class="h4">Смена дизайна</div>
                  <div class="h5">архив должен называться design.zip</div>
                  <form action="/admin/settings/zip" method="put" enctype="multipart/form-data">
                     <div class="file-field col s12 input-field">
                        <div class="btn">
                           <span>zip-архив</span>
                           <input type="file" name="archive">
                        </div>
                        <div class="file-path-wrapper">
                           <input class="file-path validate" type="text" placeholder="Загрузить"/>
                        </div>
                     </div>
                     <button class="btn-flat waves-effect waves-red">
                        Применить
                     </button>
                  </form>
               </div>
            </div>

            <div class="col s12">
               <div class="card">
                  <form data-role="saveMailData">
                     <div class="card-content">
                        <div class="card-title">Настройки почтового сервера</div>
                        <div class="input-field">
                           <input name="driver" type="text" value="{{$mail['MAIL_DRIVER']}}">
                           <label class="active">Драйвер</label>
                        </div>
                        <div class="input-field">
                           <input name="host" type="text" value="{{$mail['MAIL_HOST']}}">
                           <label class="active">Сервер</label>
                        </div>
                        <div class="input-field">
                           <input name="username" type="text" value="{{$mail['MAIL_USERNAME']}}">
                           <label class="active">Пользователь</label>
                        </div>
                        <div class="input-field">
                           <input name="password" type="text" value="{{$mail['MAIL_PASSWORD']}}">
                           <label class="active">Пароль</label>
                        </div>
                        <div class="input-field">
                           <input name="encryption" type="text" value="{{$mail['MAIL_ENCRYPTION']}}">
                           <label class="active">Шифрование</label>
                        </div>
                        <div class="input-field">
                           <input name="port" type="text" value="{{$mail['MAIL_PORT']}}">
                           <label class="active">Порт</label>
                        </div>
                     </div>
                     <div class="card-action">
                        <a data-role="saveMailDataBtn" class="btn-flat black-text waves-effect waves-green">Сохранить</a>
                     </div>
                  </form>
               </div>
            </div>

         </div>
      </div>

      <div data-role="tabDanger" id="tabDanger" class="col s12">
         <div class="row">
            <div class="card">
               <div class="card-content">
                  <div class="card-title">
                     Сайт <span class="green-text">включен</span>
                  </div>
               </div>
               <div class="card-action">
                  <div class="form-action-inline">
                     <button class="right btn-flat waves-effect waves-red">Отключить</button>
                  </div>
               </div>
            </div>
            <div class="card-panel">
               <button class="btn-flat waves-effect waves-red">
                  Удалить все данные о покупателях
               </button>
            </div>
            <div class="card-panel">
               <button class="btn-flat waves-effect waves-red">
                  Удалить всё наполнение лэндинга
               </button>
            </div>
            <div class="card-panel">
               <button class="btn-flat waves-effect waves-green">
                  Скачать бэкап лэндинга
               </button>
            </div>
         </div>
      </div>
   </div>
</div>

<form data-role="resetPassword">
   @csrf
   <div id="modal" class="modal card-panel" style="width: 375px;">
      <div class="modal-content flex-center">
         <div class="input-field">
            <input name="password" id="password" type="password" class="">
            <label for="password">Новый пароль</label>
         </div>
      </div>
      <div class="modal-footer">
         <a data-role="saveNewPassword" class="btn-flat waves-effect right waves-green">Сохранить</a>
         <a class="modal-close waves-effect waves-red btn-flat">Закрыть</a>
      </div>
   </div>
</form>

<script src="/js/form.js"></script>
<script>
   jQuery(document).ready(function ($) {
      let tab = {
         about: '[data-role=tabAbout]',
         settings: '[data-role=tabSettings]',
         danger: '[data-role=tabDanger]',
      };
      let action = {
         about: {
            save: "/admin/settings/set/admin",
            password: '/admin/settings/setPassword',
         },
         setting: {
            save: "/admin/settings/set/mail",
         }
      };
      let form = {
         about: {
            save: '[data-role=saveAdminData]',
            password: '[data-role=resetPassword]',
         },
         setting: {
            save: "[data-role=saveMailData]",
         }
      };
      let btn = {
         about: {
            save: '[data-role=saveNewSettings]',
            password: '[data-role=saveNewPassword]',
         },
         setting: {
            save: "[data-role=saveMailDataBtn]",
         }
      };
      $(btn.about.save).click(function () {
         ajaxStart(action.about.save, 'GET', $(this).parents(form.about.save).serialize());
         return true;
      });

      $(btn.about.password).click(function () {
         ajaxStart(action.about.password, 'GET', $(this).parents(form.about.password).serialize());
         return true
      });

      $(btn.setting.save).click(function () {
         ajaxStart(action.setting.save, 'GET', $(this).parents(form.setting.save).serialize());
      });


      $('.tabs').tabs();
      $('.modal').modal();
   });
</script>
