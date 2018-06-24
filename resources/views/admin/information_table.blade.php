<a id="openAddDataForm" class="btn-floating btn-large waves-effect btn-r-d-position waves-light red">
   <i class="material-icons">add</i>
</a>
<div class="container">
   <div class="row">
      @if($not_use)
         <div class="col s12">
            <div class="card">
               <form class="unusedDeletingForm" action="/admin/table/create/unused" method="POST">
                  @csrf
                  <div class="card-content">
                     <div class="card-title">
                        <div>Несуществующий текст</div>
                     </div>
                     @foreach($not_use as $not_uses)
                        <label class="chip">
                           <input name="{{$not_uses}}" type="checkbox" class="left" checked="checked"/>
                           <span>{{$not_uses}}</span>
                        </label>
                     @endforeach
                  </div>
                  <div class="card-action">
                     <button type="submit" name="create" value="create" class="btn-flat waves-effect waves-green">
                        Создать
                     </button>
                     <a name="delete" id="deleteUnusedText" value="true" class="btn-flat right waves-effect waves-red">Удалить</a>
                  </div>
               </form>
            </div>
         </div>
      @endif
      @if($use)
         <div class="col s12">
            <div class="card">
               <form class="unusedDeletingForm" action="/admin/table/delete/unused" method="POST">
                  @csrf
                  <div class="card-content">
                     <div class="card-title">
                        <div>Неиспользуемый текст</div>
                     </div>
                     @foreach($use as $uses)
                        <label class="chip">
                           <input name="{{$uses}}" type="checkbox" class="left" checked="checked"/>
                           <span>{{$uses}}</span>
                        </label>
                     @endforeach
                  </div>
                  <div class="card-action">
                     <button type="submit" class="btn-flat waves-effect waves-red">Удалить</button>
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
            <div class="card one-card-main" data-information="{{$val['information']}}"
                 data-id="{{$val['id']}}" data-desc="{{$val['description']}}" data-tag="{{$val['tag_id']}}">
               <div class="card-content scroll-y-a">
                  <div class="card-title center">
                     <div data-tag-id="{{$val['id']}}">
                        <h5>{{$val['description']}} ({{$val['tag_id']}})</h5>
                     </div>
                  </div>
                  <div>
                     <span>{{$val['information']}}</span>
                  </div>
               </div>
               <div class="card-action">
                  <div class="form-action-inline">
                     <div>
                        <button id="deleteInformation"
                                type="submit"
                                data-delete-id="{{$val['id']}}"
                                class="btn tooltipped waves-effect waves-red"
                                data-position="top"
                                data-tooltip="Удалить">
                           <i class="material-icons">delete</i>
                        </button>
                        @if($val['image']===true)
                           <a href="#modal{{$val['id']}}"
                              class="waves-effect waves-light btn modal-trigger tooltipped"
                              data-position="right"
                              data-tooltip="Просмотр">
                              <i class="material-icons">visibility</i>
                           </a>
                        @endif
                     </div>
                     <div>
                        <a data-form-id="{{$val['id']}}"
                           class="btn openEditForm-ID waves-effect waves-light">Изменить</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="modal{{$val['id']}}" class="modal">
            <div class="modal-content flex-center">
               <img src="{{$val['information']}}" alt="" class="responsive-img">
            </div>
            <div class="modal-footer">
               <a href="#!" class="modal-close waves-effect waves-green btn-flat">Закрыть</a>
            </div>
         </div>
      @endforeach
   </div>
</div>
<div id="newDataForm" style="display: none;" class="card-panel card new-data-form">
   <form action="/admin/table/create" enctype="multipart/form-data" method="POST">
      @csrf
      {{ method_field('POST') }}
      <input id="id_add" type="hidden" name="id" value="0">
      <div class="card-content">
         <div>
            <span id="tag_add_t">Имя тега</span>
            <div class="input-field inline">
               <input id="tag_add" name="tag_id" type="text" class="validate">
            </div>
            <span>Подпись</span>
            <div class="input-field inline">
               <input id="des_add" name="description" type="text" class="validate">
            </div>
         </div>
         <div class="input-field full-w">
            <textarea id="inf_add" name="information" type="text"
                      class="materialize-textarea validate"></textarea>
            <span class="helper-text">Текст</span>
         </div>
      </div>
      <div class="file-field input-field">
         <div class="btn">
            <span>Фото</span>
            <input id="img_add" type="file" name="image">
         </div>
         <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Upload file"/>
         </div>
      </div>
      <div class="input-field flex-center card-action">
         <button type="submit" id="formCloseNewDataForm" class="btn waves-effect waves-light">
            Сохранить
         </button>
      </div>
   </form>
   <a id="closeNewDataForm" class="btn-floating btn-large waves-effect btn-r-d-position waves-light red"><i
         class="material-icons">close</i>
   </a>
</div>

<script src="/js/form.js"></script>
<script>
   jQuery(document).ready(function ($) {

      let delay = 100;

      $('#deleteInformation').click(function () {
         $(this).parents(".one-card-main").slideUp('slow');
         ajaxStart('/admin/table/delete', 'GET', 'id=' + $(this).attr("data-delete-id"));
      });
      $("#closeNewDataForm").click(function () {
         $(this).parent().fadeOut(200);
      });

      $("#openAddDataForm").click(function () {
         $("#tag_add_t").text('Имя тега');
         $("#tag_add").val("").attr("value", "").removeAttr("disabled").removeAttr("hidden");
         $("#des_add").val("").attr("value", "");
         $("#inf_add").val("").attr("value", "");
         $("#img_add").val("").attr("value", "");
         $("#id_add").val("").attr("value", "");
         $("#newDataForm").fadeIn(200);
      });

      $(".one-card-main").each(function () {
         delay += 100;
         $(this).delay(delay).css({
            opacity: 0,
            bottom: 10,
         }).animate({
            opacity: 1,
            bottom: 0,
         }, 285);
      });

      $("#formCloseNewDataForm").click(function () {
         $(this).parents("#newDataForm").fadeOut(200);
      });

      $("#img_add").change(function () {
         if ($(this).val() !== '') {
            $("#inf_add").attr("disabled", "on");
         }
      });

      $('.tooltipped').tooltip({enterDelay: 2000});
      $('.modal').modal();

      $(".unusedDeletingForm button").click(function () {
         let form = $(this).parents("form").find("input");
         if ($(form).is(":checked")) {
            location.reload();
         }
      });

      $("#deleteUnusedText").click(function () {
         ajaxStart('/admin/table/erase/unused', 'POST', ($(this).parents("form").serialize()));
         let form = $(this).parents("form").find("input");
         if ($(form).is(":checked")) {
            location.reload();
         }
      });

      $(".openEditForm-ID").click(function () {
         let card = $(this).parents(".one-card-main");
         let data = [];
         data.id = card.attr("data-id");
         data.information = card.attr("data-information");
         data.description = card.attr("data-desc");
         data.tag_id = card.attr("data-tag");
         $("#tag_add_t").text('');
         $("#tag_add").val(data.tag_id).attr("value", data.tag_id).attr("hidden", "");
         $("#des_add").val(data.description).attr("value", data.description);
         $("#inf_add").val(data.information).attr("value", data.information);
         $("#id_add").val(data.id).attr("value", data.id);
         M.textareaAutoResize($('textarea'));
         $("#newDataForm").fadeIn();
      });
   })
   ;
</script>
