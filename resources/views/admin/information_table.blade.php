<a data-role="openForm" class="btn-floating btn-large waves-effect btn-r-d-position waves-light red">
   <i class="material-icons">add</i>
</a>
<div class="container">
   <div class="row">
      @if($not_use)
         <div class="col s12">
            <div class="card">
               <form data-role="ManagementUnusedDataTemplate">
                  @csrf
                  <div class="card-content">
                     <div class="card-title">
                        <div>Несуществующий текст</div>
                     </div>
                     @foreach($not_use as $not_uses)
                        <label class="chip">
                           <input name="{{$not_uses}}" value="true" type="checkbox" class="left"
                                  checked="checked"/>
                           <span>{{$not_uses}}</span>
                        </label>
                     @endforeach
                  </div>
                  <div class="card-action">
                     <a data-role="btnCreateUnused"
                        class="btn-flat black-text waves-effect waves-green">Создать</a>
                     <a data-role="btnEraseUnused" class="btn-flat black-text right waves-effect waves-red">Удалить</a>
                  </div>
               </form>
            </div>
         </div>
      @endif
      @if($use)
         <div class="col s12">
            <div class="card">
               <form data-role="ManagementUnusedDataBase">
                  @csrf
                  <div class="card-content">
                     <div class="card-title">
                        <div>Неиспользуемый текст</div>
                     </div>
                     @foreach($use as $uses)
                        <label class="chip">
                           <input name="{{$uses}}" value="true" type="checkbox" class="left" checked="checked"/>
                           <span>{{$uses}}</span>
                        </label>
                     @endforeach
                  </div>
                  <div class="card-action">
                     <a data-role="btnDeleteUnused"
                        class="btn-flat black-text waves-effect waves-green">Удалить</a>
                  </div>
               </form>
            </div>
         </div>
      @endif
   </div>
</div>
<div class="container">
   <div class="row">
      @foreach ($information as $val)
         <div class="col s12">
            <div class="card one-card-main" data-role="card" data-id="{{$val['id']}}">
               <div class="card-content scroll-y-a">
                  <div class="card-title">
                     <h5>
                        <span data-role="cardDescription">{{$val['description']}}</span>
                        (<span data-role="cardTag">{{$val['tag_id']}}</span>)
                     </h5>
                  </div>
                  <div>
                     <span data-role="cardInformation">{{$val['information']}}</span>
                  </div>
               </div>
               <div class="card-action">
                  <div class="form-action-inline">
                     <div>
                        <a data-form-id="{{$val['id']}}" data-role="openEditForm"
                           class="btn-flat black-text waves-effect waves-teal">Изменить</a>
                     </div>
                     <div>
                        @if($val['image'])
                           <a href="#modal{{$val['id']}}"
                              class="waves-effect btn-floating modal-trigger">
                              <i class="material-icons">visibility</i>
                           </a>
                        @endif
                        <a data-role="deleteInformation" class="btn-floating btn-m-l waves-effect waves-red">
                           <i class="material-icons">delete</i>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @if($val['image'])
            <div id="modal{{$val['id']}}" class="modal">
               <div class="modal-content flex-center">
                  <img src="{{$val['information']}}" alt="" class="responsive-img">
               </div>
               <div class="modal-footer">
                  <a class="modal-close waves-effect waves-green btn-flat">Закрыть</a>
               </div>
            </div>
         @endif
      @endforeach
   </div>
</div>
<div data-role="mainForm" style="display: none;" class="card-panel card new-data-form">
   <form data-role="realForm" action="/admin/table/create" enctype="multipart/form-data" method="POST">
      @csrf
      <input data-role="formId" type="hidden" name="id" value="0">
      <div class="card-content">
         <div class="row">
            <div class="input-field col s12">
               <input placeholder="Имя тега" data-role="formTag" name="tag_id" type="text" class="validate">
            </div>
            <div class="input-field col s12">
               <input data-role="formDescription" name="description" type="text" class="validate">
               <span class="helper-text">Подпись</span>
            </div>
            <div class="input-field col s12">
            <textarea data-role="formInformation" name="information" type="text"
                      class="materialize-textarea validate"></textarea>
               <span class="helper-text">Текст</span>
            </div>
         </div>
         <div class="file-field col s12 input-field">
            <div class="btn">
               <span>Фото</span>
               <input data-role="formImage" type="file" name="image">
            </div>
            <div class="file-path-wrapper">
               <input class="file-path validate" type="text" placeholder="Загрузить"/>
            </div>
         </div>
      </div>
      <div class="input-field flex-center card-action">
         <input data-role="closeForm" type="submit" class="btn-flat" value="Сохранить">
      </div>
   </form>
   <a data-role="closeForm"
      class="btn-floating btn-large waves-effect btn-r-d-position waves-light red"><i
         class="material-icons">close</i>
   </a>
</div>

<script src="/js/form.js"></script>

<script>
   jQuery(function () {

      function inputClear(selector) {
         selector.val("").attr("value", "");
      }

      let delay = 100;

      let action = [];
      action.unused = {
         create: '/admin/table/create/unused',
         delete: '/admin/table/delete/unused',
         erase: '/admin/table/erase/unused',
      };

      /* Query settings */
      let btn = [];
      btn.card = {
         delete: '[data-role=deleteInformation]',
         edit: '[data-role=openEditForm]'
      };
      btn.form = {
         close: '[data-role=closeForm]',
         open: '[data-role=openForm]'
      };
      btn.unused = {
         create: 'a[data-role=btnCreateUnused]',
         delete: 'a[data-role=btnDeleteUnused]',
         erase: 'a[data-role=btnEraseUnused]'
      };

      /* Query settings */
      let form = [];
      form.self = '[data-role=realForm]';
      form.parent = '[data-role=mainForm]';
      form.data = {
         id: '[data-role=formId]',
         tag: '[data-role=formTag]',
         des: '[data-role=formDescription]',
         inf: '[data-role=formInformation]',
         img: '[data-role=formImage]'
      };

      /* Query settings */
      let card = [];
      card.self = '[data-role=card]';
      card.data = {
         des: '[data-role=cardDescription]',
         tag: '[data-role=cardTag]',
         inf: '[data-role=cardInformation]'
      };

      let manage = [];
      manage.database = '[data-role=ManagementUnusedDataBase]';
      manage.template = '[data-role=ManagementUnusedDataTemplate]';

      /* Создание информации */
      $(form.parent).submit(function () {
         ajaxStart($(form.self).attr("action"), 'GET', $(form.self).serialize());
      });

      $(form.self).submit(function (event) {
         event.preventDefault();
         ajaxStart($(this).attr("action"), 'GET', $(this).serialize());
         return false;
      });
      /* Удаление карточки */
      $(btn.card.delete).click(function () {
         let parent = $(this).parents(card.self);
         parent.slideUp();
         ajaxStart('/admin/table/delete', 'GET', 'id=' + parent.attr("data-id"));
         return true;
      });

      /* Закрытие формы */
      $(btn.form.close).click(function () {
         $(this).parents(form.parent).fadeOut(150);
         return true;
      });

      /* Открытие формы */
      $(btn.form.open).click(function () {
         $(form.data.tag).show(0);
         inputClear($(form.data.tag));
         inputClear($(form.data.des));
         inputClear($(form.data.inf));
         inputClear($(form.data.img));
         inputClear($(form.data.id));
         M.textareaAutoResize($(form.data.inf));
         $(form.parent).fadeIn(150);
         return true;
      });

      /* Стартовая анимация */
      $(card.self).each(function () {
         delay += 110;
         $(this).css({
            opacity: 0.2,
            top: 18,
         }).delay(delay).animate({
            opacity: 1,
            top: 0,
         }, 250);
      });

      /* отключение поля - информация */
      $(form.data.img).change(function () {
         if (Boolean($(this).empty())) {
            $(form.data.inf).attr("disabled", "on");
         } else {
            $(form.data.inf).removeAttr("disabled");
         }
         return true;
      });

      $('.modal').modal();

      /* Удаление из шаблона */
      $(btn.unused.erase).click(function () {
         ajaxStart(action.unused.erase, 'GET', $(this).parents(manage.template).serialize());
         return false;
      });

      /* Создание из шаблона */
      $(btn.unused.create).click(function () {
         ajaxStart(action.unused.create, 'GET', $(this).parents(manage.template).serialize());
         return false;
      });

      /* Удаление из базы */
      $(btn.unused.delete).click(function () {
         ajaxStart(action.unused.delete, 'GET', $(this).parents(manage.database).serialize());
         return false;
      });

      /* Открытие редактирования */
      $(btn.card.edit).click(function () {
         let parent = $(this).parents(card.self);
         let data = [];

         data.id = parent.attr("data-id");
         data.information = parent.find(card.data.inf).text();
         data.description = parent.find(card.data.des).text();
         data.tag = parent.find(card.data.tag).text();

         $(form.data.tag).val(data.tag).attr("value", data.tag).hide(0);
         $(form.data.des).val(data.description).attr("value", data.description);
         $(form.data.inf).val(data.information).attr("value", data.information);
         $(form.data.id).val(data.id).attr("value", data.id);
         $(form.parent).fadeIn(150);
      });
   });
</script>
