<a class="btn-floating btn-large waves-effect open-add-data-form-ID btn-r-d-position waves-light red"><i
      class="material-icons">add</i></a>
<div class="container">
   <div class="row">
      @if($not_use)
         <div class="col s12">
            <div class="card">
               <div class="card-content">
                  <div class="card-title">
                     <div>Несуществующий текст</div>
                  </div>
                  @foreach($not_use as $not_uses)
                     <div class="chip">{{$not_uses}}</div>
                  @endforeach
               </div>
               <div class="card-action">
                  <button class="btn-flat waves-effect waves-green">Создать все ключи</button>
               </div>
            </div>
         </div>
      @endif
      @if($use)
         <div class="col s12">
            <div class="card">
               <div class="card-content">
                  <div class="card-title">
                     <div>Неиспользуемый текст</div>
                  </div>
                  @foreach($use as $uses)
                     <div class="chip">{{$uses}}</div>
                  @endforeach
               </div>
               <div class="card-action">
                  <button class="btn-flat waves-effect waves-red">Удалить все ключи</button>
               </div>
            </div>
         </div>
      @endif
   </div>
</div>
<div class="container">
   <div class="row">
      @foreach ($information as $val)
         <div class="col xl12 l4 m6 s12">
            <div class="card card-panel one-card-main">
               <div class="card-title center">
                  <div data-tag-id="{{$val['id']}}"><h5>{{$val['description']}} ({{$val['tag_id']}})</h5></div>
               </div>
               <div class="card-content scroll-y-a">
                  <div>{{$val['information']}}</div>
               </div>
               <div class="card-action">
                  <div class="form-action-inline">
                     <div>
                        <button type="submit" data-delete-id="{{$val['id']}}"
                                class="btn deleteData-ID tooltipped" data-position="top"
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


         <div style="display: none" id="formto{{$val['id']}}" class="col form l6 form-show-ID m8 s12">
            <div class="container">
               <div class="row">
                  <div class="col s12">
                     <div class="card-panel card">
                        <form action="/admin/table/update" enctype="multipart/form-data"
                              method="POST">
                           @csrf
                           <div class="card-title">Изменение информации<i
                                 class="material-icons close-edit-form-ID pointer right">close</i>
                           </div>
                           <div class="card-content">
                              <input type="text" name="id" hidden value="{{$val['id']}}">
                              <div class="input-field">
                                 <input name="description" type="text"
                                        value="{{$val['description']}}" class="validate">
                              </div>
                              <div class="input-field">
                                                <textarea name="information" type="text" class="materialize-textarea
                                                validate">{{$val['information']}}</textarea>
                              </div>
                           </div>
                           <div class="input-field card-action">
                              <div class="photo-input">
                                 <input type="hidden" name="public" value="{{$val['id']}}">
                                 <div class="file-field input-field">
                                    <div class="btn">
                                       <span>Фото</span>
                                       <input type="file" name="image">
                                    </div>

                                    <div class="file-path-wrapper">
                                       <input class="file-path validate" type="text"/>
                                    </div>
                                 </div>
                                 <button type="submit" name="save"
                                         class="btn save-form-ID waves-effect waves-light">
                                    Сохранить
                                 </button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      @endforeach
   </div>
</div>
<div style="display: none;" class="card-panel card new-data-form new-data-form-ID">
   <form action="/admin/table/create" enctype="multipart/form-data" method="POST">
      @csrf
      {{ method_field('POST') }}
      <div class="card-content">
         <div class="input-field">
            <input id="tag_add" name="tag_id" type="text" class="validate">
            <label for="tag_add">Имя тега</label>
         </div>
         <div class="input-field">
            <input id="des_add" name="description" type="text" class="validate">
            <label for="des_add">Название</label>
         </div>
         <div class="input-field">
            <textarea id="inf_add" name="information" type="text"
                      class="materialize-textarea validate"></textarea>
            <label for="inf_add">Текст</label>
         </div>
      </div>
      <div class="file-field input-field">
         <div class="btn">
            <span>Фото</span>
            <input type="file" class="file-add-path-ID" name="image">
         </div>
         <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Upload file"/>
         </div>
      </div>
      <div class="input-field flex-center card-action">
         <button type="submit" name="save" class="btn form-close-new-data-form-ID waves-effect waves-light">
            Сохранить
         </button>
      </div>
   </form>
   <a class="btn-floating btn-large waves-effect close-new-data-form-ID btn-r-d-position waves-light red"><i
         class="material-icons">close</i></a>
</div>


<script src="/js/form.js"></script>
<script>
   $(document).ready(function () {
      $('.deleteData-ID').click(function () {
         $(this).parent().parent().parent().parent().slideUp('slow');
         ajaxStart('/admin/table/delete', 'GET', 'id=' + $(this).attr("data-delete-id"));
      });
      $('.openEditForm-ID').click(function () {
         var id = $(this).attr('data-form-id');
         $('#formto' + id).fadeIn();
      });
      $(".close-new-data-form-ID").click(function () {
         $(this).parent().fadeOut();
      });
      $(".open-add-data-form-ID").click(function () {
         $(".new-data-form-ID").fadeIn();
      });
      $(".form-close-new-data-form-ID").click(function () {
         $(this).parent().parent().parent().fadeOut();
      });
      $(".file-add-path-ID").change(function () {
         if ($(this).val() !== '') {
            $("#inf_add").attr("disabled", "on");
         }
      });
      $(".close-edit-form-ID").click(function () {
         $(this).parents(".form").fadeOut();
      });
      $('.tooltipped').tooltip({enterDelay: 1000});
      $(document).ready(function () {
         $('.modal').modal();
      });
      $('.save-form-ID').click(function () {
         $(this).parent().parent().parent().parent().parent().parent().parent().parent().fadeOut();
      })
   });
</script>