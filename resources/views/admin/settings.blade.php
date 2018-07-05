<div class="container">
   <div class="row">
      <div class="col s12">
         <ul class="tabs tabs-p z-depth-1 tabs-fixed-width">
            <li class="tab col s6"><a class="active" href="#tabAbout">О себе</a></li>
            <li class="tab col s6"><a href="#tabSettings">Настройки</a></li>
         </ul>
      </div>

      <div data-role="tabAbout" id="tabAbout" class="col s12">
         <div class="row">
            <div class="col s12">
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
                     </div>
                     <div class="card-action">
                        <span data-role="saveNewSettings" class="btn waves-effect waves-light">Сохранить</span>
                        <a href="#modal" class="modal-trigger black-text btn-flat" data-position="right">
                           Изменить пароль
                        </a>
                     </div>
                  </form>
               </div>
            </div>
            <div class="col s12">
               <div class="card">
                  @if($vk == '0')
                     <div class="card-content">
                        <span class="h5">Аккаунт Вк <span class="red-text darken-2">не</span> привязан</span>
                     </div>
                     <div class="card-action">
                        <a href="/login/vk" class="btn-flat black-text waves-effect">Привязать ВК</a>
                     </div>
                  @elseif ($vk != '0')
                     <div class="card-content">
                        <span class="h5">Аккаунт Вк привязан</span>
                     </div>
                     <div class="card-action">
                        <a href="/admin/settings/untie" id="vk_logout"
                           class="btn-flat black-text waves-effect">Отвязать ВК</a>
                     </div>
                  @endif
               </div>
            </div>
         </div>

      </div>

      <div data-role="tabSettings" id="tabSettings" class="col s12">
         <div class="row">
            <div class="col s12">
               <form action="/admin/settings/upload/zip" data-role="formWithZip" method="POST"
                     enctype="multipart/form-data">
                  @csrf
                  <div class="card">
                     <div class="card-content">
                        <div class="card-title">Загрузка новой верстки</div>
                        <div class="form-action-inline">
                           <div class="file-field input-field">
                              <div class="btn lighten-2 pink">
                                 <span>Zip-архив</span>
                                 <input type="file" class="yellow" name="archive">
                              </div>
                              <div class="file-path-wrapper">
                                 <input data-role="zipInput" class="file-path validate" type="text"
                                        placeholder="Загрузить"/>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="card-action">
                        <button data-role="uploadZipBtn" type="submit" class="btn-flat waves-effect">Применить</button>
                     </div>
                  </div>
               </form>
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
                        <a data-role="saveMailDataBtn"
                           class="btn-flat black-text waves-effect waves-green">Сохранить</a>
                     </div>
                  </form>
               </div>
            </div>

            <div class="col s12">
               <div class="card">
                  <div class="card-content">
                     <div class="card-title">
                        Сайт
                        @if($site_status === 'true')
                           <span class="green-text">Включен</span>
                        @else
                           <span class="red-text">Отключен</span>
                        @endif
                     </div>
                  </div>
                  <div class="card-action">
                     <div class="form-action-inline">
                        @if($site_status === 'true')
                           <a data-role="siteDisabledBtn" class="right btn-flat waves-effect waves-red">Отключить</a>
                        @else
                           <a data-role="siteEnabledBtn"
                              class="right btn-flat waves-effect waves-red">Включить</a>
                        @endif
                     </div>
                  </div>
               </div>
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
        };
        let action = {
            about: {
                save: "/admin/settings/set/admin",
                password: '/admin/settings/set/password',
            },
            setting: {
                save: "/admin/settings/set/mail",
                zip: "/admin/settings/upload/zip",
            },
            danger: {
                enable: '/admin/settings/site/enable',
                disable: '/admin/settings/site/disable',
            }
        };
        let form = {
            about: {
                save: '[data-role=saveAdminData]',
                password: '[data-role=resetPassword]',
            },
            setting: {
                save: "[data-role=saveMailData]",
                zip: '[data-role=formWithZip]',
                input: '[data-role=zipInput]',
            }
        };
        let btn = {
            about: {
                save: '[data-role=saveNewSettings]',
                password: '[data-role=saveNewPassword]',
            },
            setting: {
                save: "[data-role=saveMailDataBtn]",
                zip: "[data-role=uploadZipBtn]",
            },
            danger: {
                enable: "[data-role=siteEnabledBtn]",
                disable: "[data-role=siteDisabledBtn]",
            }
        };

        $(btn.danger.enable).click(function () {
            ajaxStart(action.danger.enable, "GET", 'access=yes');
            return true;
        });

        $(btn.danger.disable).click(function () {
            ajaxStart(action.danger.disable, "GET", 'access=yes');
            return true;
        });

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
